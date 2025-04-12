<?php session_start();
 ?>
 <!DOCTYPE html>
<html lang="">
<head>
  <title>agrometclub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta property="og:image" content="images/logo.png" />
  <link href="images/logo.png" rel="icon">
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
      <h6 class="heading font-x2">Update user</h6>
    </div>
            <div class="container">
            <?php
// Include the database connection file
include("php/Connection.php");

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
     
  
        // Update user details
        $table = $_POST['table'];
        $user_name = $_POST['user_name'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $allowed_farm = $_POST['allowed_farm'];

        $sql = "UPDATE $table SET Phone_number = ?, Password = ?, Allowed_farm = ? WHERE User_name = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssss", $phone_number, $password, $allowed_farm, $user_name);
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

    <!-- User List -->
    <h2>Existing Users</h2>
    <div class="table-responsive">
    <table border="1">
        <tr>
            <th>User Name</th>
            <th>Phone Number</th>
            <th>Password</th>
            <th>Allowed Farm</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['User_name'] ?></td>
            <td><?= $user['Phone_number'] ?></td>
            <td><?= $user['Password'] ?></td>
            <td><?= $user['Allowed_farm'] ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="table" value="<?= $table ?>">
                    <input type="hidden" name="user_name" value="<?= $user['User_name'] ?>">
                </form>
                <button class="btn btn-primary" style="background-color: #007bff;" onclick="openUpdateForm('<?= $user['User_name'] ?>', '<?= $user['Phone_number'] ?>', '<?= $user['Password'] ?>', '<?= $user['Allowed_farm'] ?>')">Update</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
        </div>


    <!-- Update User Form (Hidden by Default) -->
    <h2>Update User</h2>
    <form method="POST" id="updateForm" style="display:none;">
        <input type="hidden" name="table" value="<?= $table ?>">
        <input type="hidden" name="user_name" id="update_user_name">
        <label for="update_phone_number">Phone Number:</label>
        <input type="text" name="phone_number" id="update_phone_number" required><br>
        <label for="update_password">Password:</label>
        <input type="password" name="password" id="update_password" required><br>
        <label for="allowed_farm">Allowed Farm:</label>
                        <select name="allowed_farm" id="update_allowed_farm" required>
                        <option value="agriceft_duyina_unit_01">Agriceft-Duyina-Unit-01</option>
    <option value="agriceft_duyina_unit_02">Agriceft-Duyina-Unit-02</option>
    <option value="agriceft_duyina_unit_03">Agriceft-Duyina-Unit-03</option>
    <option value="agriceft_duyina_unit_04">Agriceft-Duyina-Unit-04</option>
    <option value="agriceft_gumadero_unit_01">Agriceft-Gumadero-Unit-01</option>
    <option value="agriceft_gumadero_unit_02">Agriceft-Gumadero-Unit-02</option>
    <option value="agriceft_gumadero_unit_03">Agriceft-Gumadero-Unit-03</option>
    <option value="agriceft_gumadero_unit_04">Agriceft-Gumadero-Unit-04</option>
    <option value="agriceft_gumero_unit_01">Agriceft-Gumero-Unit-01</option>
    <option value="agriceft_gumero_unit_02">Agriceft-Gumero-Unit-02</option>
    <option value="agriceft_gumero_unit_03">Agriceft-Gumero-Unit-03</option>
    <option value="agriceft_wush_wush_unit_01">Agriceft-Wush-Wush-Unit-01</option>
    <option value="agriceft_wush_wush_unit_02">Agriceft-Wush-Wush-Unit-02</option>
    <option value="agriceft_wush_wush_unit_03">Agriceft-Wush-Wush-Unit-03</option>
    <option value="elfora_chefa">Elfora-Chefa</option>
    <option value="elfora_melga">Elfora-Melga</option>
    <option value="elfora_shallo_av">Elfora-Shallo-AV</option>
    <option value="elfora_shallo_unit_1">Elfora-Shallo-Unit-1</option>
    <option value="elfora_shallo_unit_2">Elfora-Shallo-Unit-2</option>
    <option value="elfora_shallo_unit_3">Elfora-Shallo-Unit-3</option>
    <option value="elfora_shallo_unit_4">Elfora-Shallo-Unit-4</option>
    <option value="horizon_bebeka_farm_01">Horizon-Bebeka-Farm-01</option>
    <option value="horizon_bebeka_farm_02">Horizon-Bebeka-Farm-02</option>
    <option value="horizon_bebeka_farm_03">Horizon-Bebeka-Farm-03</option>
    <option value="horizon_bebeka_farm_04">Horizon-Bebeka-Farm-04</option>
    <option value="horizon_bebeka_farm_05">Horizon-Bebeka-Farm-05</option>
    <option value="horizon_cheleleki">Horizon-Cheleleki</option>
    <option value="horizon_gojeb">Horizon-Gojeb</option>
    <option value="horizon_goma_1_05">Horizon-Goma-1-05</option>
    <option value="horizon_goma_1_mo">Horizon-Goma-1-MO</option>
    <option value="horizon_goma_2">Horizon-Goma-2</option>
    <option value="horizon_gumer">Horizon-Gumer</option>
    <option value="horizon_kossa_algie">Horizon-Kossa-Algie</option>
    <option value="horizon_kossa_dembi">Horizon-Kossa-Dembi</option>
    <option value="horizon_kossa_gurumu">Horizon-Kossa-Gurumu</option>
    <option value="horizon_kossa_office">Horizon-Kossa-Office</option>
    <option value="horizon_sentu_central">Horizon-Sentu-Central</option>
    <option value="horizon_sentu_gijeb">Horizon-Sentu-Gijeb</option>
    <option value="horizon_sentu_tenebo">Horizon-Sentu-Tenebo</option>
    <option value="jitu_jitu_bishoftu">Jitu-Bishoftu</option>
    <option value="jitu_jitu_holeta">Jitu-Holeta</option>
    <option value="jitu_jitu_koka">Jitu-Koka</option>
    <option value="jitu_jitu_tkurwuha">Jitu-Tkurwuha</option>
                        </select>
                        <br>
        <button class="btn btn-primary" type="submit" name="update">Update</button>
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
        function openUpdateForm(user_name, phone_number, password, allowed_farm) {
            document.getElementById('updateForm').style.display = 'block';
            document.getElementById('update_user_name').value = user_name;
            document.getElementById('update_phone_number').value = phone_number;
            document.getElementById('update_password').value = password;
            document.getElementById('update_allowed_farm').value = allowed_farm;
        }
    </script>

</body>
</html>