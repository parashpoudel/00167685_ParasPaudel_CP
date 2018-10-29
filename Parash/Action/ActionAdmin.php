<?php
include '../Model/ModelAdmin.php';
/**
* 
*/
class ActionAdmin
{
	private $model_admin,$job_id;
	function __construct()
	{
		$this->model_admin = new ModelAdmin();
	}
	function getJobData(){
		if ($data=$this->model_admin->getDetail()) {
			return $data;
		}
	}
	function delete($job_id){
		$this->job_id=$job_id;
		if ($this->model_admin->deleteJob($this->job_id)) {
			return true;
		}else return false;
	}

	
}


?>