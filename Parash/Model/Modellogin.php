<?php
include_once '../Action/ActionLogin.php';
include_once 'Database.php';
/**
* 
*/
class ModelLogin
{
	private  $connection,$user_name,$password;
	function __construct()
	{

		$this->connection=new Database();
	}
	public function setUsername($user_name){
		$this->user_name=$user_name;
	}
	public function getUsername(){
		return $this->user_name;
	}
	public function setPassword($password){
		$this->password=$password;
	}
	public function getPassword(){
		return $this->password;
	}
	public function login(){
		$username=$this->getUsername();
		$password=$this->getPassword();
		$sql_login="select * from user where username='$username' and password='$password'";
		if($result_login=$this->connection->getData($sql_login)){
			foreach ($result_login as $row) {
					if ($row['role']=='admin') { 
						$_SESSION['user_id']=$row['user_id'];
						$_SESSION['login_admin']=$row['username'];
						header('location: Viewadmin.php');
					}elseif($row['role']=='user') {
						$_SESSION['user_id']=$row['user_id'];
						$_SESSION['login_user']=$row['username'];
						header('location: Viewhome.php');
					}elseif($row['role']=='employer'){
						$_SESSION['user_id']=$row['user_id'];
						$_SESSION['login_employer']=$row['username'];
						header('location: ViewCompanyJob.php');
					}	
			}
				
		}else return false;
	}
	
}
?>