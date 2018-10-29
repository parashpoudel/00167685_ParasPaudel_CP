<?php

session_start();
if (isset($_SESSION['login_user'])) {
  header('location: Viewhome.php');
}elseif (isset($_SESSION['login_admin'])) {
  header('location: Viewadmin.php');
}elseif (!isset($_SESSION['login_employer'])) {
	header('location: Viewlogin.php');
}
unset($_SESSION['company_id']);
include_once '../Action/ActionCompanyJob.php';
$action_companyJob = new ActionCompanyJob();

$company = $action_companyJob->getCompany();

// when user click add job\
if (isset($_POST['addjob'])) {
	$action_companyJob->addJob();
}
include_once "header.php";				
?>
<span style="font-style: oblique; font-size: 40px; margin-left: 40px; ">Welcome Employer</span><br>

<div class="header">
  <ul><a style="font-family: sans-serif; font-size: 40px; margin-left: 510px; padding: 10px; background-color: grey; color: white; border-style: groove; "  href="ViewAddCompany.php">Add Company</a></ul>
  <ul><a style="float: right; margin-top: -80px; margin-right: 40px; color: white; border: double; background-color: #8080804a;" href="logout.php">Log out</a></ul>
</div>
<div  class="company" >
	<TABLE >
		<THEAD>
			
		</THEAD>
		<TBODY >
			<?php 
			// show error if empty
				foreach ($company as $row ) {
				$company_name = $row['company_name'];
				$company_id = $row['company_id'];
				echo "<TR >".$row['company_name']."</TR>";
				echo "<a  href='ViewCompanyJob.php?company_id=".$company_id."'> Add job  </a>";
				echo "<a href='ViewJobDetail.php?company_id=".$company_id."'>  Job Details</a><BR><HR>";
				
	// echo "<a href='viewforumanswer.php?forumId=".$forumId."'> Questions :".$question."</a></br>";
				}
			?>
		</TBODY>
	</TABLE>
</div>
<div class="addjob">
	<!-- Add job to selected company -->
	<?php 
	if (isset($_GET['company_id'])) {
		echo "<span style='margin-left:50px;'>Add Job details</span>";
		echo "<form method='post' id='addjob'>
		Job Title<input style='margin-left: 140px;' type='text' name='job_title' placeholder='Job Title' required=''></br><br>
		Job Category<input style='margin-left: 105px;' type='text' name='job_category' placeholder='Job Category' required=''></br><br>
		Job Level<input style='margin-left: 135px;' type='text' name='job_level' placeholder='Job level' required=''></br><br>
		No of Vacancy<input style='margin-left: 100px;' type='number' name='job_no' placeholder='No of jobs' required='' min='1' max='1000'></br><br>
		Job Shift <input style='margin-left: 139px;' type='text' name='job_shift' placeholder='Shift' required=''></br><br>
		Job Location<input style='margin-left: 111px;' type='text' name='job_location' placeholder='Location' required=''></br><br>
		Job Salary<input style='margin-left: 128px;' type='number' name='job_salary' placeholder='Salary' required='' min='100' max='90000000'></br><br>
		Job Deadline<input style='margin-left: 110px;' type='date' name='job_deadline' placeholder='Deadline' required=''></br><br>
		Job Education<input style='margin-left: 100px;' type='text' name='job_education' placeholder='education' required></br><br>
		Job Experience<input style='margin-left: 95px;' type='number' name='job_experience' placeholder='Experience' required='' min='0' max='50'></br>
		<input type='submit' name='addjob' value='Add Job'>
		</form>";
	}
	?>
</div>
</body>
</html>