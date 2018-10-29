<?php
include '../Model/ModelCompanyJob.php';
/**
* 
*/
class ActionCompanyJob
{
	private $model_companyJob;
	function __construct()
	{
		$this->model_companyJob = new ModelCompanyJob();
	}
	function getCompany(){
		if ($data=$this->model_companyJob->searchCompany()) {
			return $data;
		}
	}
	function addJob(){
		 $this->model_companyJob->setJobTitle($_POST['job_title']);
		 $this->model_companyJob->setJobCategory($_POST['job_category']);
		 $this->model_companyJob->setJobLevel($_POST['job_level']);
		 $this->model_companyJob->setJobNo($_POST['job_no']);
		 $this->model_companyJob->setJobShift($_POST['job_shift']);
		 $this->model_companyJob->setJobLocation($_POST['job_location']);
		 $this->model_companyJob->setJobSalary($_POST['job_salary']);
		 $this->model_companyJob->setJobDeadline($_POST['job_deadline']);
		 $this->model_companyJob->setJobEducation($_POST['job_education']);
		 $this->model_companyJob->setJobExperience($_POST['job_experience']);
		 $this->model_companyJob->setCompanyId($_GET['company_id']);
		if($this->model_companyJob->registerJob()) {
			echo "Job added";
			header('location: ViewCompanyJob.php');
		}
	}
	// function updateJob(){
	// 	 $this->model_companyJob->setJobTitle($_POST['job_title']);
	// 	 $this->model_companyJob->setJobCategory($_POST['job_category']);
	// 	 $this->model_companyJob->setJobLevel($_POST['job_level']);
	// 	 $this->model_companyJob->setJobNo($_POST['job_no']);
	// 	 $this->model_companyJob->setJobShift($_POST['job_shift']);
	// 	 $this->model_companyJob->setJobLocation($_POST['job_location']);
	// 	 $this->model_companyJob->setJobSalary($_POST['job_salary']);
	// 	 $this->model_companyJob->setJobDeadline($_POST['job_deadline']);
	// 	 $this->model_companyJob->setJobEducation($_POST['job_education']);
	// 	 $this->model_companyJob->setJobExperience($_POST['job_experience']);
	// 	 $this->model_companyJob->setCompanyId($_GET['company_id']);
	// 	if($this->model_companyJob->updateJob()) {
	// 		echo "Job updated";
	// 		// header('location: ViewCompanyJob.php');
	// 	}
	// }
}


?>