<?php
include('../database.php');
class Pet{ 
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
	public function fetch_data_id(){
		$db=new database();	
		$this->id=htmlspecialchars(strip_tags($this->id));
		$row=$db->num_of_rows("select * from pet where id=".$this->id);
		return $row;
		$db->connection_close();
	}
	
	public function create(){
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->photoUrls=htmlspecialchars(strip_tags($this->photoUrls));
		$this->category_id=htmlspecialchars(strip_tags($this->category_id));
		$this->category_name=htmlspecialchars(strip_tags($this->category_name));
		$this->tags_id=htmlspecialchars(strip_tags($this->tag_id));
		$this->tag_name=htmlspecialchars(strip_tags($this->tag_name));
		$this->status=htmlspecialchars(strip_tags($this->status));
		$db=new database();		
		$category_insert_Query="insert into category (id,name) values ('".$this->category_id."','".$this->category_name."') ";
		$tag_insert_Query="insert into tags (id,name) values ('".$this->tag_id."','".$this->tag_name."') ";
		$pet_insert_Query="insert into pet (id,category,name,photoUrls,tags,status) values ('','".$this->category_id."','".$this->name."','".$this->photoUrls."','".$this->tag_id."','".$this->status."')";
		$db->query_run($category_insert_Query);
		$db->query_run($tag_insert_Query);
		return $db->query_run($pet_insert_Query);
		//$db->connection_close();
	}
	public function update(){
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->id=htmlspecialchars(strip_tags($this->id));
		$this->photoUrls=htmlspecialchars(strip_tags($this->photoUrls));
		$this->category_id=htmlspecialchars(strip_tags($this->category_id));
		$this->category_name=htmlspecialchars(strip_tags($this->category_name));
		$this->tags_id=htmlspecialchars(strip_tags($this->tag_id));
		$this->tag_name=htmlspecialchars(strip_tags($this->tag_name));
		$this->status=htmlspecialchars(strip_tags($this->status));
		$db=new database();		
		$category_update_Query="update category set name='".$this->category_name."' where id=".$this->category_id;
		$tag_update_Query="update tags set name='".$this->tag_name."' where id=".$this->tag_id;
		$pet_update_Query="update pet set name='".$this->name."',photoUrls='".$this->photoUrls."',tags='".$this->tag_id."',category='".$this->category_id."',
		status='".$this->status."' where id=".$this->id;
		$db->query_run($category_update_Query);
		$db->query_run($tag_update_Query);
		return $db->query_run($pet_update_Query);
		$db->connection_close();
	}
	
	public function find_by_status($query){
		$db=new database();	
		$result=$db->fetchAllRows($query);
		return $result;
	}
	
	public function find_pet_by_id($id){
		$db=new database();	
		$result=$db->fetchAllRows("select * from pet where id=$id");
		//print_r($result);exit;
		if(isset($result)){
			$category_val=$db->fetchAllRows("select * from category where id=".$result[0]->id);
			$tag_val=$db->fetchAllRows("select * from tags where id=".$result[0]->id);
			$Val=array("id"=>$result[0]->id,"category"=>$category_val,"name"=>$result[0]->name,"photoUrls"=>$result[0]->photoUrls,"tags"=>$tag_val,"status"=>$result[0]->status);
			$return =$Val;
		}else{
			$return = 0;
		}		
		return $return;
	}
	
	public function update_pet_by_id($id,$pet_name,$pet_status){
		$db=new database();
		$result=$db->fetchAllRows("select * from pet where id=$id");
		if(isset($result)){
			if($pet_name!="" || $pet_status!=""){
				if($pet_name!=""){
					$pet_update_Query="update pet set name='".$pet_name."'  where id=".$id;
					$db->query_run($pet_update_Query);
				}
				if($pet_status!=""){
					$pet_status_Query="update pet set status='".$pet_status."'  where id=".$id;
					$db->query_run($pet_status_Query);
				}
				return 1;
				
			}else{
				return 2;
			}
		}else{
			return 3;
		}
	}
	
	public function delete_pet_by_id($id){
		$db=new database();
		$result=$db->fetchAllRows("select * from pet where id=$id");
		if(isset($result)){
			$category_val=$db->query_run("delete from pet where id=".$result[0]->id);
			return 1;
		}else{
			return 2;
		}
	}
}
?>