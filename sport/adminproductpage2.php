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
    <link rel="stylesheet" href="css/adminproductpage2.css">
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

       
        if(isset($_GET['productId']))
        {
            $productDetails=$_GET['productId'];
            $query = "SELECT  productImage, productName, productPrice, productStock FROM sportequipment WHERE productId= '" . $productDetails . "'";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            
            if($result&&$row){
                echo'
                    <div class="proDetails">
                        <form action="" method="post">
                            
                            <div class="secondsection">
                                <label for="product_Name" class="form-label">Product Name:</label><br>
                                <input type="text" class="form-control" id="product_Name" name="productname" value="' . $row['productName'] . '" ><br><br>
                            </div>
                            <div class="thirdsection">
                                <label for="price" class="form-label">Price(RM)/Hour:</label><br>
                                <input type="text" class="form-control" id="price" name="Price" value="' . $row['productPrice'] . '" ><br><br>
                            </div>
                            <div class="fourthsection">
                                <label for="stock" class="form-label">Stock:</label><br>
                                <input type="text" class="form-control" id="stock" name="Stock" value="' . $row['productStock'] . '" ><br><br>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" id="update" name="updatenewdetails" class="btn btn-primary">Update</button>
                                </div>
                                <div class="col">
                                    <button type="submit" id="delete" name="deleteproduct" class="btn btn-danger"> Delete Product</button>
                                </div>
                                <div class="col">
                                    <a href="productpage.php "id="cancel" class="btn btn-danger"> cancel </a>
                                </div>
                            </div>
                            
                        </form>
                    </div>';
            }
        }
                
        if (isset($_POST['updatenewdetails'])) {
            $product_ID = $_GET['productId'];
            
            $product_Name = mysqli_real_escape_string($conn, $_POST['productname']);
            $product_Stock = mysqli_real_escape_string($conn, $_POST['Stock']);
            $product_Price = mysqli_real_escape_string($conn, $_POST['Price']);
        
            if (strlen($product_Name) < 3) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Invalid Product Name, please try again.");'; 
                echo '</script>';
            } else {
                $checkSql = "SELECT  productName, productPrice, productStock FROM sportequipment WHERE productId = ?";
                $stmt = $conn->prepare($checkSql);
                $stmt->bind_param("i", $product_ID);
                $stmt->execute();
                $result = $stmt->get_result();
                $row2 = $result->fetch_assoc();
        
                if (empty($row2)) {
                    echo 'Not Found';
                } else {
                    
                    $oldname = $row2['productName'];
                    $oldstock = $row2['productStock'];
                    $oldprice = $row2['productPrice'];
        
                    if (
                        
                        $product_Name !== $oldname ||
                        $product_Stock !== $oldstock ||
                        $product_Price !== $oldprice
                    ) {
                        // Check if a product with the same name already exists
                        $checknameSql = "SELECT * FROM sportequipment WHERE productName = ? AND productId != ?";
                        $stmt = $conn->prepare($checknameSql);
                        $stmt->bind_param("si", $product_Name, $product_ID);
                        $stmt->execute();
                        $duplicateResult = $stmt->get_result();
        
                        if ($duplicateResult->num_rows > 0) {
                            echo '<script type="text/javascript">';
                            echo "alert('A product with the same name already exists.');";
                            echo '</script>';
                        } else if (!is_numeric($product_Price)) {
                            echo '<script type="text/javascript">'; 
                            echo 'alert("Invalid Price, please enter a valid numeric value.");'; 
                            echo '</script>';
                        } else if (!is_numeric($product_Stock) || intval($product_Stock) <= 0) {
                            echo '<script type="text/javascript">'; 
                            echo 'alert("Invalid Stock, must be a positive numeric value.");'; 
                            echo '</script>';
                        } 
                            
                            $updateSql = "UPDATE sportequipment SET  productName = ?, productPrice = ?, productStock = ? WHERE productId = ?";
                            $stmt = $conn->prepare($updateSql);
                            $stmt->bind_param("sdii", $product_Name, $product_Price, $product_Stock, $product_ID);
        
                            if ($stmt->execute()) {
                                echo "<script>alert('Product Updated'); window.location.replace('productpage.php');</script>";
                            } else {
                                echo "Error: " . $conn->error;
                            }
                        
                    } else {
                        echo "No changes made to the product.";
                    }
                }
        
                $stmt->close();
            }
            $conn->close();
        }
        

                if(isset($_POST['deleteproduct'])){
                    $productDetails2 = $_GET['productId'];
                    $query2 = "DELETE  FROM sportequipment WHERE productId ='$productDetails2'";

                    $queryStatus = $conn->query($query2);
                    if ($queryStatus) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Product removed"); window.location.replace("productpage.php");';
                        echo '</script>';
                        
                        
                    } else{
                        echo "Something Went Wrong. Please Check and Try Again ";
                    }
                }
            
    
    ?>
</body>