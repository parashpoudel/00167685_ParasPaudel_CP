<?php
include_once '../Action/ActionHome.php';
include_once 'Database.php';
/**
* 
*/
class ModelHome
{
	private  $connection;
	function __construct()
	{

		$this->connection=new Database();
	}
	public function getJobs(){
		$sql="select * from job j, company c where j.company_id=c.company_id";
		if($job_data = $this->connection->getData($sql)){
			return $job_data;				
		}else return false;
	}
	public function getFilterJobs($category){
		$sql="select * from job j, company c where j.company_id=c.company_id and job_category='$category'";
		if($job_data = $this->connection->getData($sql)){
			return $job_data;				
		}else return false;
	}
	public function getCategory(){
		$sql="select job_category from job ";
		if($category_data = $this->connection->getData($sql)){
			return $category_data;				
		}else return false;
	}
	
}
?>