<?php
error_reporting(0);
class database
{
	public $conn;

	public function __construct(){
		define("HOST",'localhost');
		define("ROOT",'root');
		define("PASS",'');
		define("DATABASE",'jumbo');
		$this->conn  = mysqli_connect(HOST, ROOT, PASS, DATABASE);
	}	
	
	public function fetchAllRows($query){
		$queryval = mysqli_query($this->conn,$query);
		while ($record = mysqli_fetch_object($queryval)){
         $result[] = $record;
		}
		return $result;
	}
	public function fetchAllRowsArr($query){
		$queryval = mysqli_query($this->conn,$query);
		while ($record = mysqli_fetch_array($queryval)){
         $result[] = $record;
		}
		return $result;
	}
	public function num_of_rows($query){
		$result = mysqli_query($this->conn,$query);
		return mysqli_num_rows($result);
	}
	public function query_run($query){
		$result=mysqli_query($this->conn,$query);
		return mysqli_affected_rows($this->conn);
	}
	public function connection_close(){
		mysqli_close($this->conn);
	}
	
}
?>