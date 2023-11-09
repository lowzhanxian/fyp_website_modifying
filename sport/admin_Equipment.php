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
    <link rel="stylesheet" href="css/adminEquipment.css">
    <?php include 'admin_header.php';?>

    
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

    $today = date("Y-m-d");
    $selectquery = "SELECT COUNT(*) AS totalRent FROM equipmentrental WHERE rentDate = '$today'";
    $selectquery2 = "SELECT SUM(productPrice) AS Rentrevenue FROM equipmentrental WHERE rentDate = '$today'";
    

    $rentTotal = 0; // Default value
    $rentRevenueToday=0;
    $result = $conn->query($selectquery);
    $result2= $conn->query($selectquery2);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $rentTotal = $row['totalRent'];
    }
    if (!$result2) {
        die("Query failed: " . $conn->error);
    }

    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        $rentRevenueToday = $row2['Rentrevenue'];
    }

    // Close the database connection
    $conn->close();

    // Display the result
    echo '
    <div class="row animate-box">
        <div class="equipment_Box1" id="equipmentBox1">
            <a href="ViewTodayRentedEquipment.php">
                <div class="program program-schedule">
                    <img src="images/adminBookingIMG.png" alt="booking">
                    <h3 id="h3_admin_equipment">Update Equipment For Today And Total: ' . number_format($rentTotal) . '</h3>
                    <h4></h4>
                </div>
            </a>
        </div>

        <div class="equipment_Box2" id="equipmentBox2">
            
                <div class="program program-schedule">
                    <img src="images/adminBookingIMG.png" alt="booking">
                    <h3 id="h3_admin_equipment" style="color:white;">Today Sport Equipment Revenue:' . number_format($rentRevenueToday, 2) . '<span id="totalcoachspan"></span></h3>
                    <h4></h4>
                </div>
            
        </div>
    </div>';
?>








    <div class="row animate-box">
        
       
        <div class="equipment_Box3">
            <a href="productpage.php">
                <div class="equipment_smallbox4">
                    <img src="images/adminBookingIMG.png" id="viewproduct" alt="booking">
                    <h4 id="h4_admin_equipment">View Product</h4>
                </div>
            </a>
            
            <a href="RentalEquipmentHistory.php">
                <div class="equipment_smallbox5">
                    <img src="images/adminBookingIMG.png" id="viewproduct" alt="booking">
                    <h4 id="h4_admin_equipment">Rental History</h4>
                </div>
            </a>
            <a href="analytic_equpment.php">
                <div class="equipment_smallbox6">
                    <img src="images/adminBookingIMG.png" id="viewproduct" alt="booking">
                    <h4 id="h4_admin_equipment">Analytic Sales</h4>
                </div>
            </a>
        </div>
        
                
                
    </div>
    
</body>