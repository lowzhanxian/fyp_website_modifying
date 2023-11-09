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
	<?php include 'admin_header.php';?>
    <link rel="stylesheet" href="css/productpage.css">
    <link rel="stylesheet" href="css/admin_user.css">
    
    
</head>
<body onload="realtime()">
    
    <a href="addproductpage.php">
        <div class="addpro">
            <h3 id="h3_productpage">Add Product</h3>
        </div>
    </a>
   
    <?php
        $LOCALHOST = 'localhost';
        $ROOT = 'root';
        $PASSWORD = '';
        $DATABASE = 'sport';

        $mysqli  = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);
        if ($mysqli ->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $thepagelimit=5;//how much thing can in one page
        $pageNumber=isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
        $theOffset=($pageNumber-1) * $thepagelimit;

        $countEquipment="SELECT COUNT(*) FROM sportequipment";
        $countEquipment = $mysqli->query($countEquipment);
        $equipmentRow = $countEquipment->fetch_row();
        $totalProduct = $equipmentRow[0];
        $pageCounting = ceil($totalProduct / $thepagelimit); 

        $query1 = "SELECT * FROM sportequipment LIMIT ? OFFSET ?";
        $stmt = $mysqli->prepare($query1);
        $stmt->bind_param("ii", $thepagelimit, $theOffset);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo '<div class="backDiv">';
            echo '<a href="admin_Equipment.php">BACK</a>';
            echo '</div>';
        echo"<div class=\"listingproduct-section\">";
                while (($row1 = $result->fetch_assoc()))
                {
                    $product_ID= $row1['productId'];
                    $product_Image = $row1['productImage'];
                    $product_Name = $row1['productName'];
                    $price = $row1['productPrice'];
                    $stock=$row1['productStock'];
                   
                   
                    echo'<div class="card">
                            <a href="adminproductpage2.php?productId='.$product_ID.'">
                                <div class="card-content">
                                    <div class="container text-center">
                                        <div class="row">
                                            <div class="col">
                                                <img src="images/'. $product_Image .'" alt="Product Image"  style="max-width: 200px;">
                                            </div>
                                            <div class="col">
                                                <h5>Product ID: <h3>'.$product_ID.'</h3></h5>
                                            </div>
                                            <div class="col">
                                                <h5>Product Name: <h3>'.$product_Name.'</h3></h5>
                                            </div>
                                            <div class="col">
                                                <h5>Price: <h3>'.$price.'</h3></h5>
                                            </div>
                                            <div class="col">
                                                <h5>Stock: <h3>'.$stock.'</h3></h5>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </a>
                        </div>';
                }
                    echo"</div>";

                    for ($i = 1; $i <= $pageCounting; $i++) {
                        echo "<a id='thepagelink'style='text-align:center;color:red;' href='?page=$i'>$i</a> ";
                        }}
                    
                    else {
                        echo '<p style="color:red;margin-left:800px;margin-top:200px">Please Add Product</p>';
                    }
                
    
                $stmt->close();





    ?>


</body>