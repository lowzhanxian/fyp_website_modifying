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
    <link rel="stylesheet" href="css/admin_user.css">
    <?php include 'admin_header.php';?>
</head>
<body onload="realtime()">
<?php
			$LOCALHOST = 'localhost';
			$ROOT = 'root';
			$PASSWORD = '';
			$DATABASE = 'sport';

			$mysqli  = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);
			if ($mysqli ->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
            $thepagelimit = 5;  // Number of users per page
            $pageNumber = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($pageNumber-1) * $thepagelimit;

            $displatUserquerry = "SELECT COUNT(*) FROM user"; //display all the user
            $displatUserquerry = $mysqli->query($displatUserquerry);
            $userRow = $displatUserquerry->fetch_row();
            $totalUsers = $userRow[0];
            $countOfPage = ceil($totalUsers / $thepagelimit);  // Total number of pages

            // Fetching data with LIMIT for pagination
            $query = "SELECT username, email, contactNumber FROM user LIMIT ? OFFSET ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ii", $thepagelimit, $offset);
            $stmt->execute();
            $result = $stmt->get_result();
            // Displaying data
            $userdata =false;
            echo '
            <div class="backDiv">
                <a href="adminDashBoard.php">BACK</a>
            </div>';
            if ($result->num_rows > 0) {
                echo '
                <table border="1" class="table table-bordered">
                    <tr class="tr-equipment">
                        <th>User Email</th>
                        <th>User Name</th>
                        <th>Contact</th>
                    </tr>';
                while($row = $result->fetch_assoc()) {
                    $userdata =true;
                    echo '<tr>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['contactNumber'] . '</td>';
                    
                    
                    
                    echo '</tr>';
                }
                
                echo '</table>';
                
                // Display pagination links//using for loop//ii is the integer 
                for ($i = 1; $i <= $countOfPage; $i++) {
                    echo "<a id='thepagelink'style='text-align:center;color:red;' href='?page=$i'>$i</a> ";
                    }
                } else {
                    echo '<p style="color:red;margin-left:800px;margin-top:200px">No User Registered</p>';
                }
            

            $stmt->close();



		

			
			
			
		?>
                
</body>