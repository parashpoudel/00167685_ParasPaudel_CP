
<?php
include_once '../Action/ActionCompanyJob.php';
include_once 'Database.php';
/**
* 
*/
class ModelCompanyJob
{
	private  $connection;
	function __construct()
	{
		$this->connection=new Database();
	}

	public function setJobTitle($job_title){
		$this->job_title=$job_title;
	}
	public function getJobTitle(){
		return $this->job_title;
	}
	public function setJobCategory($job_category){
		$this->job_category=$job_category;
	}
	public function getJobCategory(){
		return $this->job_category;
	}
	public function setJobLevel($job_level){
		$this->job_level=$job_level;
	}
	public function getJobLevel(){
		return $this->job_level;
	}
	public function setJobNo($job_no){
		$this->job_no=$job_no;
	}
	public function getJobNo(){
		return $this->job_no;
	}
	public function setJobShift($job_shift){
		$this->job_shift=$job_shift;
	}
	public function getJobShift(){
		return $this->job_shift;
	}
	public function setJobLocation($job_location){
		$this->job_location=$job_location;
	}
	public function getJobLocation(){
		return $this->job_location;
	}
	public function setJobSalary($job_salary){
		$this->job_salary=$job_salary;
	}
	public function getJobSalary(){
		return $this->job_salary;
	}
	public function setJobDeadline($job_deadline){
		$this->job_deadline=$job_deadline;
	}
	public function getJobDeadline(){
		return $this->job_deadline;
	}
	public function setJobEducation($job_education){
		$this->job_education=$job_education;
	}
	public function getJobEducation(){
		return $this->job_education;
	}
	public function setJobExperience($job_experience){
		$this->job_experience=$job_experience;
	}
	public function getJobExperience(){
		return $this->job_experience;
	}
	public function setCompanyId($company_id){
		$this->company_id=$company_id;
	}
	public function getCompanyId(){
		return $this->company_id;
	}
	
	function searchCompany(){
		$query_select="select * from company where username='".$_SESSION['login_employer']."'";
		if ($company_data=$this->connection->getData($query_select)) {
			return $company_data;
		}else{
			return false;
		}
	}
	function registerJob(){
		
		$query_select="insert into job(company_id,job_title,job_category,job_level,job_no,job_shift,job_location,job_salary,job_deadline,job_education,job_experience) values(".$this->getCompanyId().",'".$this->getJobTitle()."','".$this->getJobCategory()."','".$this->getJobLevel()."',".$this->getJobNo().",'".$this->getJobShift()."','".$this->getJobLocation()."',".$this->getJobSalary().",'".$this->getJobDeadline()."','".$this->getJobEducation()."',".$this->getJobExperience().")";
		if ($result=$this->connection->IUD($query_select)) {
			return true;
		}else{
			return false;
		}
	}
	// function updateJob(){
		
	// 	$query_select="update job set job_title = '".$this->getJobTitle()."',job_category = '".$this->getJobCategory()."',job_level = '".$this->getJobLevel()."',job_no = ".$this->getJobNo().",job_shift = '".$this->getJobShift()."',job_location = '".$this->getJobLocation()."',job_salary = ".$this->getJobSalary().",job_deadline = '".$this->getJobDeadline()."',job_education = '".$this->getJobEducation()."',job_experience = ".$this->getJobExperience()." where company_id = ".$this->getCompanyId();
	// 	if ($result=$this->connection->IUD($query_select)) {
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

	
}
?>