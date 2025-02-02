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

<div class="wrapper row3">
  <section class="hoc container clear"> 
    <div class="center btmspace-80" >
      <h6 class="heading font-x2">Welcome to agrometclub</h6>
      <p>This website serves as a platform for data collection and visualization for MIDROC Investment Group farms and their sub-sites. It enables efficient tracking, management, and analysis of agricultural data to support informed decision-making and operational optimization.</p>
      <footer><a class="btn" href="farms.php">Farm Sites</a></footer>
    </div>
    <ul id="latest" class="nospace group">
      <li class="one_third first">
        <article>
          <figure><a href="daily.php"><img src="images/demo/scatter-graph.png" alt=""></a></figure>
          <div class="excerpt">
            <h6 class="heading" style="color: #1e7552; font-weight: bold;">Daily Precipitation</h6>
          <p style="text-align: justify;">These plot provides a visualization of daily precipitation, indicating the total water from rain, snow, or hail recorded within a 24-hour period, which helps track weather patterns and assess water availability. </p>
        </div>
      </article>
      
    </li>
   
      <li class="one_third">
        <article>
          <figure><a href="monthly.php"><img src="images/demo/line-chart.png" alt=""></a></figure>
          <div class="excerpt">
            <h6 class="heading" style="color: #1e7552; font-weight: bold;">Monthly Precipitation</h6>
            <p style="text-align: justify;">These plot provides a visualization of monthly precipitation, showing the total sum of daily precipitation within each month. It uses line plots to highlight trends, helping to track seasonal patterns and assess water availability over time. </p>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article>
          <figure><a href="yearly.php"><img src="images/demo/bar-chart.png" alt=""></a></figure>
          <div class="excerpt">
            <h6 class="heading" style="color: #1e7552; font-weight: bold;">Annual Precipitation</h6>
            <p style="text-align: justify;">These bar chart provides a visualization of annual precipitation, showing the total sum of daily precipitation over the entire year. It helps track yearly trends and assess overall water availability.</p>
          </div>
        </article>
      </li>
  </ul>
</section>
</div>

<!--PAGE FOOTER START-->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <div class="one_quarter first">
      <h6 class="heading">Our Company</h6>
      <p style="text-align: justify;">Midroc Investment Group is a group of Sheikh Mohammed Hussien Ali Al-Amoudi’s companies, mainly engaged in agriculture, agro-processing, manufaturing, mining, hotel, resort, construction, real-estate and commercial endeavors.</p>
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