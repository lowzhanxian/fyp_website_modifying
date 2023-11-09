
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CH SC | HOME</title>
		<link rel="icon" type="image/x-icon" href="images/title.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
		
		<link rel="shortcut icon" href="favicon.icon">
		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Superfish -->
		<link rel="stylesheet" href="css/superfish.css">

		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/sportEquipment.css">
        <link rel="stylesheet" href="css/confirmEquipment.css">
		
	</head>

	<body>
        
        
		<div class="check-out">
            <a class="cancel-link" href="sportEquipment.php">Cancel</a>
            <div class="top">
                <h1 ><a class="logo" href="homepage.php">CH SC</a></h1>
                <span class="line">|</span>
                <h1 class="check-out-h1">Check Out</h1>
            </div>
            <?php
                
                SESSION_START();

                $LOCALHOST = 'localhost';
                $ROOT = 'root';
                $PASSWORD = '';
                $DATABASE = 'sport';
                $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $username = $_SESSION['username'];
                $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();

                if ($user) {
                    $email = $user['email'];
                    $name = $user['username'];

                    echo 
                    '<form action="" method="post">
                        <div class="row">
                            <h1 id="labeluser_name"  >Your Name</h1><br>
                            <label for="user_name" id="label_user_name"  class="form-label">' . $name . '</label><br>
                            <input type="text" id="user_name" name="userName" style="display:none"; value="' . $name . '" readonly><br>
                        </div>
                        <div class="row">
                            <h1  id="labeluser_email" >Your Email</label><br>
                            <label for="user_email" id="label_user_email" class="form-label">' . $email . '</label><br>
                            <input type="text"  id="user_email" name="email" style="display:none"; value="' . $email . '" readonly><br><br>
                        </div>';


                        if(isset($_GET['productId']))
                        {
                            $prodetails=$_GET['productId'];
                            $query2 = "SELECT  productImage, productName, productPrice, productStock FROM sportequipment WHERE productId = '" . $prodetails . "'";
                            $result2 = $conn->query($query2);
                            $row2 = $result2->fetch_assoc();

                            if($result2&&$row2){
                                echo'<div class="row">
                                        <input type="text" class="form-control" id="product_img" name="productImage" style="display:none"; value="' .  $row2['productImage'] . '" readonly ><br>
                                        <img src="images/'.  $row2['productImage'] . '" id="productimage" alt="Product Image"  style="max-width: 250px;">
                                    </div>
                                    <div class="row">
                                        <label for="product_name" id="product_Name" class="form-label">'. $row2['productName']. '</label><br>
                                        <input type="text" class="form-control" id="product_name" name="productName" style="display:none";  value="' . $row2['productName']. '" readonly><br><br>
                                    </div>
                                    <div class="row">
                                        <h1  id="price" class="form-label">Unit Price</h1><br>
                                        <label for="proprice" id="showprice" class="form-label">' . $row2['productPrice'] . '</label><br>
                                        <input type="text" class="form-control" id="proprice" name="price" style="display:none"; value="' . $row2['productPrice'] . '" readonly><br><br>
                                    </div>
                                    
                                    <div class="button">
                                        <div class="buttontype">
                                            <button type="submit" id="confirmpay" name="confirmrent" class="btn btn-primary"> CONFIRM PAYMENT</button>
                                        </div>

                                        
                                   </form>
                                    </div>';
                                            
                                
                            }   





                        }
                        
                   
                    }
                    if (isset($_POST['confirmrent'])) {
                        $user_name=$_POST['userName'];
                        $user_email=$_POST['email'];
                        $product_imgs=$_POST['productImage'];
                        $product_name=$_POST['productName'];
                        $product_price=$_POST['price'];
                       
                        $currentDate = date("Y-m-d");  // Get the current date


                        //check product if product have already rented
                        $checkequipmentsql = "SELECT * FROM equipmentrental WHERE
                            userName = '$user_name' AND userEmail = '$user_email' AND
                            productImage = '$product_imgs' AND productPrice = '$product_price'
                            AND productName = '$product_name' AND rentDate='$currentDate'";
                    
                        $Result = $conn->query($checkequipmentsql);
                        


                        $checkstocksql="SELECT productStock FROM sportequipment WHERE productImage = '$product_imgs' AND productName = '$product_name' AND productPrice = '$product_price'";
                        $checkstockResult = $conn->query($checkstocksql);
                        $row3 = $checkstockResult->fetch_assoc();


                        if ($Result->num_rows > 0) {
                            echo '
                                <div id="opendiv" class="success">
                                    <div class="content">
                                        
                                        <p id="p">You Have Rented</p>
                                    </div>
                                </div>
                                <script>
                                    var openDiv = document.getElementById("opendiv");
                                    var closeDiv = document.getElementById("closediv");
                            
                                    function openModal() {
                                        openDiv.style.display = "block";
                                    }
                            
                                    function closeModal() {
                                        openDiv.style.display = "none";
                                    }
                            
                                   
                            
                                    openModal();
                                    setTimeout(function() {
                                        window.location.replace(\'sportEquipment.php\');
                                    },2000);
                                </script>';
                        }
                        elseif($row3['productStock'] <= 0) {
                            echo '
                                <div id="opendiv" class="success">
                                    <div class="content">
                                        
                                        <p id="p">Product Out of Stock.</p>
                                    </div>
                                </div>
                                <script>
                                    var openDiv = document.getElementById("opendiv");
                                    var closeDiv = document.getElementById("closediv");
                            
                                    function openModal() {
                                        openDiv.style.display = "block";
                                    }
                            
                                    function closeModal() {
                                        openDiv.style.display = "none";
                                    }
                            
                                    openModal();

                                    setTimeout(function() {
                                        window.location.replace(\'sportEquipment.php\');
                                    },2000);
                                </script>';
                        }
                            else {
                                $getProductIdSQL = "SELECT productId FROM sportequipment WHERE productImage = '$product_imgs' AND productName = '$product_name' AND productPrice = '$product_price'";
                                $productResult = $conn->query($getProductIdSQL);
                                if($productResult->num_rows == 0) {
                                    exit('Product not found');
                                }
                                $productRow = $productResult->fetch_assoc();
                                $productId = $productRow['productId'];
                            
                            $currentDate = date("Y-m-d");  // Get the current date

                            $rental = "INSERT INTO equipmentrental (userEmail, userName, productName, productImage, productPrice, productId, rentDate, status) 
                            VALUES ('$user_email', '$user_name', '$product_name', '$product_imgs', '$product_price', $productId, '$currentDate', 'rented')";




                    
                            $updatestock = "UPDATE sportequipment SET productStock = productStock - 1 WHERE productImage = '$product_imgs' AND productName = '$product_name' AND productPrice = '$product_price'";
                    
                            if ($conn->query($rental) === TRUE && $conn->query($updatestock) === TRUE) {
                                echo '
                                <div id="opendiv" class="success">
                                    <div class="content">
                                        
                                        <p id="p">You Have Rent Successfuly.</p>
                                    </div>
                                </div>
                                <script>
                                    var openDiv = document.getElementById("opendiv");
                                    var closeDiv = document.getElementById("closediv");
                            
                                    function openModal() {
                                        openDiv.style.display = "block";
                                    }
                            
                                    function closeModal() {
                                        openDiv.style.display = "none";
                                    }
                    
                            
                                    openModal();

                                    setTimeout(function() {
                                        window.location.replace(\'sportEquipment.php\');
                                    },2000);
                                </script>';
                            } else {
                                echo "Error: " . $conn->error;
                            }
                        }



                    }
                

            
            
            
            
            
            ?>
        </div>


        <script src="js/jquery.min.js"></script>
        
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/hoverIntent.js"></script>
        <script src="js/superfish.js"></script>

        <!-- Main JS (Do not remove) -->
        <script src="js/main.js"></script>

	</body>
    <footer>
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-8">
							<h3 class="section-title">About Us</h3>
							<p style="text-align: left;">we are from CH SPORT COMPLEC CENTRE that established online website for the penang user that more convenient to make reservetion on sport facilities , find coach , reserve equipment and other.s</p>
						</div>

						<div class="col-md-6 col-sm-8">
							<h3 class="section-title">Our Address</h3>
							<ul class="contact-info">
								<li ><i class="icon-map-marker"></i>11, CH Sport Complex,11900,Bayan Lepas,Pulau Pinang</li>
								<li><i class="icon-phone"></i>0127229218</li>
								<li><i class="icon-envelope"></i><a href="#">lowzhanxian9218@gmail.com</a></li>
								
							</ul>
						</div>
						
					</div>
					<div class="row copy-right">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							
						</div>
					</div>
				</div>
			</div>
		</footer>
</html>

