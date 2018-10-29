<?php
include_once '../Model/Modellogin.php';
/**
* 
*/
class ActionLogin
{
	private $model_login;
	function __construct()
	{
		$this->model_login = new ModelLogin();
	}
	
	public function invoke(){
		
		$this->model_login->setUsername($_POST['username']);
		$this->model_login->setPassword($_POST['password']);
		if (!$this->model_login->login()) {
			echo "Username and password donot match";
		}
	}
}
?>