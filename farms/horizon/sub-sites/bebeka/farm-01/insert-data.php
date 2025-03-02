<?php
session_start();
include("../../../../../php/Connection.php");

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../../../../../log-in.php");
    exit();
}

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize variables
$message = "";
$allowed_to_submit = false; // Flag to check if the user is allowed to submit the form

// Check if the user is an admin or has the required permission in the registered table
$username = $_SESSION['username'];

// Check if the user is in the admins table
$sql_check_admin = "SELECT * FROM admins WHERE user_name = ?";
$stmt_check_admin = $connection->prepare($sql_check_admin);
$stmt_check_admin->bind_param('s', $username);
$stmt_check_admin->execute();
$result_check_admin = $stmt_check_admin->get_result();

if ($result_check_admin->num_rows > 0) {
    // User is an admin, allow access
    $allowed_to_submit = true;
} else {
    // If not an admin, check if the user has the required permission in the registered table
    $sql_check_permission = "SELECT Allowed_farm FROM registered WHERE user_name = ?";
    $stmt_check_permission = $connection->prepare($sql_check_permission);
    $stmt_check_permission->bind_param('s', $username);
    $stmt_check_permission->execute();
    $result_check_permission = $stmt_check_permission->get_result();

    if ($result_check_permission->num_rows > 0) {
        $row = $result_check_permission->fetch_assoc();
        if ($row['Allowed_farm'] === 'horizon_bebeka_farm_01') {
            // User has the required permission, allow access
            $allowed_to_submit = true;
        }
    }

    $stmt_check_permission->close();
}

$stmt_check_admin->close();

// Handle form submission only if the user is allowed to submit
if ($allowed_to_submit && isset($_POST['submit'])) {
    $date = $_POST['record_date'] ?? '';
    $farm = $_POST['farm_name'] ?? '';
    $precipitation = $_POST['precipitation'] ?? '';
    $additional = $_POST['additional_information'] ?? '';

    if (!empty($date) && !empty($farm) && !empty($precipitation)) {
        // Check if a record for the same date and farm already exists
        $sql_check = "SELECT * FROM horizon_bebeka_farm_01 WHERE Record_date = ? AND Farm_name = ?";
        $stmt_check = $connection->prepare($sql_check);
        $stmt_check->bind_param('ss', $date, $farm);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // Record exists, update it
            $sql_update = "UPDATE horizon_bebeka_farm_01 SET Precipitation = ?, Additional_information = ? WHERE Record_date = ? AND Farm_name = ?";
            $stmt_update = $connection->prepare($sql_update);
            $stmt_update->bind_param('ssss', $precipitation, $additional, $date, $farm);

            if ($stmt_update->execute()) {
                $message = '<div class="alert alert-primary">Record updated successfully.</div>';
            } else {
                $message = '<div class="alert alert-danger">Failed to update record. MySQL error: ' . $stmt_update->error . '</div>';
            }

            $stmt_update->close();
        } else {
            // No record exists, insert a new one
            $sql_insert = "INSERT INTO horizon_bebeka_farm_01 (Record_date, Farm_name, Precipitation, Additional_information) 
                           VALUES (?, ?, ?, ?)";
            $stmt_insert = $connection->prepare($sql_insert);
            $stmt_insert->bind_param('ssss', $date, $farm, $precipitation, $additional);

            if ($stmt_insert->execute()) {
                $message = '<div class="alert alert-success">Record added successfully.</div>';
            } else {
                $message = '<div class="alert alert-danger">Failed to add record. MySQL error: ' . $stmt_insert->error . '</div>';
            }

            $stmt_insert->close();
        }

        $stmt_check->close();
    } else {
        $message = '<div class="alert alert-danger">Please fill in all fields.</div>';
    }
}

// Get today's date in YYYY-MM-DD format for the max attribute
$today = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Record New Entry</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../../../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        select, input, textarea {
            padding: 5px;
            width: 100%;
            margin-bottom: 10px;
        }
        form {
            padding: 20px;
            background: #fff;
            border-radius: 10px;
        }
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
</head>
<body>
<!--START OF HEADER-->
<div class="wrapper row1">
<header id="header" class="hoc clear">
    <div id="logo" class="fl_left" style="width: 200px; padding:0; margin: 10px auto;"> 
        <a href="../../../../../index.php"><img src="../../../../../images/demo/MIG-Logo2.jpg" alt=""></a>
    </div>
    <nav id="mainav" class="fl_right"> 
        <ul class="clear">
            <li class="active"><a href="../../../../../index.php">Home</a></li>
            <li>
                <a href="#">Farms <i class="fas fa-chevron-down"></i></a>
                <ul>
                    <li><a href="../../../../../farms/horizon.php">Horizon</a></li>
                    <li><a href="../../../../../farms/agriceft.php">Agriceft</a></li>
                    <li><a href="../../../../../farms/elfora.php">Elfora</a></li>
                    <li><a href="../../../../../farms/jitu.php">Jitu</a></li>
                </ul>
            </li>
            <?php if (isset($_SESSION['username'])) { ?>
            <li>
                <a><?php echo $_SESSION['username']; ?> <i class="fas fa-chevron-down"></i></a>
                <ul>
                    <li><a href="../../../../../log-out.php">Log Out</a></li>
                </ul>
            </li>
            <?php } else { ?>
            <li>
                <a href="../../../../../log-in.php">Log in</a>
            </li>
            <?php } ?>
        </ul>
    </nav>
