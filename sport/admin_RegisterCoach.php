<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CH SC | ADMIN</title>
    <link rel="icon" type="image/x-icon" href="images/title.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminDashBoard.css">
    <link rel="stylesheet" href="css/admin_RegisterCoach.css">
	<?php include 'admin_header.php';?>
   
</head>
<body onload="realtime()">
    
    <div class="registerCoachdiv">
        <form method="post">
                <label class="form-label" for="CoachName">Name:</label>
                <input type="text" class="form-control" name="coachname" id="CoachName" minlength="1" required>
                <p id="error-message" style="color: red;"></p>
                <script>
                    var userNameInput=document.getElementById('CoachName');


                    //now we want to disable the user to type the numeric number 
                    userNameInput.addEventListener('input',function()
                    {
                        this.value=this.value.replace(/[0-9]/g, '');
                    });
                </script>
                <script>
                    document.getElementById('CoachName').addEventListener('input', function(event) {
                        var nameInput =this;
                        var errorMessage = document.getElementById('error-message');

                        // This regex checks for names with alphabets, spaces, hyphens, apostrophes, and periods.
                        var regex = /^[A-Za-z\s\-'\.]+$/;

                        if (!regex.test(nameInput.value) && nameInput.value !== '') {
                            errorMessage.textContent = 'Please enter a valid name.';
                            nameInput.value="";
                        } else {
                            errorMessage.textContent = ''; 
                        }
                    });
                </script>

                <label class="form-label" for="emailInput">Email:</label>

                <input type="email" class="form-control" id="emailInput" name="email_Coach" required>
                <span id="foremailmsg" style="color:red;"></span><br>
                <script>

                    document.getElementById('emailInput').addEventListener('input', checkEmail);

                    function checkEmail() {
                    const emailInput = document.getElementById('emailInput');
                    const emailValueLowercase = emailInput.value.toLowerCase();  // Convert the email value to lowercase
                    const emailMSG = document.getElementById('foremailmsg');

                    if (!emailValueLowercase.endsWith('@gmail.com')) {
                        emailMSG.textContent = 'Email must end with @gmail.com.';
                        
                    } else {
                        emailMSG.textContent = 'Valid Email'; 
                    }
                }

                </script>        
                
                <label for="Gender" class="form-label">Gender</label>
                <select id="Gender" name="gender" class="form-select" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>       <br>
                
                <label for="phone" class="form-label">Contact Number</label><br>
                <input type="text"class="form-control" id="phone" name="contactNumber" minlength="10" maxlength="11" required>
                <span id="forphonemsg" style="color:red;"></span><br>

                <script>
                        document.getElementById('phone').addEventListener('input', phonenumber);
                        var phoneMsg = document.getElementById('forphonemsg');
                        function phonenumber() {
                            const phoneInput = document.getElementById('phone');
                            phoneInput.value = phoneInput.value.replace(/[^0-9]/g, ''); 
                            if (this.value.length < 10 || this.value.length > 12 || !this.value.startsWith('01')) {
                                phoneMsg.textContent = 'Invalid Number';
                                
                            } else {
                                phoneMsg.textContent = 'Valid Number';
                            }
                        }
                </script>
            
                <label for="sportCate" class="form-label">Sport Category Provided</label><br>
                <select id="sportCate" name="sportCategory" class="form-select" required>
                    <option value="badminton">Badminton</option>
                    <option value="basketball">Basketball</option>
                    <option value="futsal">Futsal</option>
                </select>
                
                <label for="password" class="form-label">Password</label><br>
                <input type="password" class="form-control" id="password" name="coachPassword" minlength="10" maxlength="11"  required>
                <img class="hideimg" id="eye" style="width: 30px;" src="images/hide.png"><br><br>
                <script>
                    let eye=document.getElementById("eye");
                    let inputpassword=document.getElementById("password");

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

                <button type="submit" class="btn btn-dark" name="requestButton">Add Coach </button><br>

        
            </form>
        
    </div>
    <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;

        require 'phpmailer/src/PHPMailer.php';
        require 'phpmailer/src/Exception.php';
        require 'phpmailer/src/SMTP.php';
        if (isset($_POST['requestButton'])) {
            $LOCALHOST = 'localhost';
            $ROOT = 'root';
            $PASSWORD = '';
            $DATABASE = 'sport';
            $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

           

            $email_Coach = $_POST['email_Coach'];
            $name_Coach = $_POST['coachname'];
            $gender = $_POST['gender'];
            $contactNumber = $_POST['contactNumber'];
            $sportCategory = $_POST['sportCategory'];
            $password=$_POST['coachPassword'];
        
            // Prepared statement to prevent SQL injection
            $stmt = $conn->prepare("SELECT * FROM coachtraining WHERE email_Coach = ? AND coachname = ?");
            $stmt->bind_param("ss", $email_Coach, $name_Coach);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                echo "<script>alert('You Have added This coach');</script>";
            } else {
                if (!filter_var($email_Coach, FILTER_VALIDATE_EMAIL)) {
                    echo "<script>alert('Invalid email format');</script>";
                    return;
                }
        
                if (empty($name_Coach) || empty($email_Coach) || empty($gender) || empty($contactNumber) || empty($sportCategory) || empty($password)) {
                    echo "<script>alert('All fields are required!');</script>";
                    return;
                }
        
                if (substr($contactNumber, 0, 2) !== '01') {
                    echo "<script>alert('Contact number must start with 01');</script>";
                    return;
                }
        
                $bcryptpassword = password_hash($_POST['coachPassword'], PASSWORD_BCRYPT);
        
                $insertQuery = $conn->prepare("INSERT INTO coachTraining (coachname, email_Coach, gender, contactNumber, sportCategory, coachPassword, registrationDate) VALUES (?, ?, ?, ?, ?, ?, CURDATE())");
                $insertQuery->bind_param("ssssss", $name_Coach, $email_Coach, $gender, $contactNumber, $sportCategory, $bcryptpassword);
        
                if ($insertQuery->execute()) {
                    // Send an email using PHPMailer
                    $mail=new PHPMailer (true);;
                    
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->SMTPAuth=true;
                    $mail->Username='lowzhanxian9218@gmail.com';
                    $mail->Password='wwsneeazwfnjxgqz';
                    $mail->SMTPSecure='ssl';
                    $mail->Port=465;
                   
        
                    $mail->setFrom('lowzhanxian9218@gmail.com', 'CHSPORTCOMPLEX'); 
                    $mail->addAddress($email_Coach);
        
                    $mail->isHTML(true); // Set email format to HTML
                    
                    $mail->Subject = 'Successfully registered as a coach';
                    $mail->Body = 'You have been successfully registered as a coach. Here are your details:<br><br>'
                                . 'Email: ' . $email_Coach . '<br>'
                                . 'Name: ' . $name_Coach . '<br>'
                                . 'Contact: ' . $contactNumber . '<br>'
                                . 'Password: ' . $_POST['coachPassword'] . '<br><br>'
                                . 'Please login at: <a href="http://localhost/website_fyp_modifiying/sport/coachlogin.php">Coach Login</a>';
                    
                    if (!$mail->send()) {
                        echo '<script>alert("Mailer Error: ' . $mail->ErrorInfo . '");</script>';
                    } else {
                        echo '<script>alert("Registration successful! Details sent to your email.");</script>';
                    }
                } else {
                    echo "<script>alert('Error registering. Please try again later.');</script>";
                }
            }
        
            // Close the connection
            $conn->close();
        }

                        
        ?>


            
                   
	
</body>