<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CH SC | ADMIN</title>
    <link rel="icon" type="image/x-icon" href="images/title.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminDashBoard.css">
    <link rel="stylesheet" href="css/analytic.css">
    <?php include 'admin_header.php';?>   
</head>

<body onload="realtime()">
    <div id="columnChart"></div>
    <p id="therevenuemsg"></p>
    <?php
        $LOCALHOST = 'localhost';
        $ROOT = 'root';
        $PASSWORD = '';
        $DATABASE = 'sport';

        $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $selectedDate = null;
        if (isset($_POST['selectedDate'])) {
            $selectedDate = $_POST['selectedDate'];
        }

        // Query for most reserved timeslots
        $queryTimeslot = "SELECT timeslot, COUNT(timeslot) as total_reservations FROM sportfacilitiesreservation";
        
        // Query for total revenue
        $queryRevenue = "SELECT SUM(totalprice) as total_revenue FROM sportfacilitiesreservation";
        
        if($selectedDate){
            $yearMonth = explode('-', $selectedDate);
            $year = $yearMonth[0];
            $month = $yearMonth[1];
            $queryTimeslot .= " WHERE YEAR(date) = '$year' AND MONTH(date) = '$month'";
            $queryRevenue .= " WHERE YEAR(date) = '$year' AND MONTH(date) = '$month'";
        }
        
        $queryTimeslot .= " GROUP BY timeslot ORDER BY total_reservations DESC";

        $resultTimeslot = $conn->query($queryTimeslot);
        $resultRevenue = $conn->query($queryRevenue);

        $timeslotData = [];
        while($row = $resultTimeslot->fetch_assoc()) {
            $timeslotData[] = ["label" => $row['timeslot'], "y" => $row['total_reservations']];
        }
        
        $revenueData = $resultRevenue->fetch_assoc();
    ?>

    <form method="post" action="">
        <input type="month" id="selectDated_FACILITIES" class="form-control" name="selectedDate" value="<?php echo $selectedDate ?? ''; ?>">
        <button class="btn btn-primary" id="btn-facilities" type="submit" value="Filter">Search</button>
    </form>

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("columnChart", {
                animationEnabled: true,
                title: {
                    text: "Most Reserved Timeslots"
                },
                data: [{
                    type: "line",
                    yValueFormatString: "#",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($timeslotData, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
            
            var revenueText = document.getElementById('therevenuemsg');
            revenueText.innerText = "Total Revenue : <?php echo $revenueData['total_revenue'] ?? '0'; ?>";
        }
    </script>

    
</body>
</html>

		

	


