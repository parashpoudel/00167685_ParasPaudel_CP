<?php
include_once '../Model/ModelAddCompany.php';
/**
* 
*/
class ActionAddCompany
{
	private $model_addcompany,$company_name,$company_email,$company_desc;
	function __construct()
	{
		$this->model_addcompany=new ModelAddCompany();
	}
	
	public function invoke(){
		 $this->model_addcompany->setCompanyName($_POST['company_name']);
		 $this->model_addcompany->setCompanyEmail($_POST['company_email']);
		 $this->model_addcompany->setCompanyDesc($_POST['company_desc']);

		// }elseif($this->model_addcompany->getRegisteredUsername()){
		// 	echo "Username already exits";
		// }
		if ($this->model_addcompany->registerCompany()) {
			header('location: ViewCompanyJob.php');
		}
		
	}
}


?>