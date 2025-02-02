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
                    <li><a href="AMSE.php">Elfora</a></li>
                    <li><a href="pages/full-width.html">Awash</a></li>
                    <li><a href="pages/sidebar-left.html">Gojam</a></li>
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
<!--END OF HEADER-->

  <!-- Jobs Start -->
  <div class="container-xxl py-5">
  <div class="center" >
      <h6 class="heading font-x2">Farm Sites</h6>
    </div>
            <div class="container">

                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4 tt-0">
                                <div class="row g-4">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="images/demo/elfora-farm.jpg" alt="">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Elfora</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer massa lacus, dictum id quam et, fringilla accumsan enim. Nam venenatis est eget arcu pulvinar volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla faucibus purus non nulla imperdiet cursus. In hac habitasse platea dictumst.  </p>
                                            <a class="btn mr-2 mb-2" href="elfora.php"><i class="fa fa-external-link me-2"></i>More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="images/demo/coffee-farm.jpg" alt="">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Awash</h5>
                                            <p>Nulla facilisi. Curabitur gravida risus nibh, eleifend eleifend sem tincidunt a. Phasellus faucibus felis arcu, vitae facilisis dolor semper sed. Vestibulum sed purus quis sem dignissim congue sed nec lectus. Suspendisse potenti. Maecenas tincidunt, tellus a tincidunt facilisis, sem nisl congue lorem, id accumsan ante lorem ut nibh. </p>
                                            <a class="btn  mr-2 mb-2" href=""><i class="fa fa-external-link me-2"></i>More</a>
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
      <p>Midroc Investment Group is a group of Sheikh Mohammed Hussien Ali Al-Amoudi’s companies, mainly engaged in Agriculture, Agro-processing, Manufaturing, Mining, Hotel , Resort, Construction, Real-estate, and Commercial endeavors.</p>
  </div>
  
  <div class="one_quarter">
    <h6 class="heading">Quick Links</h6>
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
        Nani building, Near Ghion Hotel, Stadium, Addis Ababa Ethiopia
        </address>
      </li>
      <li><i class="fas fa-phone"></i> (+251) 11 554 9791/95</li>
      <li><i class="far fa-envelope"></i>migpr@midrocinvestmentgroup.com</li>
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
    <p>Copyright &copy; 2024 - All Rights Reserved - <a href="#">MIDROC Investment Group</a></p>
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