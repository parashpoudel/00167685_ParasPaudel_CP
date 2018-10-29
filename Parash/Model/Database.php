<?php
/**
* 
*/

class Database
{
	private $connection;
	private $localhost;
	private $user_name;
	private $password;
	private $databaseName;
	
	public function __construct()
	{
		$this->localhost='localhost';
		$this->user_name='root';
		$this->password='';
		$this->databaseName='Job_Portal';
		$this->dbConnection();
	}
	public function dbConnection()
	{
		$this->connection=null;

		$this->connection = new mysqli($this->localhost, $this->user_name, $this->password, $this->databaseName);
		if($this->connection->connect_error){
			die("connection failed : ".$this->connection->connect_error);
		}
		return $this->connection;
	}
	
	function IUD($sql){


			// else this can be done using calling in this function as well 
			// $this->getConnection();

			if($this->connection->query($sql) == false ){
				return false;
				// die("Error : " .$this->connection->error);
			}
			return $this->connection;
		}


		function getData($sql){
			$data = [];
			$result = $this->connection->query($sql);
			if($result->num_rows > 0){
				while ($rows = $result->fetch_assoc()) {
					# code...
					$data[] = $rows;
				}

			}else{
				return false;
			}
			return $data;
		}
		
}

?>