</header>

</div>
<!--END OF HEADER-->


<div class="wrapper row3">
    <main class="hoc container clear">
        <div class="row">
            <?php if ($allowed_to_submit) { ?>
                <div class="col-lg-6 col-md-6">
                    <h2>New Precipitation</h2>
                    <?php if (!empty($message)) echo $message; ?>
                    <form action="" method="post">
                        <div>
                            <label for="record_date">Record Date</label>
                            <input type="date" name="record_date" required max="<?php echo $today; ?>">
                        </div>
                        <div>
                            <label for="farm_name">Farm Name</label>
                            <input type="text" name="farm_name" required readonly value="horizon_bebeka_farm_01" placeholder="Agriceft-Beha">
                        </div>
                        <div>
                            <label for="precipitation">Precipitation</label>
                            <input type="text" name="precipitation" required>
                        </div>
                        <div>
                            <label for="additional_information">Additional Information</label>
                            <textarea name="additional_information" rows="5" cols="50"></textarea>
                        </div>
                        <div>
                            <input class="btn" type="submit" name="submit" value="Record">
                            <input class="btn" type="reset" name="reset" value="Reset Form">
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6 d-none d-md-block">
                    <div class="image-container">
                        <img src="../../../../../images/demo/rain-farm.png" alt="Rain Farm" class="img-fluid" style="box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.2); border-radius: 0.45rem;">
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-12 text-center">
                    <h2>Access Denied</h2>
                    <p>You do not have permission to access this page.</p>
                </div>
            <?php } ?>
        </div>
    </main>
</div>

<!--PAGE FOOTER START-->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <div class="one_quarter first">
      <h6 class="heading">Our Company</h6>
      <p>Midroc Investment Group is a group of Sheikh Mohammed Hussien Ali Al-Amoudi’s companies, mainly engaged in agriculture, agro-processing, manufaturing, mining, hotel, resort, construction, real-estate and commercial endeavors.</p>
  </div>
  
  <div class="one_quarter">
    <h6 class="heading">Quick Links</h6>
    <ul class="nospace linklist contact btmspace-30">
      <li><i class="fa fa-external-link me-2"></i><a href="../../../../../farms.php" style="color: white;">Farms</a></li>
      <li><i class="fa fa-external-link me-2"></i><a href="https://www.midrocinvestmentgroup.com/" style="color: white;">Main Site</a></li>
      </ul>
  </div>

  <div class="one_quarter ">
    <h6 class="heading">Contact US</h6>
    <ul class="nospace linklist contact btmspace-30">
      <li><a href="tel:+251115549791" style="color: white;"><i class="fas fa-phone"></i> +251 11 554 9791/95</a></li>
      <li><a href="mailto:migpr@midrocinvestmentgroup.com" style="color: white;"><i class="fa fa-envelope"></i>migpr@midrocinvestmentgroup.com</a></li>
      <li><a href="https://web.facebook.com/profile.php?id=100076612531374" style="color: white;"><i class="fab fa-facebook-f"></i>Facebook</a></li>
    </ul>
  </div>

  <div class="one_quarter ">
  <h6 class="heading">Address</h6>
        <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.5527931047286!2d38.756298873672975!3d9.013231689238351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b85bf6a52d413%3A0x36426cf036cf580d!2zTmFuaSBCdWlsZGluZyB8IFN0YWRpdW0gfCDhipPhipIg4YiF4YqV4Yy7IHwg4Yi14Ymz4Yu14Yuo4Yid!5e0!3m2!1sen!2set!4v1738511669034!5m2!1sen!2set" width="100%" frameborder="0" style="border:0; border-radius: 5px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15); height: 200px;" allowfullscreen=""></iframe>
        </div>
  </div>
</footer>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p>Copyright &copy; 2024 - All Rights Reserved - <a href="https://www.midrocinvestmentgroup.com/">MIDROC Investment Group</a></p>
  </div>
</div>
<!--PAGE FOOTER END-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>