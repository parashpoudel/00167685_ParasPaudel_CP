<?php
include '../Model/ModelApplyJob.php';
/**
* 
*/
class ActionApplyJob
{
	private $model_applyjob,$job_id;
	function __construct()
	{
		$this->model_applyjob = new ModelApplyJob();
	}
	function comment(){
		$this->model_applyjob->setCompanyId($_GET['company_id']);
		$this->model_applyjob->setComment($_POST['comment']);
		if ($this->model_applyjob->commentCompany()) {
			header("Refresh:0");
		}
	}	
	function rate(){
		$this->model_applyjob->setCompanyId($_GET['company_id']);
		$this->model_applyjob->setRating($_POST['rating']);
		if ($this->model_applyjob->rateCompany()) {
			echo "Happy to see your feedback";
		}
	}

	function getComment(){
		$this->model_applyjob->setCompanyId($_GET['company_id']);
		if ($CompanyData = $this->model_applyjob->getCompanyComment()) {
			return $CompanyData;
		}
	}
	function getRate(){
		$this->model_applyjob->setCompanyId($_GET['company_id']);
		if ($rate = $this->model_applyjob->getCompanyRating()) {
			return $rate;
		}
	}	
	function getData(){
		$this->model_applyjob->setCompanyId($_GET['company_id']);
		$this->model_applyjob->setJobId($_GET['job_id']);
		if ($data=$this->model_applyjob->getDetails()) {
			return $data;
		}
		if ($JobData=$this->model_applyjob->getJobDesc()) {
			return $JobData;
		}
	}
	function getJobDesc(){
		$this->model_applyjob->setJobId($_GET['job_id']);
		if ($JobData=$this->model_applyjob->getJobDesc()) {
			return $JobData;
		}
	}		
}
?>