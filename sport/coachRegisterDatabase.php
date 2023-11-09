<?php
if (isset($_POST['coachRegister'])) {
    $LOCALHOST = 'localhost';
    $ROOT = 'root';
    $PASSWORD = '';
    $DATABASE = 'sport';

    $conn = new mysqli($LOCALHOST, $ROOT, $PASSWORD, $DATABASE);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        //mysqli_real_escape_string is ensure the data safely secure save to database prevent sql injecttion attack
        $coachEmail =mysqli_real_escape_string($conn, $_POST['CoachEmail']);
        $coachFullName= mysqli_real_escape_string($conn, $_POST['CoachFullName']);
        $coachIC=mysqli_real_escape_string($conn, $_POST['coachIC']);
        $coachPhone= mysqli_real_escape_string($conn, $_POST['coachPhone']);
        $coachQualification=mysqli_real_escape_string($conn, $_POST['Qualifications']);
        $sportSkill=mysqli_real_escape_string($conn, $_POST['sportSkill']);
        
       
        
       

        
        $checkcoachemailMatching=  $conn->query("SELECT * FROM user WHERE email = '$coachEmail'");
        if ($checkcoachemailMatching->num_rows === 0) {
            // The provided email does not exist in the user table, display an alert
            echo "<script> alert('Email does not exist!'); window.history.back(); </script>";
        } 
        else {
            // Insert the new booking record
            $insertSql = "INSERT INTO coach (identityNumber	, email, fullName, phoneContact, qualification, sportSkills) 
            VALUES ('$coachIC', '$coachEmail', '$coachFullName', '$coachPhone', '$coachQualification', '$sportSkill')";

        if ($conn->query($insertSql) === TRUE) {
           // Successful registration alert and input field disable
    echo "<script> alert('You Have Registered, Kindly Wait For the Approval / Reject ');</script>";

    // Disable input fields after successful submission
    echo "<script>
        var inputField = document.querySelectorAll('.form-control');
        for (var x = 0; x < inputField.length; x++) {
            inputField[x].disabled = true;
        }
    </script>";

    // Redirect to another page
    echo "<script> window.location.replace('homepage.php'); </script>";


        } else {
                echo "Error: " . $conn->error;
            }
        }

        $conn->close();
    }
}
?>