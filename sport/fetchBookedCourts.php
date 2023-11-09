
<?php
    $LOCALHOST = 'localhost';
    $ROOT = 'root';
    $PASSWORD = '';
    $DATABASE = 'sport';
    $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT date, timeslot, facilitytypecourtnumber FROM sportfacilitiesreservation";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo 
            "Date: " . $row['date'] . " ||  Time: " . $row['timeslot'] . " ||  Court: " . $row['facilitytypecourtnumber'] . "<br>";
        }
    } else {
        echo "No courts booked yet.";
    }
    $conn->close();
?>
