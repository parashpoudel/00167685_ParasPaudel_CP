
<?php
include_once '../Action/ActionAdmin.php';
include_once 'Database.php';
/**
* 
*/
class ModelAdmin
{
	private  $connection,$job_id;
	function __construct()
	{
		$this->connection=new Database();
	}
	
	function getDetail(){
		
		$query_select="Select * from job j, company c where j.company_id=c.company_id and job_deadline < '".date('Y-m-d')."'";
		if ($data=$this->connection->getData($query_select)) {
			return $data;
		}else{
			return false;
		}
	}
	function deleteJob($job_id){
		$this->job_id=$job_id;
		$query="delete from job where job_id=".$this->job_id."";
		if ($data=$this->connection->IUD($query)) {
			return true;
		}else{
			return false;
		}
	}
}
?>