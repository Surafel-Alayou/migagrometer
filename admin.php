 <?php session_start();
 ?>
 <!DOCTYPE html>
<html lang="">
<head>
  <title>agrometclub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  </head>
<body id="top">

<!--START OF HEADER-->
<div class="wrapper row1">
<header id="header" class="hoc clear">
    <div id="logo" class="fl_left" style="width: 200px; padding:0; margin: 10px auto;"> 
        <a href="index.php"><img src="images/demo/MIG-Logo2.jpg" alt=""></a>
    </div>
    <nav id="mainav" class="fl_right"> 
        <ul class="clear">
            <li class="active"><a href="index.php">Home</a></li>
            <li>
                <a href="#">Farms <i class="fas fa-chevron-down"></i></a>
                <ul>
                    <li><a href="farms/horizon.php">Horizon</a></li>
                    <li><a href="farms/agriceft.php">Agriceft</a></li>
                    <li><a href="farms/elfora.php">Elfora</a></li>
                    <li><a href="farms/jitu.php">Jitu</a></li>
                </ul>
            </li>
            <?php if (isset($_SESSION['username'])) { ?>
            <li>
                <a><?php echo $_SESSION['username']; ?> <i class="fas fa-chevron-down"></i></a>
                <ul>
                    <li><a href="log-out.php">Log Out</a></li>
                </ul>
            </li>
            <?php } else { ?>
            <li>
                <a href="log-in.php">Log in</a>
            </li>
            <?php } ?>
        </ul>
    </nav>
</header>

</div>
<!--END OF HEADER-->

  <!-- Jobs Start -->
  <div class="container-xxl py-5">
  <div class="center" >
      <h6 class="heading font-x2">Admin Page</h6>
    </div>
            <div class="container">
            <?php
// Include the database connection file
include("php/Connection.php");

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        // Register a new user
        $table = $_POST['table'];
        $user_name = $_POST['user_name'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $sql = "INSERT INTO $table (User_name, Phone_number, Password, Email) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssss", $user_name, $phone_number, $password, $email);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['remove'])) {
        // Remove a user
        $table = $_POST['table'];
        $user_name = $_POST['user_name'];

        $sql = "DELETE FROM $table WHERE User_name = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $user_name);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['update'])) {
        // Update user details
        $table = $_POST['table'];
        $user_name = $_POST['user_name'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $sql = "UPDATE $table SET Phone_number = ?, Password = ?, Email = ? WHERE User_name = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssss", $phone_number, $password, $email, $user_name);
        $stmt->execute();
        $stmt->close();
    }
}

// Fetch users from the selected table
$table = $_GET['table'] ?? 'registered'; // Default table
$sql = "SELECT * FROM $table";
$result = $connection->query($sql);
$users = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    $result->free();
}
?>



    <!-- Table Selection -->
    <form method="GET">
        <label for="table">Select Table:</label>
        <select name="table" id="table">
            <option value="registered" <?= $table === 'registered' ? 'selected' : '' ?>>Registered</option>
            <option value="awash_users" <?= $table === 'awash_users' ? 'selected' : '' ?>>Awash Users</option>
            <option value="gojjam_users" <?= $table === 'gojjam_users' ? 'selected' : '' ?>>Gojjam Users</option>
        </select>
        <button type="submit">Load Table</button>
    </form>

    <!-- User List -->
    <h2>Users in <?= ucfirst(str_replace('_', ' ', $table)) ?></h2>
    <table border="1">
        <tr>
            <th>User Name</th>
            <th>Phone Number</th>
            <th>Password</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['User_name'] ?></td>
            <td><?= $user['Phone_number'] ?></td>
            <td><?= $user['Password'] ?></td>
            <td><?= $user['Email'] ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="table" value="<?= $table ?>">
                    <input type="hidden" name="user_name" value="<?= $user['User_name'] ?>">
                    <button type="submit" name="remove">Remove</button>
                </form>
                <button onclick="openUpdateForm('<?= $user['User_name'] ?>', '<?= $user['Phone_number'] ?>', '<?= $user['Password'] ?>', '<?= $user['Email'] ?>')">Update</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Register User Form -->
    <h2>Register New User</h2>
    <form method="POST">
        <input type="hidden" name="table" value="<?= $table ?>">
        <label for="user_name">User Name:</label>
        <input type="text" name="user_name" required><br>
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <button type="submit" name="register">Register</button>
    </form>

    <!-- Update User Form (Hidden by Default) -->
    <h2>Update User</h2>
    <form method="POST" id="updateForm" style="display:none;">
        <input type="hidden" name="table" value="<?= $table ?>">
        <input type="hidden" name="user_name" id="update_user_name">
        <label for="update_phone_number">Phone Number:</label>
        <input type="text" name="phone_number" id="update_phone_number" required><br>
        <label for="update_password">Password:</label>
        <input type="password" name="password" id="update_password" required><br>
        <label for="update_email">Email:</label>
        <input type="email" name="email" id="update_email" required><br>
        <button type="submit" name="update">Update</button>
    </form>

 
            </div>
        </div>
        <!-- Jobs End -->


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
      <li><i class="fa fa-external-link me-2"></i><a href="farms.php" style="color: white;">Farms</a></li>
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

<!--BACK TO TOP BUTTON-->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script>
        function openUpdateForm(user_name, phone_number, password, email) {
            document.getElementById('updateForm').style.display = 'block';
            document.getElementById('update_user_name').value = user_name;
            document.getElementById('update_phone_number').value = phone_number;
            document.getElementById('update_password').value = password;
            document.getElementById('update_email').value = email;
        }
    </script>

</body>
</html>