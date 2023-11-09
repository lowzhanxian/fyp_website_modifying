<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CH SC | login</title>
		<link rel="icon" type="image/x-icon" href="images/title.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/accessAccount.css">
</head>
<body>
    <div class="loginTitle">
        <h1 class="Centre">Register</h1>
        <form id="register"action="#" method="post">
            <div class="row ">
                <div class="row">
                    <label for="username" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="username" name="Username" minlength="3"  required>
                    <span id="fornamemsg" style="color:red;"></span>
                    <script>        
                        var inputFullName = document.getElementById('username');
                        inputFullName.addEventListener('input', function () {
                            
                            var inputFullName = this.value;
                        
                            
                            if (inputFullName.length < 0) {
                            this.style.color = 'black';
                            this.style.fontWeight='normal';
                            } 
                            else {
                            this.style.color = '#31087B'; 
                            this.style.fontWeight = "bold";
                            }
                        });
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
                </div>
                <br>

                <div class="row">
                    <label for="inputemail" class="form-label">Email: </label>
                    <input type="text" class="form-control" id="inputemail" name="InputEmail"  required>
                    <span id="foremailmsg" style="color:red;"></span>

                    <script>
                                    
                        var inputemail = document.getElementById('inputemail');
                        inputemail.addEventListener('input', function () {
                            var inputemail = this.value;
                            if (inputemail.length < 0) {
                            this.style.color = 'black';
                            this.style.fontWeight='normal';
                            } 
                            else {
                            this.style.color = '#31087B'; 
                            this.style.fontWeight = "bold";
                            }
                        });
                        document.getElementById('inputemail').addEventListener('input', checkEmail);
                        var emailMSG = document.getElementById('foremailmsg');

                        function checkEmail() {
                            var emailInput = document.getElementById('inputemail');
                            var emailValue = emailInput.value;
                            
                            // Regex pattern checks for '@' followed by some characters and ending with '.com'
                            var emailformat = /@[a-zA-Z0-9-]+\.com$/;

                            if (emailformat.test(emailValue)) {
                                emailMSG.textContent = 'Valid Email'; 
                            } else {
                                emailMSG.textContent = 'Email must contain "@" followed by some text and end with ".com"';
                            }
                        }

                    </script>
                </div>
                <div class="row">
                    <label for="inputpassword" class="form-label">Password:</label>
                    <input type="text" class="form-control" id="inputpassword" name="InputPassword" minlength="6" placeholder="Please Enter Password..." required>
                    <span id="forpasswordmsg" style="color:red;"></span>

                </div>
                <img class="hideimg" id="eye" src="images/hide.png">
                <script>
                        var eye=document.getElementById("eye");
                        var inputpassword=document.getElementById("inputpassword");
                        var forpasswordmsg=document.getElementById("forpasswordmsg")
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
                

                </div>
                <div class="row">
                    <label for="contactnumber" class="form-label">Contact Number:</label>
                    <input type="text" class="form-control" id="contactnumber" minlength="10" maxlength="11" name="contactNumber"  required>
                    <span id="forphonemsg" style="color:red;"></span>

                </div><br>
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
                    
                    <button type="submit" class="btn btn-danger" style="width: 200px;margin-left:auto;margin-right:auto;"  name="register">Register</button>
                </div>
                
                <div class="row">
                    <span>Already Register?</span>
                    <a href="login.php">Login Now</a>
                    
                </div>
                
           


    
            </div>
        </form>
    </div>
    
  


    <?php
        if (isset($_POST["register"])) {
            $LOCALHOST = 'localhost';
            $ROOT = 'root';
            $PASSWORD = '';
            $DATABASE = 'sport';

            $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } else {
                // Sanitize Inputs
                $InputEmail = filter_input(INPUT_POST, 'InputEmail', FILTER_SANITIZE_EMAIL);
                $Username = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_STRING);
                $contactNumber = filter_input(INPUT_POST, 'contactNumber', FILTER_SANITIZE_NUMBER_INT);
                $InputPassword = $_POST['InputPassword']; // Don't sanitize as we'll hash it

                if (empty($InputEmail) || empty($Username) || empty($InputPassword) || empty($contactNumber)) {
                    echo "<script> alert('All fields are required!'); window.history.back(); </script>";
                    exit();
                }
                if (!ctype_alnum($Username)) {
                    echo "<script> alert('Error Name Try Again'); window.history.back(); </script>";
                    exit();
                }
                if (!filter_var($InputEmail, FILTER_VALIDATE_EMAIL)) {
                    echo "<script> alert('Invalid email format'); window.history.back(); </script>";
                    exit();
                }

                $passwordPattern = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/";
                if (!preg_match($passwordPattern, $InputPassword)) {
                    echo "<script> alert('Password must be at least 8 characters long, contain at least one number, one uppercase letter, and one lowercase letter.'); window.history.back(); </script>";
                    exit();
                }

                if (!is_numeric($contactNumber) || strlen($contactNumber) < 10 || strlen($contactNumber) > 11) {
                    echo "<script> alert('Contact number must be between 10 and 11 digits and only contain numbers.'); window.history.back(); </script>";
                    exit();
                }

                $stmt = $conn->prepare("SELECT username FROM user WHERE username = ?");
                $stmt->bind_param("s", $Username);
                $stmt->execute();
                
                $resultUsername = $stmt->get_result();
                $check_username = $resultUsername->fetch_assoc();
                if ($check_username) {
                    echo "<script> alert('Exist Name . Try another.'); window.history.back(); </script>";
                    exit();
                }
                
                // Close the statement before reusing it
                $stmt->close();

                $stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
                $stmt->bind_param("s", $InputEmail);
                $stmt->execute();

                $result = $stmt->get_result();
                $check_useremail = $result->fetch_assoc();
                if ($check_useremail) {
                    echo "<script> alert('Email Exist. Try Again'); window.history.back(); </script>";
                    exit();
                }

                // Check for existing contact number
                $stmt->prepare("SELECT contactNumber FROM user WHERE contactNumber = ?");
                $stmt->bind_param("s", $contactNumber);
                $stmt->execute();

                $resultContact = $stmt->get_result();
                $check_contact = $resultContact->fetch_assoc();
                if ($check_contact) {
                    echo "<script> alert('Phone Exists . Try Again'); window.history.back(); </script>";
                    exit();
                }

                // Hashing the password and inserting the user
                $hashedPassword = password_hash($InputPassword, PASSWORD_BCRYPT);
                $insert = $conn->prepare("INSERT INTO user (username, email, password, contactNumber) VALUES (?, ?, ?, ?)");
                $insert->bind_param("ssss", $Username, $InputEmail, $hashedPassword, $contactNumber);
                if ($insert->execute()) {
                    echo "<script> alert('Hi Thank You Join CH Sport Complex'); window.location= 'login.php'; </script>";
                } else {
                    echo "Error: " . $conn->error;
                }
                $stmt->close();
                $insert->close();
            }
            $conn->close();
        }
        ?>



