<?php
// Initialize an empty array to hold the data points for each month
$allDataPoints = array();

try {
    // Database connection details
    $link = new \PDO(
        'mysql:host=localhost;dbname=migagrometer;charset=utf8mb4', // Database: migagrometer
        'root', // Username: root
        '', // No password
        array(
            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
        )
    );

    // SQL query to get all available months and years with data
    $handle = $link->prepare('SELECT MONTH(Record_date) AS month, YEAR(Record_date) AS year 
                          FROM agriceft_gumadero_unit_02 
                          GROUP BY YEAR(Record_date), MONTH(Record_date) 
                          ORDER BY YEAR(Record_date) DESC, MONTH(Record_date) DESC');
    $handle->execute();
    $monthsAndYears = $handle->fetchAll(\PDO::FETCH_OBJ);

    // Fetch daily data for each month and year
    foreach ($monthsAndYears as $entry) {
        $month = $entry->month;
        $year = $entry->year;

        // SQL query to get daily precipitation data for the selected month and year
        $handle = $link->prepare('SELECT DAY(Record_date) AS day, SUM(Precipitation) AS totalPrecipitation 
                                  FROM agriceft_gumadero_unit_02 
                                  WHERE MONTH(Record_date) = :month AND YEAR(Record_date) = :year
                                  GROUP BY DAY(Record_date) ORDER BY DAY(Record_date)');
        $handle->bindParam(':month', $month, \PDO::PARAM_INT);
        $handle->bindParam(':year', $year, \PDO::PARAM_INT);
        $handle->execute();
        $result = $handle->fetchAll(\PDO::FETCH_OBJ);

        // Prepare data points for the current month and year
        $dataPoints = array();
        foreach ($result as $row) {
            array_push($dataPoints, array("x" => $row->day, "y" => $row->totalPrecipitation));
        }

        // Store data for the current month
        $allDataPoints[] = array(
            "month" => $month,
            "year" => $year,
            "dataPoints" => $dataPoints
        );
    }

    $link = null; // Close the database connection
}
catch (\PDOException $ex) {
    // If there's an error, display the error message
    print($ex->getMessage());
}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../../../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<script>
window.onload = function () {
    // Define an array for months
    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    
    var allDataPoints = <?php echo json_encode($allDataPoints, JSON_NUMERIC_CHECK); ?>;

    // Check if there's data to plot
    if (allDataPoints.length === 0) {
        alert("No data found.");
        return; // Exit if there's no data to display
    }

    // Loop through each month and plot a chart
    allDataPoints.forEach(function(entry) {
        var chartContainer = "chartContainer" + entry.year + entry.month;
        var chart = new CanvasJS.Chart(chartContainer, {
            animationEnabled: true,
            exportEnabled: true,
            options: {
                layout: {
                    padding: 20
                }
            },
            fontFamily: "Poppins, serif",
            theme: "light2", // A different theme for a clean look
            title: {
                text: "Precipitation by Day for " + monthNames[entry.month - 1] + " " + entry.year, // Month and Year in title
                fontColor: "#4F4F4F", // Dark gray for title color
                fontSize: 20
            },
            axisX: {
                title: "Days", // X-Axis label
                interval: 1, // Ensure the days increment by 1
                valueFormatString: "##", // Display day as a 2-digit number
                labelFontColor: "#5D5D5D", // Dark gray color for X labels
                labelFontSize: 14, // Font size for X-axis labels
                fontFamily: "Poppins, serif",
                gridThickness: 1, // Add grid lines
                gridColor: "#E6E6E6" // Light gray grid lines
            },
            axisY: {
                title: "Precipitation (mm)", // Y-Axis label
                labelFontColor: "#5D5D5D", // Dark gray color for Y labels
                labelFontSize: 14, // Font size for Y-axis labels
                gridThickness: 1, // Add grid lines
                fontFamily: "Poppins, serif",
                gridColor: "#E6E6E6", // Light gray grid lines
                minimum: 0 // Ensure Y-axis starts at 0
            },
            data: [{
                type: "scatter", // Scatter plot
                dataPoints: entry.dataPoints, // Data passed from PHP to JS
                markerType: "circle", // Scatter chart uses circles for markers
                markerSize: 10, // Size of scatter plot markers
                fontFamily: "Poppins, serif",
                color: "#4CAF50", // Color of the scatter plot points
                toolTipContent: "Day {x}: {y} mm", // Tooltip format
            }],
            backgroundColor: "#f9f9f9" // Light gray background for the chart
        });

        chart.render();

        // Add a download button for each chart
        var downloadButton = document.createElement("button");
        downloadButton.innerHTML = "Download CSV for " + monthNames[entry.month - 1] + " " + entry.year;
        downloadButton.style.margin = "0px auto 40px auto";
        downloadButton.style.padding = "6px 10px";
        downloadButton.style.backgroundColor = "#1e7552";
        downloadButton.style.color = "white";
        downloadButton.style.border = "none";
        downloadButton.style.borderRadius = "5px";
        downloadButton.style.cursor = "pointer";
        downloadButton.onclick = function() {
            downloadCSV(entry.year, entry.month, entry.dataPoints, monthNames);
        };

        // Append the button below the chart container
        var container = document.getElementById(chartContainer);
        container.parentNode.insertBefore(downloadButton, container.nextSibling);
    });
}

// Function to convert data to CSV and trigger download
function downloadCSV(year, month, dataPoints, monthNames) {
    var csvContent = "data:text/csv;charset=utf-8,";
    csvContent += "Day,Precipitation (mm)\n"; // CSV header

    dataPoints.forEach(function(point) {
        csvContent += point.x + "," + point.y + "\n";
    });

    var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "precipitation_data_" + monthNames[month - 1] + "_" + year + ".csv");
    document.body.appendChild(link); // Required for Firefox
    link.click(); // Trigger the download
    document.body.removeChild(link); // Clean up
}
</script>
</head>
<body id="top">
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
                    <li><a href="../../../../horizon.php">Horizon</a></li>
                    <li><a href="../../../../agriceft.php">Agriceft</a></li>
                    <li><a href="../../../../elfora.php">Elfora</a></li>
                    <li><a href="../../../../jitu.php">Jitu</a></li>
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
<!-- The chart containers will be dynamically generated below -->
<?php
// Dynamically generate a container for each month and year
foreach ($allDataPoints as $entry) {
    echo '<div id="chartContainer' . $entry['year'] . $entry['month'] . '" style="height: 400px; width: 100%; margin-bottom: 30px;"></div>';
}
?>

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
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script src="../../../../../layout/scripts/jquery.min.js"></script>
<script src="../../../../../layout/scripts/jquery.backtotop.js"></script>
<script src="../../../../../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>