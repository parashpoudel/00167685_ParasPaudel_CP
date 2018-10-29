<?php

session_start();
if (isset($_SESSION['login_user'])) {
  header('location: Viewhome.php');
}elseif (isset($_SESSION['login_admin'])) {
  header('location: Viewadmin.php');
}elseif (!isset($_SESSION['login_employer'])) {
  header('location: Viewlogin.php');
}
include_once '../Action/ActionJobDetail.php';
$action_jobdetail = new ActionJobDetail();

if (isset($_GET['company_id'])) {
  $job_data = $action_jobdetail->getJobData($_GET['company_id']);
  $_SESSION['company_id']=$_GET['company_id'];
}


// // when user click update job\
if (isset($_POST['updatejob'])) {
  $action_jobdetail->updateJob();
}

// when user click delete job
if (isset($_GET['delete_job'])) {
    if ( $action_jobdetail->delete($_GET['delete_job'])) {
      echo "Job deleted";
      header("location: ViewJobDetail.php?company_id=".$_SESSION['company_id']."");
    }
}
// when user click edit job_id (retriving data to edit)
if (isset($_GET['edit_job'])) {
  $job_data = $action_jobdetail->getSpecificJobData($_GET['edit_job']);
}
include_once "header.php";
?>

<body>
<div class="header">
  <ul><a style="border: double; background-color: #8080804a; color: white; float: right; margin-right: 570px;margin-top:20px; font-weight: 400;"  href="ViewCompanyJob.php">Back to Company page</a></ul>
</div>
<body>
 <div class="jobdetails">
      <?php 
     
        if (isset($_GET['company_id'])) {
          foreach ($job_data as $row ) {
        echo " Title: ".$row['job_title']."</BR>
           Category: ".$row['job_category']."</BR>
           Level: ".$row['job_level']."</BR>
           No of Vacancies: ".$row['job_no']."</BR>
           Shift: ".$row['job_shift']."</BR>
           Location: ".$row['job_location']."</BR>
           Salary: ".$row['job_salary']."</BR>
           Deadline: ".$row['job_deadline']."</BR>
           Education: ".$row['job_education']."</BR>
           Experience: ".$row['job_experience']."</BR>
        ";
        echo "<a href='ViewJobDetail.php?edit_job=".$row['job_id']."'> Edit job  </a>";
        echo "<a href='ViewJobDetail.php?delete_job=".$row['job_id']."'> Delete job  </a><br><br><hr>";
        }
        }
      ?>
 </div>
 <div class="editjob">
  <!-- edit job -->
   <?php
    if (isset($_GET['edit_job'])) {
      echo "<span style='margin-left:50px;'>Edit Job details</span>";
      foreach ($job_data as $row) {
      echo "<form method='post' id='addjob'>
   Job Title <input style='margin-left: 140px;' type='text' name='job_title' value='".$row['job_title']."' required=''></br><br>
   Job Category <input style='margin-left: 105px;' type='text' name='job_category' value='".$row['job_category']."' required=''></br><br>
   Job Level <input style='margin-left: 135px;' type='text' name='job_level' value='".$row['job_level']."' required=''></br><br>
   No of vacancy <input style='margin-left: 100px;' type='number' name='job_no' value='".$row['job_no']."' required='' min='1' max='1000'></br><br>
   Job Shift <input style='margin-left: 139px;' type='text' name='job_shift' value='".$row['job_shift']."' required=''></br><br>
   Job Location <input style='margin-left: 111px;' type='text' name='job_location' value='".$row['job_location']."' required=''></br><br>
   Job Salary <input style='margin-left: 128px;' type='number' name='job_salary' value='".$row['job_salary']."' required='' min='100' max='90000000'></br><br>
   Job deadline: '".$row['job_deadline']."' <input style='margin-left: 16px;' type='date' name='job_deadline' required=''></br><br>
   Job education <input style='margin-left: 100px;' type='text' name='job_education' value='".$row['job_education']."' required></br><br>
   Job experience <input style='margin-left: 95px;' type='number' name='job_experience' value='".$row['job_experience']."' required='' min='0' max='50'></br><br>
    <input type='submit' name='updatejob' value='Update Job'>
    </form>";
  }
    }
   ?>
 </div>
</body>
</html>