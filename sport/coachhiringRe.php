<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Coach Register</title>
		<link rel="icon" type="image/x-icon" href="images/title.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/coachingHiring.css">
    
    
    
</head>
<body>
        <div class="h">
            <a id="backButton" href="homepage.php">Back</a>
        </div>
        <div class="header">
            <h1 style="font-weight:bold;color:white;">APPLICATION COACH</h1>
        </div>
        

        <div class="form">
                <p style="color:red;">GET YOUR CHANCE TO APPLY FOR COACH </p>
                <p  style="color:red;">FILL UP YOUR DETAILS ALL FIELD REQUIRED </p>
                
            <form method="post" enctype="multipart/form-data">
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
                
                <label for="Gender" class="form-label">Gender</label><br><br>
                <select id="Gender" name="gender" class="form-select" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>       
                
                <label for="phone" class="form-label">Contact Number</label><br>
                <input type="text" id="phone" name="contactNumber" minlength="10" maxlength="11" required><br>
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
                <label>Upload Your Resume</label>
                <input type="file" class="form-control" name="pdfFile" id="pdfFile" accept=".pdf" required><br>

                <button type="submit" class="btn btn-dark" name="requestButton">Request </button><br>

                <p>By clicking 'Request' you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</p>
        
            </form>
        </div>
        <?php
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
                    $resume = $_FILES['pdfFile'];

                    $checkExistRequest = "SELECT * FROM applicationCoach WHERE email='$email_Coach' AND name='$name_Coach'";
                    $result = mysqli_query($conn, $checkExistRequest);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<script>alert('You have submitted before, Please Wait for the admin processing.');</script>";
                    } else {
                        if (!filter_var($email_Coach, FILTER_VALIDATE_EMAIL)) {
                            echo "<script>alert('Invalid email format');</script>";
                            return;
                        }

                        // Check for empty fields
                        if (empty($_POST['coachname']) || empty($_POST['email_Coach']) || empty($_POST['gender']) || empty($_POST['contactNumber']) || empty($_POST['sportCategory']) || empty($_FILES['pdfFile']['name'])) {
                            echo "<script>alert('All fields are required!');</script>";
                            return;
                        }

                        if (substr($contactNumber, 0, 2) !== '01') {
                            echo "<script>alert('Contact number must start with 01');</script>";
                            return;
                        }

                        // Move the file to a permanent location (you can customize the path)
                        $uploadDir = 'uploadsFile/';
                        $uploadFilePath = $uploadDir . basename($resume['name']);
                        if (move_uploaded_file($resume['tmp_name'], $uploadFilePath)) {
                            $insertQuery = "INSERT INTO applicationCoach (name, email, gender, contactNumber, sportCategory, resumeFile) VALUES (?, ?, ?, ?, ?, ?)";
                            $stmt = mysqli_prepare($conn, $insertQuery);
                            mysqli_stmt_bind_param($stmt, "ssssss", $name_Coach, $email_Coach, $gender, $contactNumber, $sportCategory, $uploadFilePath);

                            if (mysqli_stmt_execute($stmt)) {
                                echo "<script>alert('Your application has been submitted successfully!');</script>";
                            } else {
                                echo "<script>alert('An error occurred while processing your application.');</script>";
                            }
                        } else {
                            echo "<script>alert('Failed to save the resume.');</script>";
                        }
                    }
                }
                ?>


                

        

</body>
</html>
