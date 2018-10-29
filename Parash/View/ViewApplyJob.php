<?php

session_start();
if (isset($_SESSION['login_admin'])) {
  header('location: Viewadmin.php');
}elseif (isset($_SESSION['login_employer'])) {
  header('location: ViewCompanyJob.php');
}elseif (!isset($_SESSION['login_user'])) {
  header('location: Viewlogin.php');
}
require_once '../Action/ActionApplyJob.php';

 $action_applyjob=new ActionApplyJob();
 if (isset($_GET['company_id']) and $_GET['job_id']) {
   $data = $action_applyjob->getData();
   $jobData = $action_applyjob->getJobDesc();
   $companyData = $action_applyjob->getComment();
   $rate = $action_applyjob->getRate();
   foreach ($rate as $row ) {
      $companyRating = $row['rate'];
   }
 }
if (isset($_POST['rating'])) {
  $action_applyjob->rate();
}
if (isset($_POST['commentButton'])) {
  $action_applyjob->comment();
}

include_once "header.php";
?>

<div class="header">
  <ul><a href="ViewHome.php">View All Jobs</a></ul>
  <ul><a href="logout.php">Log out</a></ul>
</div>



 </html> 
 <div>
  <h3>Company  details</h3>
   <?php 
      // show error if empty
        foreach ($data as $row ) {
        echo " Company Name: ".$company_name = $row['company_name']."</BR>";
        echo " Company Email: ".$company_email = $row['company_email']."</BR>";
        echo " Company Description: ".$company_desc = $row['company_desc']."</BR>";
        echo " Job Title: ".$job_title = $row['job_title']."</BR>";
        echo " Job Category: ".$job_category = $row['job_category']."</BR>";
        echo " Job Level: ".$job_level = $row['job_level']."</BR>";
        echo " Job No: ".$job_no = $row['job_no']."</BR>";
        echo " Job Shift: ".$job_shift = $row['job_shift']."</BR>";
        echo " Job Location: ".$job_location = $row['job_location']."</BR>";
        echo " Job Salary: ".$job_salary = $row['job_salary']."</BR>";
        echo " Job Deadline: ".$job_deadline = $row['job_deadline']."</BR>";
        echo " Job Education: ".$job_education = $row['job_education']."</BR>";
        echo " Job Upload Date: ".$job_uploaddate = $row['job_upload_date']."</BR>";
        echo " Job Experience: ".$job_ = $row['job_experience']."</BR>";
        }
      ?>
 </div>
  <div>
  <h3>Job details</h3>
   <?php 
   echo "Job description<hr>";
      // show error if emptys
        foreach ($jobData as $row ) {
        echo $job_desc = $row['job_desc']."</BR>";
        }
        echo "</br>Other specification<hr>";
        foreach ($jobData as $row ) {
        echo $job_desc = $row['job_other_spec']."</BR>";
        }

        echo "</br>Company benefit<hr>";
        foreach ($jobData as $row ) {
        echo $job_desc = $row['company_benefit']."</BR>";
        }

      ?>
 </div>
 <h3>Apply Job</h3>
 <div id="applyjob">
   <form  method="post" enctype="multipart/form-data">
    CV &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="file" name="cv" required=""></BR>
    Cover letter <input type="file" name="coverletter" required=""></BR>
    <input type="submit" name="applyjob" value="Apply Job" >
  </form>
 </div>

  <div id="commentandrate" style="margin: 50px; float: left; border: 1px solid black; padding: 20px">
   <form  method="post">
    Comment on company <input type="text" name="comment"></BR>
    <input type="submit" name="commentButton" value="Comment" >
  </form>
 </div>
 <div id="rating" style="float: left; border: 1px solid black">
  <form method="post">
  <button style="border: none;" type="submit" name="rating" value="1"><img src="../Images/1.png" height="30" /></button>
  <button style="border: none;" type="submit" name="rating" value="2"><img src="../Images/2.png" height="30" /></button>
  <button style="border: none;" type="submit" name="rating" value="3"><img src="../Images/3.png" height="30" /></button>
  <button style="border: none;" type="submit" name="rating" value="4"><img src="../Images/4.png" height="30" /></button>
  <button style="border: none;" type="submit" name="rating" value="5"><img src="../Images/5.png" height="30" /></button>
  </form>
 </div>
<div id="review" style="clear: both; float: left; ">
  <h3>Company  comments</h3>

   <?php 
      // show error if empty
        foreach ($companyData as $row ) {
        echo "  Comment by ".$row['username'];
        echo ": ".$row['comment']."</BR>";
        }
      ?>
 </div>
 <div id="rate" style="float: left;">
    
     <?php
     if ($companyRating==1) {
       $emoji="1.png";
     }elseif ($companyRating <= 2 and $companyRating >= 1) {
       $emoji="2.png";
     }elseif ($companyRating <= 3 and $companyRating >= 2) {
       $emoji="3.png";
     }elseif ($companyRating <= 4 and $companyRating >= 3) {
       $emoji="4.png";
     }elseif ($companyRating <= 5 and $companyRating >= 4) {
       $emoji="5.png";
     }
     echo " <h3>Company  rating <img src='../Images/$emoji' height='30'></h3>";
     ?>

  </div>
</body>
</html>