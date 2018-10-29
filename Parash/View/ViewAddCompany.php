
<?php
session_start();
if (isset($_SESSION['login_user'])) {
  header('location: Viewhome.php');
}elseif (isset($_SESSION['login_admin'])) {
  header('location: Viewadmin.php');
}elseif (!isset($_SESSION['login_employer'])) {
  header('location: Viewlogin.php');
}

include_once '../Action/ActionAddCompany.php';
$action_addCompany=new ActionAddCompany();
if (isset($_POST['addCompany'])) {
	$action_addCompany->invoke();
}
include_once "header.php";
?>

<div class="header">
	Add your organization
</div>

	<div>
		<form method="post">
			<input type="text" name="company_name" placeholder="Company Name" required=""></BR>
			<input type="email" name="company_email" placeholder="Company Email" required=""></BR>
			<input type="text" name="company_desc" placeholder="Company Description" required=""></BR>
			<input class="but" type="submit" name="addCompany">
		</form>
	</div>
</body>
</html>