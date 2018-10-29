<?php
include_once '../Model/Modelregister.php';
/**
* 
*/
class ActionRegister
{
	private $model_register,$username,$password,$email,$gender,$address,$postalCode,$phoneNumber;
	function __construct()
	{
		$this->model_register=new ModelRegister();
	}
	
	public function invoke(){
		 $this->model_register->setUsername($_POST['user_name']);
		 $this->model_register->setPassword($_POST['password']);
		 $this->model_register->setEmail($_POST['email']);
		 $this->model_register->setGender($_POST['gender']);
		 $this->model_register->setAddress($_POST['address']);
		 $this->model_register->setPostalCode($_POST['postalCode']);
		 $this->model_register->setPhoneNumber($_POST['phoneNumber']);

		if ($_POST['password']!==$_POST['confirmPassword']) {
				echo "Password do not match";
			}
		// }elseif($this->model_register->getRegisteredUsername()){
		// 	echo "Username already exits";
		// }
		elseif ($this->model_register->registerUser()) {
			header('location: Viewlogin.php');
		}
		
	}
}


?>