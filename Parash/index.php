<?php
$conn = mysqli_connect("localhost","root","");
$db_exists = mysqli_select_db($conn,"Parash");
if (!$db_exists) {
  header("location: Setup.php");
}else header('location: View/Viewlogin.php');
?>