<?php
session_start();
include("php/Connection.php");

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: Log in.php");
    exit();
}

// Handle CSV download
if (isset($_GET['download']) && $_GET['download'] === 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="data_records.csv"');

    $output = fopen('php://output', 'w');
    fputcsv($output, ['Record Date', 'Farm Name', 'Precipitation', 'Additional Information']);

    $sql = "SELECT * FROM elfora";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, [
                date('Y-m-d H:i:s', strtotime($row['Record_date'])), // Standard date format for CSV
                $row['Farm_name'],
                $row['Precipitation'],
                $row['Additional_information']
            ]);
        }
    }

    fclose($output);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .table-actions {
            margin: 10px 0;
            text-align: right;
        }
        .table-actions a {
            text-decoration: none;
            margin-left: 10px;
            padding: 5px 10px;
            border: 1px solid #0078D7;
            border-radius: 5px;
            color: #fff;
            background-color: #0078D7;
        }
        .table-actions a:hover {
            background-color: #005EA6;
        }
    </style>
</head>
<body>

<!-- Header Section -->
<div class="wrapper row1">
    <header id="header" class="hoc clear">
        <div id="logo" class="fl_left"></div>
        <nav id="mainav" class="fl_right"> 
            <ul class="clear">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a class="drop" href="#">Laboratories</a>
                    <ul>
                        <li><a href="AMSE.php">Advanced materials and solar energy</a></li>
                    </ul>
                </li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a class="drop"><?php echo htmlspecialchars($_SESSION['username']); ?></a>
                        <ul>
                            <li><a href="Log out.php">Log out</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a href="Log in.php">Log in</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
</div>

<!-- Table Content Section -->
<div class="wrapper row3">
    <main class="hoc container clear">
        <h1>Data Records</h1>
        
        <!-- Links for Read and Download CSV -->
        <div class="table-actions">
            <a href="data.php">🔄 Refresh Data</a>
            <a href="data.php?download=csv">📥 Download CSV</a>
        </div>

        <?php
        // Fetch existing records from the database
        $sql = "SELECT * FROM elfora";
        $result = $connection->query($sql);
        ?>

        <table>
            <thead>
                <tr>
                    <th>Record Date</th>
                    <th>Farm</th>
                    <th>Precipitation</th>
                    <th>Additional Information</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo date('m/d/y h:i A', strtotime($row['Record_date'])); ?></td>
                            <td><?php echo htmlspecialchars($row['Farm_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['Precipitation']); ?></td>
                            <td><?php echo htmlspecialchars($row['Additional_information']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</div>

<!-- Footer Section -->
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

<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
