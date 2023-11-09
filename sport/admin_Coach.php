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
    <link rel="stylesheet" href="css/adminCoach.css">
	<?php include 'admin_header.php';?>
   
</head>
<body onload="realtime()">
    <div class="row animate-box">
            <div class="box1" id="box1">
                <a href="#addCoach"  onclick="openAddCoachdiv()">
                    <div class="program program-schedule">
                        <img src="images/adminBookingIMG.png" alt="booking">
                        <h3 id="h3_adminDash">Add Coach </h3>
                        <h4></h4>
                    </div>
                </a>
            </div>
            <script>
                function openAddCoachdiv(){
                    const addcoach=document.getElementById('addCoach')
                    if (addcoach.style.display === 'none' || addcoach.style.display === '') {
                        addcoach.style.display = 'block';
                    } else {
                        addcoach.style.display = 'none';
                    }
                            }
            </script>
            <?php
				$LOCALHOST = 'localhost';
				$ROOT = 'root';
				$PASSWORD = '';
				$DATABASE = 'sport';
			
				$conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
			}

			
			$selectquery = "SELECT COUNT(*) AS totalcoach FROM coach ";

			
			$result =$conn->query($selectquery);

			if($result){
				$row= $result->fetch_assoc();
				$totalcoach = $row['totalcoach'];
				$conn->close();
			}
			else{
				echo "error:" ,$conn->error;
			}
		?>
            <div class="box2" id="box2">
                <a href="totalcoachpage.php">
                    <div class="program program-schedule">
                        <img src="images/adminBookingIMG.png" alt="booking">
                        <h3 id="h3_adminDash">Total Coach: <span id="totalcoachspan"><?php echo number_format($totalcoach); ?> </span></h3>
                        <h4></h4>
                    </div>
                </a>
            </div>
            <div class="box3">
                <a href="#removeCoach" onclick="removeCoachdiv()">
                    <div class="program program-schedule">
                        <img src="images/adminBookingIMG.png" alt="booking">
                        <h3 id="h3_adminDash">Remove Coach</h3>
                        <h4></h4>
                    </div>
                </a>
            </div>
            <script>
                function removeCoachdiv(){
                    const removecoach=document.getElementById('removeCoach')
                    if (removecoach.style.display === 'none' ) {
                        removecoach.style.display = 'block';
                    } else {
                        removecoach.style.display = 'none';
                    }
                            }
            </script>
            
    </div>
        
            <div class="addCoach" id="addCoach" style="display:none;">
                <form action="" id="add" class="form-control"  method="post">
                        <button type="button" class="btn-close" aria-label="Close" onclick="closeaddcoachform()"></button>
                        <script>
                            function closeaddcoachform(){
                                const addCoach=document.getElementById("addCoach");
                                document.getElementById("coachname").value='';
                                document.getElementById("coachphone").value='';
                                document.getElementById("timeslot").value='';
                                document.getElementById("trainingprice").value='';
                                document.getElementById("statusSkill").value='';
                                addCoach.style.display="none";
                            }
                        </script>
                        <h1 class="heading1">Add  Coach</h1>
                            <div class="row">
                                <div class="col">
                                    <label for="coachname" class="form-label">Coach Name:</label><br>
                                    <input type="text"  class="form-control" id="coachname" name="coachName" pattern="[A-Za-z\s]+"  required><br>
                                    <p id="error-message" style="color: red;"></p>

                                    <script>
                                        var userNameInput=document.getElementById('coachname');


                                        userNameInput.addEventListener('input',function()
                                        {
                                            this.value=this.value.replace(/[0-9]/g, '');
                                        });
                                    </script>
                                    <script>
                                        document.getElementById('coachname').addEventListener('input', function(event) {
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

                                </div>
                                <div class="col">
                                    <label for="coachphone" class="form-label">Coach Phone:</label><br>
                                    <input type="text" id="coachphone" class="form-control"  name="coachPhone" minlength="10" maxlength="10" required><br>
                                    <span id="forphonemsg" style="color:red;"></span><br>

                                </div>
                                <script>
									var PhoneInput=document.getElementById('coachphone');


									//now we want to disable the user to type the numeric number 
									PhoneInput.addEventListener('input',function()
									{
										this.value=this.value.replace(/\D/g, '');
										});
								
                                        document.getElementById('coachphone').addEventListener('input', phonenumber);
                                        var phoneMsg = document.getElementById('forphonemsg');
                                        function phonenumber() {
                                            const phoneInput = document.getElementById('coachphone');
                                            phoneInput.value = phoneInput.value.replace(/[^0-9]/g, ''); 
                                            if (this.value.length < 10 || this.value.length > 12 || !this.value.startsWith('01')) {
                                                phoneMsg.textContent = 'Invalid Number';
                                                
                                            } else {
                                                phoneMsg.textContent = 'Valid Number';
                                            }
                                        }
                                </script>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="timeslot" class="form-label">Time Slot:</label><br>
                                    <select name="timeSlot" class="form-select" id="timeslot" required>
                                        <option disabled selected >Arrange Time Slot</option> 
                                        <option value="6:00pm-7:00pm | Every monday">6:00pm-7:00pm Every Monday</option>
                                        <option value="7:00pm-8:00pm | Every Wednesday">7:00pm-8:00pm | Every Wednesday</option>     
                                        <option value="8:00pm-9:00pm | Every Friday">8:00pm-9:00pm | Every Friday</option>                               
                                     </select>
                                </div>
                                <div class="col">
                                    <label for="trainingprice" class="form-label">Training Price /Month :</label><br>
                                    <input type="text" class="form-control" id="trainingprice" maxlength="4" name="trainingPrice"  required><br>
                                    <span id="pricemessage" style="color:red;"></span><br>
                                    <script>
                                        var trainingprice=document.getElementById('trainingprice');


                                        //now we want to disable the user to type the numeric number 
                                        trainingprice.addEventListener('input',function()
                                        {
                                            this.value=this.value.replace(/\D/g, '');
                                            });

                                            document.getElementById('trainingprice').addEventListener('input', trainPrice);
                                            var priceTrain = document.getElementById('pricemessage');
                                            function trainPrice() {
                                                const priceTrainInput = document.getElementById('trainingprice');
                                                priceTrainInput.value = priceTrainInput.value.replace(/[^0-9]/g, ''); 
                                                if (this.value.startsWith('0')) {
                                                    priceTrain.textContent = 'Invalid Price';
                                                    this.value='';
                                                    
                                                } else {
                                                    priceTrain.textContent = 'Valid Price';
                                                }
                                            }
                                    </script>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col">
                                    <label for="statusSkill" class="form-label">Status Skill:</label><br>
                                    <select class="form-select" id="statusSkill" name="statusSkill" required >
                                        <option disabled selected>Select Coach Skills</option>
                                        <option value="Basic" selected>Basic</option>
                                        <option value="Advanced">Advanced</option>
                                        
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="typesport" class="form-label">Type Of Sports:</label><br>
                                    <select class="form-select" id="typesport" name="typeSport" required>
                                        <option disabled selected>Select Coach Skills</option>
                                        <option value="Badminton" >Badminton</option>
                                        <option value="Basketball">Basketball</option>
                                        <option value="Futsal">Futsal</option>
                                        
                                    </select>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="numberuser" class="form-label">Capacity:</label><br>
                                    <input type="text" id="numberuser" class="form-control"  name="numberuser" minlength="1"  required><br>
                                    <span id="forpricemsg" style="color:red;"></span><br>
        
                                </div>
                                <script>
                                        var capacityStudent=document.getElementById('numberuser');


                                        //now we want to disable the user to type the numeric number 
                                        capacityStudent.addEventListener('input',function()
                                        {
                                            this.value=this.value.replace(/[^0-9]/g, '');
                                            });

                                            document.getElementById('numberuser').addEventListener('input', studentCapacity);
                                            var cpastu = document.getElementById('forpricemsg');
                                            function studentCapacity() {
                                                const studentCapacityInput = document.getElementById('numberuser');
                                                if ( this.value > 20 ) {
                                                    cpastu.textContent = 'Limited Student Under 20 people ';
                                                    this.value='';
                                                    
                                                } else {
                                                    cpastu.textContent = 'Valid Capacity';
                                                }
                                            }
                                    </script>
                                <div class="col">
                                    <label for="id" class="form-label">Coach Id:</label><br>
                                    <input type="text" id="id" class="form-control"  name="coachId" minlength="1"  required><br>
                                    <span id="foridmsg" style="color:red;"></span><br>

                                </div>
                                <script>
                                    var idnumeric=document.getElementById('id');


                                    //now we want to disable the user to type the numeric number 
                                    idnumeric.addEventListener('input',function()
                                    {
                                        this.value=this.value.replace(/[^0-9]/g, '');
                                        });
                                     
                                </script>
                            </div>
                            
                            <br>
                            <button type="submit" class="btn btn-primary form-control"name="addCoachbutton" id="btnSubmit">Add Coach</button>
                            <br><br>
                           
                </form>
                <?php
                    if(isset($_POST['addCoachbutton']))
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
                            $coachname = mysqli_real_escape_string($conn, $_POST['coachName']);
                            $coachphone = mysqli_real_escape_string($conn, $_POST['coachPhone']);
                            $timeslot = mysqli_real_escape_string($conn, $_POST['timeSlot']); 
                            $trainingprice = mysqli_real_escape_string($conn, $_POST['trainingPrice']);
                            $statusskill = mysqli_real_escape_string($conn, $_POST['statusSkill']);
                            $typesport = mysqli_real_escape_string($conn, $_POST['typeSport']);
                            $maximumpeople=mysqli_real_escape_string($conn,$_POST['numberuser']);
                            $coachid=mysqli_real_escape_string($conn,$_POST['coachId']);

                            if(empty($coachname) || empty($coachphone) || empty($timeslot) || empty($trainingprice) || empty($statusskill) || empty($typesport) || empty($maximumpeople) || empty($coachid)) {
                                echo "<script> alert('All fields are mandatory.'); window.history.back(); </script>";
                                exit;
                            }
                            if(!is_numeric($coachphone) || (strlen($coachphone) != 10 && strlen($coachphone) != 11)) {
                                echo "<script> alert('Invalid contact number. Please enter a 10 or 11 digit numeric contact number.'); window.history.back(); </script>";
                                exit;
                            }

                    
                            $checkTimeSlotSql = "SELECT * FROM coach WHERE CoachName = '$coachname' AND TimeSlot = '$timeslot'";
                            $checkTimeSlot = $conn->query($checkTimeSlotSql);
                            
                            if ($checkTimeSlot->num_rows > 0) {
                                echo "<script> alert('This time slot already exists for the given coach. Please avoid duplicate time slots.'); window.history.back(); </script>";
                                exit;
                            }
                            else {
                                //this is add the new coach
                                $insertcoachdetailsSql = "INSERT INTO coach (CoachName , Contact, TimeSlot, TrainingPrice, StatusSkill, TypeSport,capacity,id) 
                                VALUES ('$coachname', '$coachphone', '$timeslot', '$trainingprice', '$statusskill', '$typesport','$maximumpeople','$coachid')";
                    
                                if ($conn->query($insertcoachdetailsSql) === TRUE) {
                                    echo "<script> alert(' Added'); window.location.replace('admin_Coach.php'); </script>";
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                            }
                    
                            $conn->close();
                        }
                    }
                ?>
            </div>
            <div class="remove_Coach" id="removeCoach" style="display:none;">
                <form action="" id="remove" class="form-control" method="post">
                        <button type="button" class="btn-close" aria-label="Close" onclick="closeremovecoachform()"></button>
                        <script>
                            function closeremovecoachform(){
                                const removeCoach=document.getElementById("removeCoach");
                                document.getElementById("coachname").value='';
                               
                                removeCoach.style.display="none";
                            }
                        </script>
                        <h1 class="heading1">Remove Coach</h2>
                        

                        
                            <div class="row">
                                <div class="col">
                                    <label for="coachid" class="form-label">Coach id:</label><br>
                                    <input type="text"  class="form-control" id="coachid" name="coachid"  required><br>
                                    
                                </div>
                                <div class="col">
                                    <label for="coachconfirmid" class="form-label">Confirm id:</label><br>
                                    <input type="text"  class="form-control" id="coachconfirmid" name="coachconfirmID"   required><br>
                                    
                                </div>
                            
                            </div>
                            
                            
                            <br>
                            <button type="submit" name="removeCoachid" class="btn btn-primary form-control"  id="btnSubmit">Remove Coach</button>
                            
                            
                            <br><br>

                            <div class="error"></div>
                            <div class="success"></div>
                </form>
                <?php
                    if(isset($_POST['removeCoachid'])){
                        $LOCALHOST = 'localhost';
                        $ROOT = 'root';
                        $PASSWORD = '';
                        $DATABASE = 'sport';
                        $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

                        $coachid = mysqli_real_escape_string($conn, $_POST['coachid']);
                        $confirmIdData = mysqli_real_escape_string($conn, $_POST['coachconfirmID']);

                        if ($coachid === $confirmIdData) {
                            $query = "DELETE FROM coach WHERE id = '$coachid'";
                            
                            $queryStatus = $conn->query($query);

                            if ($queryStatus) {
                                echo '<script type="text/javascript">'; 
                                echo 'alert("Coach Removed");'; 
                                echo '</script>';
                            } else {
                                echo "Something Went Wrong. Please Check and Try Again";
                            }
                        } else {
                            echo "The ID and Confirmation Do Not Match";
                        }
                        $conn->close();
                    }
                    ?>

            </div>


            
                   
	
</body>