<?php
include_once '../Model/ModelHome.php';
/**
* 
*/
if (isset($_GET['category'])) {
	
}
class ActionHome
{
	private $model_home,$category;
	function __construct()
	{
		$this->model_home = new ModelHome();
	}
	
	function getJobs(){
		if ($job_data = $this->model_home->getJobs()) {
			return $job_data;
		}else return false;
	}
	function getFilteredJobs($category){
		$this->jobcategory=$category;
		if ($job_data = $this->model_home->getFilterJobs($this->jobcategory)) {
			return $job_data;
		}else return false;
	}
	function category(){
		if ($data= $this->model_home->getCategory()) {
			return $data;
		}else return false;
	}
}
?>