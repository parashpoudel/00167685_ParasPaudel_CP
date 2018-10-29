<?php
include '../Model/ModelJobDetail.php';
/**
* 
*/
class ActionJobDetail
{
	private $model_jobdetail;
	function __construct()
	{
		$this->model_jobdetail = new ModelJobDetail();
	}
	function getJobData($company_edit){
		if ($data=$this->model_jobdetail->getDetail()) {
			return $data;
		}
	}

	function getSpecificJobData($job_id){
		if ($data=$this->model_jobdetail->getJobDetail()) {
			return $data;
		}
	}
	function delete($job_id){
		if ($this->model_jobdetail->deleteJob()) {
			return true;
		}
	}
	function updateJob(){
		 $this->model_jobdetail->setJobTitle($_POST['job_title']);
		 $this->model_jobdetail->setJobCategory($_POST['job_category']);
		 $this->model_jobdetail->setJobLevel($_POST['job_level']);
		 $this->model_jobdetail->setJobNo($_POST['job_no']);
		 $this->model_jobdetail->setJobShift($_POST['job_shift']);
		 $this->model_jobdetail->setJobLocation($_POST['job_location']);
		 $this->model_jobdetail->setJobSalary($_POST['job_salary']);
		 $this->model_jobdetail->setJobDeadline($_POST['job_deadline']);
		 $this->model_jobdetail->setJobEducation($_POST['job_education']);
		 $this->model_jobdetail->setJobExperience($_POST['job_experience']);
		if($this->model_jobdetail->updateJob()) {
			echo "Job updated";
			// header('location: ViewCompanyJob.php');
		}
	}
}


?>