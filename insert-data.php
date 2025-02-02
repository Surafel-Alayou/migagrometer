<?php
session_start();
include("php/Connection.php");

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: Log in.php");
    exit();
}

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize message variable
$message = "";

// Handle form submission
if (isset($_POST['submit'])) {
    $date = $_POST['Record_date'] ?? '';
    $farm = $_POST['farm_name'] ?? '';
    $precipitation = $_POST['precipitation'] ?? '';
    $additional = $_POST['additional_information'] ?? '';

    if (!empty($date) && !empty($farm) && !empty($precipitation)) {
        // Check if a record for the same date and farm already exists
        $sql_check = "SELECT * FROM elfora WHERE Record_date = ? AND Farm_name = ?";
        $stmt_check = $connection->prepare($sql_check);
        $stmt_check->bind_param('ss', $date, $farm);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // Record exists, update it
            $sql_update = "UPDATE elfora SET Precipitation = ?, Additional_information = ? WHERE Record_date = ? AND Farm_name = ?";
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
            $sql_insert = "INSERT INTO elfora (Record_date, Farm_name, Precipitation, Additional_information) 
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
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
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
<div class="wrapper row1">
<header id="header" class="hoc clear">
    <div id="logo" class="fl_left" style="width: 200px; padding:0; margin: 10px auto;"> 
        <a href="index.php"><img src="images/demo/MIG-Logo2.jpg" alt=""></a>
    </div>
    <nav id="mainav" class="fl_right"> 
        <ul class="clear">
            <li class="active"><a href="index.php">Home</a></li>
            <li>
                <a href="#">Laboratories <i class="fas fa-chevron-down"></i></a>
                <ul>
                    <li><a href="AMSE.php">Advanced materials and solar energy</a></li>
                    <li><a href="pages/full-width.html">Full Width</a></li>
                    <li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
                    <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
                    <li><a href="pages/basic-grid.html">Basic Grid</a></li>
                    <li><a href="pages/font-icons.html">Font Icons</a></li>
                </ul>
            </li>
            <?php if (isset($_SESSION['username'])) { ?>
            <li>
                <a><?php echo $_SESSION['username']; ?> <i class="fas fa-chevron-down"></i></a>
                <ul>
                    <li><a href="Log out.php">Log out</a></li>
                </ul>
            </li>
            <?php } else { ?>
            <li>
                <a href="Log in.php">Log in</a>
            </li>
            <?php } ?>
        </ul>
    </nav>
</header>
</div>

<div class="wrapper row3">
    <main class="hoc container clear">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h2>New Precipitation</h2>
                <?php if (!empty($message)) echo $message; ?>
                <form action="" method="post">
                    <div>
                        <label for="Record_date">Record Date</label>
                        <input type="date" name="Record_date" required max="<?php echo $today; ?>">
                    </div>
                    <div>
                        <label for="farm_name">Farm</label>
                        <select name="farm_name" required>
                            <option value="Elfora / Holeta">Elfora / Holeta</option>
                            <option value="Elfora / Bishoftu">Elfora / Bishoftu</option>
                            <option value="Elfora / Hawassa">Elfora / Hawassa</option>
                        </select>
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
                    <img src="images/demo/rain-farm.png" alt="Rain Farm" class="img-fluid" style="box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.2); border-radius: 0.45rem;">
                </div>
            </div>
        </div>
    </main>
</div>

<div class="wrapper row4">
    <footer id="footer" class="hoc clear">
        <div class="one_quarter first">
            <h6>Working days & hours</h6>
            <ul>
                <li>Monday - Friday</li>
                <li>Morning 8:00 AM to 12:00 PM</li>
                <li>Afternoon 2:00 PM to 5:00 PM</li>
            </ul>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>