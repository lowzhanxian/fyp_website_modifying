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
    <?php include"admin_header.php";?>
   
</head>

<body onload="realtime()">
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
    $query = "SELECT productName, SUM(productPrice) as total FROM equipmentrental";
    if($selectedDate){
        $yearMonth = explode('-', $selectedDate);
        $year = $yearMonth[0];
        $month = $yearMonth[1];
        $query .= " WHERE YEAR(rentDate) = '$year' AND MONTH(rentDate) = '$month'";
    }
    $query .= " GROUP BY productName";

    $result = $conn->query($query);

    $thedata = [];
    while($row = $result->fetch_assoc()) {
        $thedata[] = ["label" => $row['productName'], "y" => $row['total']];
    }
    
?>
     <form method="post" action="">
        <input type="month" id="selectDated" class="form-control" name="selectedDate" value="<?php echo $selectedDate ?? ''; ?>">
        <button class="btn btn-primary" type="submit" value="Filter">Filter</button>
    </form>
   
   
    <script>
        window.onload = function() {
        
        var chart = new CanvasJS.Chart("theequipmentdata", {
            animationEnabled: true,
            title: {
                text: "Total Revenue Of Equiment"
            },
            data: [{
            type: "pie",
            yValueFormatString: "#,##0.00",
            indexLabel: "{label} ({y})",
            dataPoints: <?php echo json_encode($thedata, JSON_NUMERIC_CHECK); ?>
        }]

        });
        chart.render();
        
        }
    </script>
    </head>
    <body>


    <div id="theequipmentdata" ></div>



    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>

		

	


