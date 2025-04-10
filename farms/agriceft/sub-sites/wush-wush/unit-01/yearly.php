<?php
// Initialize an empty array to hold the data points
$dataPoints = array();
$yearsWithData = array();

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

    // SQL query to sum precipitation per year
    $handle = $link->prepare('SELECT YEAR(Record_date) AS year, SUM(Precipitation) AS totalPrecipitation FROM agriceft_wush_wush_unit_01 GROUP BY YEAR(Record_date) ORDER BY YEAR(Record_date)');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
        
    // Loop through the query result and populate $dataPoints array
    foreach ($result as $row) {
        // Push the year and corresponding total precipitation into the dataPoints array
        array_push($dataPoints, array("x" => $row->year, "y" => $row->totalPrecipitation));
        // Track years with data for future processing
        $yearsWithData[] = $row->year;
    }
    
    // Get the range of years (min and max) from the data
    $minYear = min($yearsWithData);
    $maxYear = max($yearsWithData);
    
    // Generate the data points for every year in the range, even if no data exists for some years
    $finalDataPoints = array();
    for ($year = $minYear; $year <= $maxYear; $year++) {
        $found = false;
        foreach ($dataPoints as $point) {
            if ($point['x'] == $year) {
                $finalDataPoints[] = $point;
                $found = true;
                break;
            }
        }
        // If no data found for this year, we don't add it
        if (!$found) {
            $finalDataPoints[] = array("x" => $year, "y" => null); // Optional: you can choose not to include this year in the dataPoints at all
        }
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
<link href="../../../../../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<script>
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        fontFamily: "Poppins, serif",
        options: {
            layout: {
                padding: 20
            }
        },
        theme: "light2", // A different theme for a clean look
        title: {
            text: "Precipitation by Year", // Customize the chart title
            fontFamily: "Poppins, serif",
            fontColor: "#4F4F4F", // Dark gray for title color
            fontSize: 20
        },
        axisX: {
            title: "Years", // X-Axis label
            interval: 1, // Ensure the years increment by 1
            valueFormatString: "####", // Display years as a 4-digit number
            labelFontColor: "#5D5D5D", // Dark gray color for X labels
            fontFamily: "Poppins, serif",
            labelFontSize: 14, // Font size for X-axis labels
            gridThickness: 1, // Add grid lines
            gridColor: "#E6E6E6" // Light gray grid lines
        },
        axisY: {
            title: "Precipitation (mm)", // Y-Axis label
            labelFontColor: "#5D5D5D", // Dark gray color for Y labels
            labelFontSize: 14, // Font size for Y-axis labels
            fontFamily: "Poppins, serif",
            gridThickness: 1, // Add grid lines
            gridColor: "#E6E6E6", // Light gray grid lines
            minimum: 0 // Ensure Y-axis starts at 0
        },
        data: [{
            type: "column", // You can change this to other chart types like "bar", "line", etc.
            dataPoints: <?php echo json_encode($finalDataPoints, JSON_NUMERIC_CHECK); ?>, // Data passed from PHP to JS
            indexLabel: "{y}", // Display the value on top of each bar
            indexLabelPlacement: "outside", // Position the label outside the bar
            indexLabelFontColor: "black", // Set the font color for the labels
            indexLabelFontSize: 14, // Set the font size for the labels
            color: "#4CAF50", // Bar color (a green shade)
            fontFamily: "Poppins, serif",
            borderColor: "#388E3C", // Border color for each bar
            borderThickness: 2, // Thickness of the border around bars
            barWidth: 25 // Adjust the bar width for better aesthetics
        }],
        backgroundColor: "#f9f9f9" // Light gray background for the chart
    });
    chart.render();

    // Add a download button for the chart
    var downloadButton = document.createElement("button");
    downloadButton.innerHTML = "Download CSV";
    downloadButton.style.margin = "0px auto 40px auto";
    downloadButton.style.padding = "6px 10px";
    downloadButton.style.backgroundColor = "#1e7552";
    downloadButton.style.color = "white";
    downloadButton.style.border = "none";
    downloadButton.style.borderRadius = "5px";
    downloadButton.style.cursor = "pointer";
    downloadButton.onclick = function() {
        downloadCSV(<?php echo json_encode($finalDataPoints, JSON_NUMERIC_CHECK); ?>);
    };

    // Append the button below the chart container
    var container = document.getElementById("chartContainer");
    container.parentNode.insertBefore(downloadButton, container.nextSibling);
}

// Function to convert data to CSV and trigger download
function downloadCSV(dataPoints) {
    var csvContent = "data:text/csv;charset=utf-8,";
    csvContent += "Year,Precipitation (mm)\n"; // CSV header

    dataPoints.forEach(function(point) {
        csvContent += point.x + "," + (point.y !== null ? point.y : "N/A") + "\n";
    });

    var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "precipitation_by_year.csv");
    document.body.appendChild(link); // Required for Firefox
    link.click(); // Trigger the download
    document.body.removeChild(link); // Clean up
}
</script>
</head>
<body>
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
<!-- The chart will be rendered inside this div -->
<div id="chartContainer" style="height: 400px; width: 100%; margin-bottom: 30px;"></div>
<!-- Include the CanvasJS library -->
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script src="../../../../../layout/scripts/jquery.min.js"></script>
<script src="../../../../../layout/scripts/jquery.backtotop.js"></script>
<script src="../../../../../layout/scripts/jquery.mobilemenu.js"></script>

</body>
</html>