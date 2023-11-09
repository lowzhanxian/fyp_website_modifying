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
        
		

        <link rel="stylesheet" href="css/accessAccount.css">
		
	</head>

<?php
    $LOCALHOST = 'localhost';
    $ROOT = 'root';
    $PASSWORD = '';
    $DATABASE = 'sport';
    $SITEURL = 'http://localhost/website_fyp_modifiying/sport/';

    //establish the connection to the database
    $conn = mysqli_connect($LOCALHOST,$ROOT,$PASSWORD,$DATABASE) or die(mysqli_error($conn));

    if(isset($_POST['login'])){

        $Username = $_POST['Username'];
        $InputEmail = $_POST['InputEmail'];
        $InputPassword = $_POST['InputPassword'];
        $contactNumber=$_POST['contactNumber'];

        $conn = mysqli_connect($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        if (isset($_POST['login'])) {
        
            $Username = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_SPECIAL_CHARS);
            $InputEmail = filter_input(INPUT_POST, 'InputEmail', FILTER_SANITIZE_EMAIL);
            $InputPassword = $_POST['InputPassword']; 
            $contactNumber = filter_input(INPUT_POST, 'contactNumber', FILTER_SANITIZE_NUMBER_INT);
        
            if (empty($Username) || empty($InputEmail) || empty($InputPassword) || empty($contactNumber)) {
                echo "<script> alert('Please fill in all the fields');window.location= \"login.php\"; </script>";
                exit();
            }
        
            if (!filter_var($InputEmail, FILTER_VALIDATE_EMAIL)) {
                echo "<script> alert('Invalid email format');window.location= \"login.php\"; </script>";
                exit();
            }
        
          
            $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE email = ? AND username = ?");
            mysqli_stmt_bind_param($stmt, 'ss', $InputEmail ,$Username);
        
            mysqli_stmt_execute($stmt);
        
            mysqli_stmt_store_result($stmt);
        
            if (mysqli_stmt_num_rows($stmt) > 0) {
                mysqli_stmt_bind_result($stmt, $storedUsername, $storedEmail, $storedHashedPassword, $storedContactNumber);
                mysqli_stmt_fetch($stmt);
        
                if (password_verify($InputPassword, $storedHashedPassword)) {
        
                    $_SESSION['username'] = $storedUsername; 
                    $_SESSION['email'] = $storedEmail;
                    $_SESSION['contactNumber'] = $storedContactNumber;
        
                    header('location:' . $SITEURL . 'homepage.php');
                    exit();
                } else {
                    echo "<script> alert('Invalid username or password');window.location= \"login.php\"; </script>";
                }
            } else {
                echo "<script> alert('Email not found');window.location= \"login.php\"; </script>";
            }
        
            
            mysqli_stmt_close($stmt);
        }
        
        mysqli_close($conn);
    }
?>

<div class="loginTitle">
    <h1 class="Centre">LOGIN</h1>
    <?php
    if(isset($_SESSION['none registed account'])){
        echo $_SESSION['none registed account'];
        unset($_SESSION['none registed account']);
    }
    ?>
    <form id="login" action="#" method="post">
        <div class="row">
            <div class="row">
                <label for="username" class="form-label">Name:</label>
                <input type="text" class="form-control" id="username" name="Username" placeholder="Please Enter Username..." required>
                <span id="fornamemsg" style="color:red;"></span>

            </div>
            <script>
               document.getElementById('username').addEventListener('input', function(event) {
                var nameInput = this;
                var errorMessage = document.getElementById('fornamemsg');
                
                var namepatern = /^[A-Za-z\s\-'\.]+$/;
                
                nameInput.value = nameInput.value.replace(/[0-9]/g, '');

                if (!namepatern.test(nameInput.value) && nameInput.value !== '') {
                    errorMessage.textContent = 'Please enter a valid name.';
                    nameInput.value = "";
                } else {
                    errorMessage.textContent = ''; 
                }
            });
            </script>
            <div class="row">
                <label for="inputemail" class="form-label">Email: </label>
                <input type="text" class="form-control" id="inputemail" name="InputEmail" placeholder="Please Enter Email..." required>
                <span id="foremailmsg" style="color:red;"></span>

            </div>
            <script>

                document.getElementById('inputemail').addEventListener('input', checkEmail);
                const emailMSG = document.getElementById('foremailmsg');

                    function checkEmail() {
                        const emailInput = document.getElementById('inputemail');
                        const emailValue = emailInput.value;
                        
                        // Regex pattern checks for '@' followed by some characters and ending with '.com'
                        const emailformat = /@[a-zA-Z0-9-]+\.com$/;

                        if (emailformat.test(emailValue)) {
                            emailMSG.textContent = 'Valid Email'; 
                        } else {
                            emailMSG.textContent = 'Email must contain "@" followed by some text and end with ".com"';
                        }
                    }

        </script> 
            <div class="row">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="inputpassword" name="InputPassword" placeholder="Please Enter password..." required _>
                <span id="forpasswordmsg" style="color:red;"></span>

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
                inputpassword.addEventListener("input" ,funcValidatePass)
                        function funcValidatePass(){
                            if(inputpassword.value.length < 8){
                                forpasswordmsg.textContent="Password Must More Than 8 Character";
                            }
                        
                        else {
                            forpasswordmsg.textContent = "";
                        }
                    }
            </script>
            <div class="row">
                    <label for="Phone" class="form-label">Contact Number:</label>
                    <input type="text" class="form-control" id="contactnumber" minlength="10" maxlength="11" name="contactNumber" placeholder="Please Enter Contact..." required>
                    <span id="forphonemsg" style="color:red;"></span><br>

                </div><br><br>
            <script>
                document.getElementById('contactnumber').addEventListener('input', phonenumber);
                var phoneMsg = document.getElementById('forphonemsg');
                function phonenumber() {
                    const phoneInput = document.getElementById('contactnumber');
                    phoneInput.value = phoneInput.value.replace(/[^0-9]/g, ''); 
                    if (this.value.startsWith('01') && (this.value.length === 10 || this.value.length ===12 )) {
                        phoneMsg.textContent = 'Valid Number';
                        
                    } else {
                        phoneMsg.textContent = 'Start with "01"';
                    }
                }
                </script>

            <div class="row">
                <button type="submot" class="btn btn-primary" style="width: 200px;margin-left:auto;margin-right:auto;"  name="login">Login</button>
            </div><br>
            <div class="row">
                <span>New User?</span>
                <a href="Register.php" >Register Now</a>
            </div>
        </div>
    </form>
</div>

<?php
include('loginHNF/footer.php');
?>
