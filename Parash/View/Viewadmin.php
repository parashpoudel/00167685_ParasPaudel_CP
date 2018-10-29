<?php
session_start();
if (isset($_SESSION['login_user'])) {
  header('location: Viewhome.php');
}elseif (!isset($_SESSION['login_admin'])) {
  header('location: Viewlogin.php');
}elseif (isset($_SESSION['login_employer'])) {
  header('location: ViewCompanyJob.php');
}

include_once '../Action/ActionAdmin.php';
$action_admin=new ActionAdmin();
$job_data = $action_admin->getJobData();

// if delete job is selected
if (isset($_GET['delete_job'])) {
	if ($action_admin->delete($_GET['delete_job'])) {
		echo "Job deleted";
	}else echo "There is a problem";
}
include_once "header.php";
?>


<body>
<div class="header">
  <ul><a href="logout.php">Log out</a></ul>
</div>

<div class="expiredjob">
	<?php 
		foreach ($job_data as $row ) {
		$job_id=$row['job_id'];
		echo "<TR>".$row['company_name']."</TR><BR>";
		echo "<TR>".$row['job_title']."</TR><BR>";
		echo "<TR>".$row['job_location']."</TR>";
		echo "<a href='Viewadmin.php?delete_job=$job_id'>Delete Expired job</a><HR>";
		}
	?>
</div>
 
</body>
</html>