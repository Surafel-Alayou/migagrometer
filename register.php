
<!DOCTYPE html>

<html lang="en-US">

<head>
  <title>BDU physics department</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body id="top">
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
                    <li><a href="log-out.php">Log Out</a></li>
                </ul>
            </li>
            <?php } else { ?>

            <?php } ?>
        </ul>
    </nav>
</header>
  </div>

  <div class="wrapper row3">
    <section class="hoc container clear">
     <?php
     require_once("php/Connection.php");
     if(isset($_POST['submit'])){
      $user_name=$_POST['username'];
      $phone_number=$_POST['phonenumber'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      if($user_name!=""  or $phone_number!="" or $email!="" or $password!=""){

        $sql="INSERT INTO Registered (ID,User_name,Phone_number,Email,Password)  VALUES ('', '".$user_name."','".$phone_number."','".$email."','".$password."') ";
        if(mysqli_query($connection,$sql)){
          header("location:log-in.php");

        }else{

          echo "";
        }

      }else{
        echo "Please fill all the fields";
      }

    }

    ?> 
    <form action="#" method="post">
      <div class="one_third first">
        <label>User name</label>
        <input type="text" name="username" value="" size="22" required>

        <label>Phone number</label>
        <input type="text" name="phonenumber"  value="" size="22" required>

        <label>Email</label>
        <input type="email" name="email" value="" size="22" required>

        <label>Password</label>
        <input type="password" name="password"  value="" size="22" required>
        <input class="btn  mt-3 mb-2" type="submit" name="submit" value="Register">
        <p><a href="log-in.php">Already have an account?</a></p>
      </div>

    </form>
  </section>
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
      <li><i class="fa fa-external-link me-2"></i><a href="farms.php" style="color: white;">Farms</a></li>
      <li><i class="fa fa-external-link me-2"></i><a href="insert-data.php" style="color: white;">Insert Data</a></li>
      <li><i class="fa fa-external-link me-2"></i><a href="register.php" style="color: white;">Register</a></li>
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

<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>