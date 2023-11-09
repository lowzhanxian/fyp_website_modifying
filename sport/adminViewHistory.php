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
    <link rel="stylesheet" href="css/admin_viewhistory.css">
    <link rel="stylesheet" href="css/admin_user.css">
    <?php include("admin_header.php");?>
</head>
<body onload="realtime()">

<?php
    $LOCALHOST = 'localhost';
    $ROOT = 'root';
    $PASSWORD = '';
    $DATABASE = 'sport';

    $mysqli = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $selectedDate = null;
    $results = null;
    if (isset($_POST['selectedDate'])) {
        $selectedDate = $_POST['selectedDate'];
        $stmt = $mysqli->prepare("SELECT date, timeslot, facilitytypecourtNumber, useremail, username, contactnumber, totalprice FROM sportfacilitiesreservation WHERE date = ?");
        $stmt->bind_param("s", $selectedDate);
        $stmt->execute();
        $results = $stmt->get_result();
        $stmt->close();
    }

    // HTML form for selecting date
    echo '<form method="post" action="">';
    echo '<input type="date" id="selectDated" class="form-control" name="selectedDate" value="'. htmlspecialchars($selectedDate) .'">';
    echo '<button class="btn btn-primary" type="submit">Filter</button>';
    echo '</form>';

    if ($results && $results->num_rows > 0) {
        echo '<table border="1" class="table table-bordered">
                <tr class="tr-equipment">
                    <th>Date Reserve</th>
                    <th>Time</th>
                    <th>Type Court & Number</th>
                    <th>Contact</th>
                    <th>Price</th>
                </tr>';

        while ($row = $results->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['date']) . '</td>';
            echo '<td>' . htmlspecialchars($row['timeslot']) . '</td>';
            echo '<td>' . htmlspecialchars($row['facilitytypecourtNumber']) . '</td>';
            echo '<td>' . htmlspecialchars($row['contactnumber']) . '</td>';
            echo '<td>' . htmlspecialchars($row['totalprice']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo $selectedDate ? '<p style="color:red;">No reservations found for the selected date.</p>' : '<p style="color:red;">Please select a date to filter the reservations.</p>';
    }
?>

                
</body>