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
    <link rel="stylesheet" href="css/addproduct.css">
    <link rel="stylesheet" href="css/CourtDetailsEdit.css">
	<?php include 'admin_header.php';?>
      
    
</head>
<body onload="realtime()">
<?php
    SESSION_START();

    $LOCALHOST = 'localhost';
    $ROOT = 'root';
    $PASSWORD = '';
    $DATABASE = 'sport';
    $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

    if (isset($_GET['facilityID'])) {
        $facilityID = $_GET['facilityID'];
        $query = "SELECT * FROM facilities WHERE facilityID = $facilityID";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();

        if ($result && $row) {
            echo '
                <div class="courtDetails">
                    <form action="" method="post">
                        <div class="firstsection">
                            <label for="Court" class="form-label">' . $row['courtNumber'] . '</label>
                            <label for="CourtType" class="form-label">' . $row['courtType'] . '</label>
                        </div>
                        <div class="secondsection">
                            <label for="status" class="form-label">Status:</label>
                            <select id="status" class="form-select" name="status">
                                <option value="Available" ' . ($row['status'] == 'Available' ? 'selected' : '') . '>Available</option>
                                <option value="Under Maintenance" ' . ($row['status'] == 'Under Maintenance' ? 'selected' : '') . '>Under Maintenance</option>
                            </select>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="facilityID" value="' . $facilityID . '">
                                <button type="submit" id="update" name="updatenewdetails" class="btn btn-primary">Update</button>
                            </div>
                            <div class="col">
                                <button type="submit" id="delete" name="deleteFacilities" class="btn btn-danger">Delete </button>
                            </div>
                            <div class="col">
                                <a href="admin_Facilities.php" id="cancel" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>';
        }
    }

    if (isset($_POST['updatenewdetails'])) {
    $facilityID = $_POST['facilityID'];
    $Status = mysqli_real_escape_string($conn, $_POST['status']);
        $updateSql = "UPDATE facilities SET status = ? WHERE facilityID = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("si", $Status, $facilityID);

        if ($stmt->execute()) {
            echo '<script>alert("Facility Status Updated"); window.location.replace("admin_Facilities.php");</script>';
        } else {
            echo "Error: " . $conn->error;
        }
        $stmt->close();
    
}

    if (isset($_POST['deleteFacilities'])) {
        $facilityID = $_POST['facilityID'];
        $query2 = "DELETE FROM facilities WHERE facilityID = $facilityID";

        $queryStatus = $conn->query($query2);
        if ($queryStatus) {
            echo '<script type="text/javascript">';
            echo 'alert("Court removed"); window.location.replace("admin_Facilities.php");';
            echo '</script>';
        } else {
            echo "Something Went Wrong. Please Check and Try Again ";
        }
    }
    ?>


    </div>
</body>