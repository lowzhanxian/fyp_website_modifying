<?php
    if (isset($_POST['bookfac'])) 
    {
        $LOCALHOST = 'localhost';
        $ROOT = 'root';
        $PASSWORD = '';
        $DATABASE = 'sport';

        $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            // Validate and sanitize user inputs (e.g., use mysqli_real_escape_string)
            $date = mysqli_real_escape_string($conn, $_POST['date']);
            $timeSlot = mysqli_real_escape_string($conn, $_POST['courttime']);
            $courtNumber = mysqli_real_escape_string($conn, $_POST['courtNumber']); // Define $courtNumber
            $userEmail = mysqli_real_escape_string($conn, $_POST['email']);
            $username = mysqli_real_escape_string($conn, $_POST['userName']);
            $contactNumber = mysqli_real_escape_string($conn, $_POST['phone']);
            $totalPrice = mysqli_real_escape_string($conn, $_POST['courtPrice']);

        
            $checkSql = "SELECT * FROM sportfacilitiesreservation WHERE facilitytypecourtnumber = '$courtNumber' AND date = '$date' AND timeslot = '$timeSlot'";
            $checkResult = $conn->query($checkSql);
            
            

            if ($checkResult->num_rows > 0) {
                echo "<script> alert('Court Already Booked!'); window.history.back(); </script>";
            } else {
            
                $insertSql = "INSERT INTO sportfacilitiesreservation (date, timeslot, facilitytypecourtnumber, useremail, username, contactnumber, totalprice) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($insertSql);
                $stmt->bind_param("ssssssd", $date, $timeSlot, $courtNumber, $userEmail, $username, $contactNumber, $totalPrice);

                if ($stmt->execute()) {
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
                                window.location.replace(\'FacilitiesBook.php\');
                            },2000);
                        </script>';
                } else {
                // Handle errors
                }

                $stmt->close();
                    }
                }
    }
?>