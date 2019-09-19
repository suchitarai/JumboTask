<?php
include('../database.php');
class store{
	  // database connection and table name
    private $conn;
    private $table_name = "pet";
 
    // object properties
    public $id;
    public $name;
    public $category;
    public $photoUrls;
    public $tags;
    public $status;
    public $created;
 
    // constructor with $db as database connection
    public function __construct(){
    }
	public function create(){
		$this->petId=htmlspecialchars(strip_tags($this->petId));
		$this->quantity=htmlspecialchars(strip_tags($this->quantity));
		$this->shipDate=htmlspecialchars(strip_tags($this->shipDate));
		$this->status=htmlspecialchars(strip_tags($this->status));
		$this->complete=htmlspecialchars(strip_tags($this->complete));
		$db=new database();		
		$pet_order_insert_Query="insert into pet_order (id,petId,quantity,shipDate,status,complete) values ('".$this->id."','".$this->petId."','".$this->quantity."','".$this->shipDate."','".$this->status."','".$this->complete."')";
		return $db->query_run($pet_order_insert_Query);
		
	}
}
?>