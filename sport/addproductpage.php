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
    <link rel="stylesheet" href="css/addproduct.css">
    
    
    
</head>
<body onload="realtime()">
    <a href="productpage.php"  >
        <div class="backdiv">
            <h3 id="h3_addproductpage_1">Back</h3>
        </div>
    </a>
    <div class="addproductdiv">
        <h2 id="h2_addproductpage_1">Add Product</h2>
        <form action="" method="post">
            <div class="firstsection">
                <label for="product_image" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="product_image" name="productImage" required>
            </div>
            <div class="secondsection">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text"class="form-control" id="product_name" name="productName" minlength="3" required>
            </div>
            
            <div class="thirdsection">
                <label for="product_id" class="form-label">Product ID</label>
                <input type="text"class="form-control" id="product_id" name="productId" minlength="3" required>
            </div>
            <script>
                var Input=document.getElementById('product_id');


                //now we want to disable the user to type the numeric number 
                Input.addEventListener('input',function()
                {
                    this.value=this.value.replace(/\D/g, '');
                    });
            </script>
            <div class="fourthsection">
                <label for="product_stock" class="form-label">Total Stock</label>
                <input type="number"class="form-control" id="product_stock" name="productStock" required>
            </div>

            <div class="fifthsection">
                <label for="product_price" class="form-label">Price per hour</label>
                <input type="text" id="product_price" class="form-control" name="productPrice" required>
            </div>

            <br>
            
                <button type="submit" name="addproduct" class="btn btn-danger" >Publish</button>
            
        </form>
        <?php
            if(isset($_POST['addproduct']))
            {
                                    
                $LOCALHOST = 'localhost';
                $ROOT = 'root';
                $PASSWORD = '';
                $DATABASE = 'sport';
                $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);
                    
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                } 
                else
                {
                    // mysqli_real_escape_string is implemented preventing SQL injection attacks
                    $product_Image=mysqli_real_escape_string($conn,$_POST['productImage']);
                    $product_Name=mysqli_real_escape_string($conn,$_POST['productName']);
                    $product_ID=mysqli_real_escape_string($conn, $_POST['productId']);
                    $product_Stock=mysqli_real_escape_string($conn,$_POST['productStock']);
                    $product_Price=mysqli_real_escape_string($conn,$_POST['productPrice']);

                    $goAhead = true;
            
                //check the product id have or not dupiclate or added
                    $Sql = "SELECT * FROM sportequipment WHERE productId = '$product_ID'";
                    $checkProduct = $conn->query($Sql);

                    if ($checkProduct->num_rows > 0) {
                        echo '<script type="text/javascript">';
                        echo "alert('You have added this product');";
                        echo 'window.location.href = "addproductpage.php"';
                        echo '</script>';
                    }
                    
                    if(strlen($product_Name) < 3){
                        $goAhead = false;
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Invalid Product Name,Try again.");'; 
                        echo 'window.location.href = "addproductpage.php"';
                        echo '</script>';
                    }
                    if (!is_numeric($product_ID)) {
                        $goAhead = false;
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Invalid Product ID ,Try again.");'; 
                        echo 'window.location.href = "addproductpage.php"';
                        echo '</script>';
                    }
                    if (!is_numeric($product_Price)){
                        $goAhead = false;
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Invalid Price,Try again.");'; 
                        echo 'window.location.href = "addproductpage.php"';
                        echo '</script>';
                    }
                    if (!is_numeric($product_Stock) && intval($product_Stock) <= 0) {
                        $goAhead = false;
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Invalid Number, must be zero or a positive integer.");'; 
                        echo 'window.location.href = "addproductpage.php"';
                        echo '</script>';
                    }

                    else {
                       
                        $insertSql = "INSERT INTO sportequipment (productId , productImage, productName, productPrice, productStock) 
                        VALUES ('$product_ID', '$product_Image', '$product_Name', '$product_Price', '$product_Stock')";
            
                        if ($conn->query($insertSql) === TRUE) {
                            echo "<script> alert(' Product Published'); window.location.replace('productpage.php'); </script>";
                        } else {
                            echo "Error: " . $conn->error;
                        }
                    }
            
                    $conn->close();
                }
            }
        ?>
    </div>
</body>