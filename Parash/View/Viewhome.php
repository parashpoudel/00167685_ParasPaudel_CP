<?php
session_start();

if (isset($_SESSION['login_admin'])) {
  header('location: Viewadmin.php');
}elseif (isset($_SESSION['login_employer'])) {
  header('location: ViewCompanyJob.php');
}elseif (!isset($_SESSION['login_user'])) {
  header('location: Viewlogin.php');
}
include_once '../Action/Actionhome.php';
$action_home = new ActionHome();
// if (isset($_GET['category'])) {
  
//   $category = $action_home->getFilteredJobs($category);
// } 

$category = $action_home->category();
include_once "header.php";
?>
<span style="font-style: oblique; font-size: 40px;  ">Search for Job</span><br>
<header>
  <ul><a style="float: right;  margin-right: 40px; color: white; border: double; background-color: #8080804a;" href="logout.php">Log out</a></ul>
</header>
<div style="float: right; margin-top: -60px; margin-right: 180px;"  class="header">
  <label style="font-weight: 700;">Filter By:</label>
<form action="Viewhome.php" method="get">
<?php
  echo '<select name="category">'; 
  foreach ($category as $row) {
   echo '<option value="'.$row['job_category'].'">'.$row['job_category'].'</option>';
}
  echo '</select>';
?><input type="submit" value="Filter">
<a href="Viewhome.php">Remove Filter</a>

</div>

<div class="jobs">
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
        echo "<a style='color: white; ' href='ViewApplyJob.php?company_id=$company_id&job_id=$job_id'>APPLY NOW</a><HR>";

      }
    
  ?>
</div>
  
</body>
</html>