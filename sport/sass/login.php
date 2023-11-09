<?php
    session_start(); 
?>
<?php
include('loginHNF/header.php');

$LOCALHOST = 'localhost';
$ROOT = 'root';
$PASSWORD = '';
$DATABASE = 'sport';
$SITEURL = 'http://localhost/website_fyp_modifiying/sport/';

//establish the connection to the database
$conn = mysqli_connect($LOCALHOST,$ROOT,$PASSWORD,$DATABASE) or die(mysqli_error($conn));

if(isset($_POST['login'])){

    //variable to store the name,email and password 
    $Username = $_POST['Username'];
    $InputEmail = $_POST['InputEmail'];
    $InputPassword = $_POST['InputPassword'];
    $contactNumber=$_POST['contactNumber'];

    //sql to select the information
    $sql = "SELECT * FROM user WHERE username='$Username' AND email='$InputEmail' AND password='$InputPassword' AND contactNumber='$contactNumber'";

    //execute the query
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);//count number of account include username, email,password

    //put the result in an array 
    $row = mysqli_fetch_assoc($result);

    //check if there is a match
    if($count == 1){
        session_start();
        $_SESSION ['username']=$Username;
        $_SESSION ['email']=$InputEmail;
        $_SESSION ['password']=$InputPassword;
        $_SESSION['contactNumber']=$contactNumber;
        $_SESSION['membership']="basic";

       
        //message to welcome
        header('location:' .$SITEURL.'homepage.php');
        exit();
    }
    else{
        echo "<script> alert('None Registed Account !');window.location= \"Register.php\"; </script>";
        exit();
    }
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
        <div class="row grid">
            <div class="row1">
                <label for="name" class="loginLabel">Name:</label>
                <input type="text" class="fieldInput" id="username" name="Username" placeholder="Please Enter Username...">
            </div>
            <div class="row2">
                <label for="email" class="loginLabel">Email: </label>
                <input type="text" class="fieldInput" id="inputemail" name="InputEmail" placeholder="Please Enter Email...">
            </div>
            <div class="row3">
                <label for="password" class="loginLabel">Password:</label>
                <input type="password" class="fieldInput" id="inputpassword" name="InputPassword" placeholder="Please Enter password...">
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
             
            </div>
            <div class="rowforPhone">
                    <label for="Phone" class="loginLabel">Contact Number:</label>
                    <input type="text" class="fieldInput" id="contactnumber" name="contactNumber" placeholder="Please Enter Contact..." required>
                </div>
            <div class="row4">
                <button class="allBtn" name="login">Login</button>
            </div>
            <div class="row5">
                <span>New User?</span>
                <a href="Register.php">Register Now</a>
            </div>
        </div>
    </form>
</div>

<?php
include('loginHNF/footer.php');
?>
