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
      <h6 class="heading font-x2">Farms</h6>
    </div>
            <div class="container">

                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">

                            <div class="job-item p-4 mb-4 tt-0">
                                <div class="row g-4">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="images/demo/coffee.jpg" alt="">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Horizon</h5>
                                            <p>Cultivate premium coffee and grow vital oilseeds to support Ethiopia’s edible oil supply. Our large-scale farms use sustainable, modern practices to boost productivity and quality.</p>
                                            <a class="btn mr-2 mb-2" href="farms/horizon.php"><i class="fa fa-external-link me-2"></i>Sites</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="images/demo/flower.jpg" alt="">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Agriceft</h5>
                                            <p>Grow coffee, tea, cereals, pulses, and spices. Our crops supply local and international markets, backed by efficient irrigation and processing systems to ensure quality and sustainability. </p>
                                            <a class="btn  mr-2 mb-2" href="farms/agriceft.php"><i class="fa fa-external-link me-2"></i>Sites</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="images/demo/elfora-farm.jpg" alt="">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Elfora</h5>
                                            <p>Grow a range of crops including maize, haricot beans, soybeans, tomatoes, onions, carrots, avocados, and papayas. Using modern irrigation and farming techniques, we ensure year-round production to support food security and agro-processing in Ethiopia.</p>
                                            <a class="btn  mr-2 mb-2" href="farms/elfora.php"><i class="fa fa-external-link me-2"></i>Sites</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="images/demo/potato.jpg" alt="">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Jitu</h5>
                                            <p>Specialize in high-quality fruits and vegetables for export and local markets. With advanced greenhouse and field systems, we deliver fresh, reliable produce that meets international standards.</p>
                                            <a class="btn  mr-2 mb-2" href="farms/jitu.php"><i class="fa fa-external-link me-2"></i>Sites</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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
</body>
</html>