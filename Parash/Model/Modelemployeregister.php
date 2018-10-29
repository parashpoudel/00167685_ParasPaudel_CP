<?php
include_once '../Action/Actionemployeregister.php';
include_once 'Database.php';
/**
* 
*/
class ModelemployerRegister
{
	private $db, $username,$password,$email,$gender,$address,$postalCode,$phoneNumber;
	function __construct()
	{
		$this->db=new Database();
	}
	public function setUsername($username){
		$this->username=$username;
	}
	public function getUsername(){
		return $this->username;
	}
	public function setPassword($password){
		$this->password=$password;
	}
	public function getPassword(){
		return $this->password;
	}
	public function setEmail($email){
		$this->email=$email;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setGender($gender){
		$this->gender=$gender;
	}
	public function getGender(){
		return $this->gender;
	}
	public function setAddress($address){
		$this->address=$address;
	}
	public function getAddress(){
		return $this->address;
	}
	public function setPostalCode($postalCode){
		$this->postalCode=$postalCode;
	}
	public function getPostalCode(){
		return $this->postalCode;
	}
	public function setPhoneNumber($phoneNumber){
		$this->phoneNumber=$phoneNumber;
	}
	public function getPhoneNumber(){
		return $this->phoneNumber;
	}
	public function getRegisteredUsername(){
		$username_sql="select * from user where username='".$this->getUsername()."'";
		if ($usernamedata=$this->db->IUD($username_sql)) {
			if (isset($usernamedata) && count($usernamedata) > 0) {
				return true;
			}
			
		}else return false;
	}
	public function registerUser(){
		$registerusersql="insert into user(username,email,password,gender,address,postalCode,phoneNumber,role) values('".$this->getUsername()."','".$this->getEmail()."','".$this->getPassword()."','".$this->getGender()."','".$this->getAddress()."','".$this->getPostalCode()."','".$this->getPhoneNumber()."','employer')";
		if ($this->db->IUD($registerusersql)) {
			$_SESSION['login_employer']=$this->getUsername();
			echo "Registerd";
			header('location: ViewAddCompany.php');
		}else{
			echo "Sorry";
		}
	}
}
?>