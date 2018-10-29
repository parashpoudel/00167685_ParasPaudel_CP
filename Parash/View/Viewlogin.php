<?php

session_start();
if (isset($_SESSION['login_user'])) {
  header('location: Viewhome.php');
}elseif (isset($_SESSION['login_admin'])) {
  header('location: Viewadmin.php');
}elseif (isset($_SESSION['login_employer'])) {
  header('location: ViewCompanyJob.php');
}
require_once '../Action/Actionlogin.php';
include_once '../Action/Actionhome.php';
$action_home = new ActionHome();
 $action_login=new ActionLogin();
$category = $action_home->category();

if (isset($_GET['login'])=='true') {
  echo "<script type='text/javascript'>alert('Please login to continue');</script>";

}

if (isset($_POST['login'])) {
$data = $action_login->invoke();
echo $data;
}
include_once "header.php";
?>
<body style="background-image: url(../images/bg.jpg);">

<div  style="float: right; margin: 50px; background-color: #8080804a;">

  <ul><a  href="Viewregister.php">Register</a></ul>
  <ul><a href="ViewEmployeregister.php">Register as Employer</a></ul>

</div>


<div style="float: left; margin: 50px; border: double; background-color: #8080804a;">
 
  <form style="padding: 20px;" class="room" method="post" action="">
    <span style="font-style: oblique; font-size: 40px; ">Login</span><br>
   <label style="font-weight: 400;">Username </label> <input  style="margin-left: 12px;" class="textfield" type="name" name="username" placeholder="Username" required=""><br>
    <label style="font-weight: 400">Password  </label><input style="margin-left: 20px;" class="textfield" type="password" name="password" placeholder="Password" required=""><br>
    <input class="but" type="submit" name="login" value="Log in" >
   
  </form>

</div>
<div class="job" >
  <span style="font-style: oblique; font-size: 40px; margin-left: 150px;  ">Jobs</span><br>
  <?php
    if (isset($_GET['category'])) {
      $category=$_GET['category'];
      $jobs = $action_home->getFilteredJobs($category);
    }else{
      $jobs = $action_home->getJobs($category);
    }
      foreach ($jobs as $row) {
        $company_id = $row['company_id'];
        $job_id = $row['job_id'];
        echo "Organization: ".$row['company_name']."</BR>";
        echo "Job title: ".$row['job_title']."</BR>";
        echo "Location: ".$row['job_location']."</BR>";
        echo "<a style='font-weight: 400; color: white;' href='Viewlogin.php?login=true'>APPLY NOW</a><BR><BR>";

      }
    
  ?>
</div>

</body>
</html>