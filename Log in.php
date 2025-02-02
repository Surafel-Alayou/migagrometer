<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Log in</title>
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
                    <li><a href="Log out.php">Log out</a></li>
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
      session_start();
      require_once("php/Connection.php");
      $errorMessage = "";

      if (isset($_POST['submit'])) {
        $user_name = $_POST['username'];
        $password = $_POST['password'];
        $sql = 'SELECT * FROM Registered WHERE User_name="' . $user_name . '" AND Password="' . $password . '"';
        $registered = mysqli_query($connection, $sql);

        if (mysqli_num_rows($registered) > 0) {
          $_SESSION['username'] = $user_name;
          header("location:index.php");
          exit();
        } else {
          $errorMessage = "Incorrect username or password.";
        }
      }
      ?> 
      <form action="#" method="post">
        <div class="one_third first">
          <label for="username">User name </label>
          <input type="text" name="username" id="name" value="" size="22" required>
          <label for="password">Password</label>
          <input type="password" name="password" id="email" value="" size="22" required>
          <input class="btn  mt-3 mb-2" type="submit" name="submit" value="Log in" style="padding: 7px;">
          
          <?php if (!empty($errorMessage)) { ?>
            <div class="alert alert-danger mt-3" role="alert">
              <?php echo $errorMessage; ?>
            </div>
          <?php } ?>
          
          <p><a href="Register.php">Don't have an account?</a></p>
        </div>
      </form>
    </section>
  </div>

  <div class="wrapper row4">
    <footer id="footer" class="hoc clear"> 
      <div class="one_quarter first">
        <h6 class="heading">Working days & hours</h6>
        <ul class="nospace linklist">
          <li>Monday - Friday</li>
          <li>Morning 8:00 AM to 12:00 AM </li>
          <li>Afternoon 2:00 PM to 5:00 PM</li>
        </ul>
      </div>
      <div class="one_quarter">
        <h6 class="heading">Closing days</h6>
        <ul class="nospace linklist">
          <li>
            <article>
              <p class="nospace btmspace-10">Saturday - Sunday</p>
            </article>
          </li>
        </ul>
      </div>
      <div class="one_quarter ">
        <h6 class="heading">Address</h6>
        <ul class="nospace linklist contact btmspace-30">
          <li><i class="fas fa-map-marker-alt"></i>
            <address>
              Street Name &amp; Number, Town, Postcode/Zip
            </address>
          </li>
          <li><i class="fas fa-phone"></i> +00 (123) 456 7890</li>
          <li><i class="far fa-envelope"></i> info@domain.com</li>
        </ul>
      </div>
    </footer>
  </div>
  <div class="wrapper row5">
    <div id="copyright" class="hoc clear"> 
      <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
      <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    </div>
  </div>

  <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
  <!-- JAVASCRIPTS -->
  <script src="layout/scripts/jquery.min.js"></script>
  <script src="layout/scripts/jquery.backtotop.js"></script>
  <script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>