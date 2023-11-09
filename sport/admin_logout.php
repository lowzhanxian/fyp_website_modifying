<?php
session_start(); 

unset($_SESSION['admin_name_input']);
unset($_SESSION['admin_id_input']);
unset($_SESSION['adminpassword']);

header("Location: adminLogin.php"); // Redirect back to login page
exit;
?>
