<?php
session_start();
if (isset($_SESSION['login_user'])) {
  header('location: Viewhome.php');
}elseif (isset($_SESSION['login_admin'])) {
  header('location: Viewadmin.php');
}elseif (isset($_SESSION['login_employer'])) {
  header('location: ViewCompanyJob.php');
}

include_once '../Action/Actionregister.php';
$action_register=new ActionRegister();
if (isset($_POST['register'])) {
	$action_register->invoke();
}
include_once "header.php";
?>



	<div style="margin-left: 450px;">
		<span style="font-size: 40px;"> Register as a Job Seeker</span>
		<form style=" margin-right: 480px; padding: 20px; border: double; background-color: #8080804a;"" class="room" method="post" action="">

			<label>Username</label>
			<input style="margin-left: 50px;" class="textfield" type="text" name="user_name" placeholder="Username" required="">
			<br>
			<label>Email</label>
			<input style="margin-left: 82px;" class="textfield" type="email" name="email" placeholder="email" required="">
			<br>
			<label>Gender</label>
			<select style="margin-left: 68px;" class="textfield" name="gender" >
				<option>Select</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
			<br>
			<label>Password</label>
			<input style="margin-left: 52px;" class="textfield" type="password" name="password" placeholder="Password" required="">
			<br>
			<label>Confirm Password</label>
			<input style="margin-left: 30px;" class="textfield" type="password" name="confirmPassword" placeholder="Confirm Password" required="">
			<br>
			<label> Address</label>
			<input style="margin-left: 60px;"class="textfield" type="text" name="address" placeholder="Address" required="">
			<br>
			<label>Phone Number</label>
			<input style="margin-left: 10px;" class="textfield" type="text" name="phoneNumber" placeholder="Phone number" required="">
			<br>
			<label>Postal Code</label>
			<input style="margin-left: 35px;" class="textfield" type="text" name="postalCode" placeholder="postal Code" required="">
			<br>
			<input class="but" type="submit" name="register">
		</form>
	</div>

	<div  class="header">
	<ul><a style="border: double; background-color: #8080804a; color: white;" href="viewlogin.php">Back to Login</a></ul>
</div>
</body>
</html>