<?php
include_once '../Action/ActionAddCompany.php';
include_once 'Database.php';
/**
* 
*/
class ModelAddCompany
{
	private $db,$company_name,$company_email,$company_desc;
	function __construct()
	{
		$this->db=new Database();
	}
	public function setCompanyName($company_name){
		$this->company_name=$company_name;
	}
	public function getCompanyName(){
		return $this->company_name;
	}
	public function setCompanyEmail($company_email){
		$this->company_email=$company_email;
	}
	public function getCompanyEmail(){
		return $this->company_email;
	}
	
	public function setCompanyDesc($company_desc){
		$this->company_desc=$company_desc;
	}
	public function getCompanyDesc(){
		return $this->company_desc;
	}
	
	public function registerCompany(){
		$registerusersql="insert into company(company_name,company_email,company_desc,username,user_id) values('".$this->getCompanyName()."','".$this->getCompanyEmail()."','".$this->getcompanyDesc()."','".$_SESSION['login_employer']."','".$_SESSION['user_id']."')";
		if ($this->db->IUD($registerusersql)) {
			return true;	
		}else{
			echo "Sorry";
		}
	}
}
?>