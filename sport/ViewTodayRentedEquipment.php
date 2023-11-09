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

    <link rel="stylesheet" href="css/ViewTodayRentedEquipment.css">

    
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
        $query = "SELECT * FROM equipmentrental WHERE rentDate = '$today'";
        $result = $conn->query($query);

        if (!$result) {
            die("Query failed: " . $conn->error);
        }

       

        $anyData = false; 
        echo '<div class="backDiv">
            <a href="admin_Equipment.php">BACK</a>
        </div>';

        
        echo '<table border="1" class="table table-bordered">
            <tr class="tr-equipment">
                <th>User Email</th>
                <th>User Name</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Rent Date</th>
                <th>Status</th>
                <th>Update</th>
            </tr>';

            while ($row = $result->fetch_assoc()) {
                $anyData = true; 
            
                echo '<tr>';
                echo '<td>' . $row['userEmail'] . '</td>';
                echo '<td>' . $row['userName'] . '</td>';
                echo '<td>' . $row['productName'] . '</td>';
                echo '<td><img src="images/' . $row['productImage'] . '" alt="Product Image" width="100"></td>';
                echo '<td>' . $row['productPrice'] . '</td>';
                echo '<td>' . $row['rentDate'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '<td>';
                if ($row['status'] == 'rented') {  
                    echo '<form action="" method="post">';
                    echo '<input type="hidden" name="id" value="' . $row['rentalId'] . '">';
                    echo '<button type="submit" class="btn btn-danger">Update Status</button>';
                    echo '</form>';
                } 
                echo '</td>';
                echo '</tr>';
                
            }
        
        echo '</table>';

        if (!$anyData) {
            echo '<p style="color:red;margin-left:800px;margin-top:200px">No Rental For Today</p>';
        }
        

        echo '</table>';
        if (isset($_POST['id'])) {
            $equipment_id = intval($_POST['id']);
        
            $conn->begin_transaction(); 
        
            // SQL to update status in equipmentrental table using prepared statements
            $stmt = $conn->prepare("UPDATE equipmentrental SET status = 'returned' WHERE rentalId = ? AND status = 'rented'");
            $stmt->bind_param("i", $equipment_id);
        
            if ($stmt->execute()) {
                // Fetch the productId associated with the rentalId
                $stmtFetch = $conn->prepare("SELECT productId FROM equipmentrental WHERE rentalId = ?");
                $stmtFetch->bind_param("i", $equipment_id);
                if ($stmtFetch->execute()) {
                    $resultFetch = $stmtFetch->get_result();
                    $rowFetch = $resultFetch->fetch_assoc();
                    $actualProductId = $rowFetch['productId'];
                    
                    $stmt2 = $conn->prepare("UPDATE sportequipment SET productStock = productStock + 1 WHERE productId = ?");
                    $stmt2->bind_param("i", $actualProductId);
                    
                    if ($stmt2->execute()) {
                        $conn->commit();
                        header('Location: ViewTodayRentedEquipment.php'); // Reload the page
                        exit;
                    } else {
                        $conn->rollback();
                        echo "Error updating stock: " . $conn->error;
                    }
                } else {
                    $conn->rollback();
                    echo "Error fetching productId: " . $stmtFetch->error;
                }
            } else {
                $conn->rollback();
                echo "Error updating status: " . $conn->error;
            }
            
            $stmt->close();
            $stmt2->close();
        }
        
        
        
    ?>








    
</body>