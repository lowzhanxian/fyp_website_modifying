<?php session_start(); ?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CH SC | login</title>
		<link rel="icon" type="image/x-icon" href="images/title.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
		<?php include('loginHNF/header.php');?>
        
		<link rel="shortcut icon" href="favicon.ico">
		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Superfish -->
		<link rel="stylesheet" href="css/superfish.css">

		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/accessAccount.css">
		
	</head>

    

<div class="loginTitle">
    <h1 class="Centre">Admin Login</h1>
    
    <form id="login"  method="post">
        <div class="row text-center">
        <div class="row">
            <label for="Name" class="form-label"> Name:</label>
            <input type="text" class="form-control" id="Name" style="width: 300px;margin-right:auto;margin-left:auto;" name="admin_name_input" required>
            <p id="error-message" style="color: red;"></p>
        </div>
        

    <div class="row">
        <label for="admin_id" class="form-label" style="text-align:center;">Admin Id:</label>
        <input type="text" class="form-control" style="width: 300px; margin-right:auto; margin-left:auto;" id="admin_id" name="admin_id_input" required>
        <span id="foridmsg" style="color:red;"></span><br>
    </div>
    <script>
        document.getElementById('admin_id').addEventListener('input', checkAdminId);
        const idmsg = document.getElementById('foridmsg');

        function checkAdminId() {
            const adminIdInput = document.getElementById('admin_id');
            const adminIdValue = adminIdInput.value;
            
            // Regex pattern checks that the string starts with "Admin" followed by alphanumeric characters
            const idPattern = /^Admin[a-zA-Z0-9]+$/;

            if (idPattern.test(adminIdValue)) {
                idmsg.textContent = 'Valid Admin Id';
            } else {
                idmsg.textContent = 'Admin Id must start with "Admin" followed by numeric .';
            }
        }
    </script> 

            <div class="row">
                <label for="inputpassword" class="form-label">Password:</label>
                <input type="password" class="form-control" style="width: 300px;margin-right:auto;margin-left:auto;" id="inputpassword" name="admin_password_input"  minlength="3">
            
             
            </div>
            <img class="hideimg" id="eye" src="images/hide.png">
                <script>

                    let eye=document.getElementById("eye");
                    let inputpassword=document.getElementById("inputpassword");

                    eye.onclick =function(){
                        if(inputpassword.type =="password"){
                            inputpassword.setAttribute("type","text");
                            eye.src="images/eye.png"
                        }else{
                            inputpassword.setAttribute("type","password");
                            eye.src="images/hide.png"
                        }
                    }
                </script>
           
            <div class="row">
                <button type="submit" class="btn btn-danger" style="width: 200px;margin-left:auto;margin-right:auto;" name="login">Login</button>
            </div>
           
        </div>
    </form>
</div>
    <?php
        $LOCALHOST = 'localhost';
        $ROOT = 'root';
        $PASSWORD = '';
        $DATABASE = 'sport';

        $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if(isset($_POST['login'])) {
            $adminname = $_POST['admin_name_input'];
            $adminid = $_POST['admin_id_input'];
            $adminpassword = $_POST['admin_password_input'];

            $stmt = $conn->prepare("SELECT * FROM admin WHERE adminId = ?");
            $stmt->bind_param("s", $adminid);

            $stmt->execute();
            $result = $stmt->get_result();
            if(isset($_POST['login'])) {
                $adminname = trim($_POST['admin_name_input']);
                $adminid = trim($_POST['admin_id_input']);
                $adminpassword = trim($_POST['admin_password_input']);
            
                if (empty($adminname) || empty($adminid) || empty($adminpassword)) {
                    echo "<script> alert('All fields are required.'); window.location= \"adminLogin.php\"; </script>";
                    exit();
                }
            }

            if(isset($_POST['login'])) {
                $adminname = $_POST['admin_name_input'];
                $adminid = $_POST['admin_id_input'];
                $adminpassword = $_POST['admin_password_input'];
    
                $stmt = $conn->prepare("SELECT * FROM admin WHERE adminId = ? AND adminPassword = ?");
                $stmt->bind_param("ss", $adminid, $adminpassword);
    
                $stmt->execute();
                $result = $stmt->get_result();
    
                if ($row = $result->fetch_assoc()) {
                    $_SESSION['admin_name_input'] = $adminname;
                    $_SESSION['admin_id_input'] = $adminid;
                    $_SESSION['adminpassword'] = $adminpassword;
    
                    echo "<script> alert('Welcom admin'); window.location= \"adminDashBoard.php\"; </script>";
                    exit();
                } else {
                    echo "<script> alert('Invalid username or password'); window.location= \"adminLogin.php\"; </script>";
                    exit();
                }
            }
        }

    ?>




