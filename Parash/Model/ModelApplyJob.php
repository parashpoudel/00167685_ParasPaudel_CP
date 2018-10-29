
<?php
include_once '../Action/ActionApplyJob.php';
include_once 'Database.php';
/**
* 
*/
class ModelApplyJob
{
	private  $connection,$job_id,$company_id,$comment,$rating;
	function __construct()
	{
		$this->connection=new Database();
	}
	public function setCompanyId($company_id){
		$this->company_id=$company_id;
	}
	public function getCompanyId(){
		return $this->company_id;
	}
	public function setComment($comment){
		$this->comment=$comment;
	}
	public function getComment(){
		return $this->comment;
	}
	public function setJobId($job_id){
		$this->job_id=$job_id;
	}
	public function getJobId(){
		return $this->job_id;
	}	
	public function setRating($rating){
		$this->rating=$rating;
	}
	public function getRating(){
		return $this->rating;
	}
	function getDetails(){
		
		$query_select="Select * from company c, job j where j.company_id=c.company_id and j.job_id=".$this->getJobId()." and c.company_id=".$this->getCompanyId();
		if ($data=$this->connection->getData($query_select)) {
			return $data;
		}else{
			return false;
		}
	}
	function getCompanyComment(){
		
		$query_select="Select * from review r, user u where r.user_id=u.user_id";
		if ($data=$this->connection->getData($query_select)) {
			return $data;
		}else{
			return false;
		}
	}
	function getCompanyRating(){
		
		$query_select="Select avg(rating) as rate from rate where company_id=".$this->getCompanyId();
		if ($data=$this->connection->getData($query_select)) {
			return $data;
		}else{
			return false;
		}
	}	
	function rateCompany(){
		
		$query="INSERT INTO RATE(COMPANY_ID,RATING,USER_ID) VALUES(".$this->getCompanyId().",'".$this->getRating()."',".$_SESSION['user_id'].")";
		if ($this->connection->IUD($query)) {
			return true;
		}else{
			return false;
		}
	}

	function getJobDesc(){
		
		$query_select="Select * from job_desc where job_id=".$this->getJobId();
		if ($data=$this->connection->getData($query_select)) {
			return $data;
		}else{
			return false;
		}
	}
	function commentCompany(){
		$query="INSERT INTO REVIEW(COMPANY_ID,COMMENT,USER_ID) VALUES(".$this->getCompanyId().",'".$this->getComment()."',".$_SESSION['user_id'].")";
		if ($this->connection->IUD($query)) {
			return true;
		}else{
			return false;
		}
	}
}
?>