<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// instantiate pet object
include_once 'pet.php'; 
$pet = new pet();
/*+++++++++++++++++++STart: Add New Pet+++++++++++++++++++*/
if(isset($_REQUEST['type']) && $_REQUEST['type']=='add_new_pet'){
	// get posted data
	$data = json_decode($_POST['body']);

	// make sure data is not empty
	if(
		!empty($data->name) &&
		!empty($data->photoUrls) &&
		!empty($data->category->id) &&
		!empty($data->tags[0]->id)
	){
	 
		// set pet property values
		$pet->name = $data->name;
		$pet->photoUrls = $data->photoUrls[0];
		$pet->category_id = $data->category->id;    
		$pet->category_name = $data->category->name;
		$pet->status = $data->status;
		$pet->tag_id=$data->tags[0]->id;
		$pet->tag_name=$data->tags[0]->name;
		$pet->created = date('Y-m-d H:i:s');
	// print $pet->status.'---------'.$pet->photoUrls;exit;
		// create the pet
		if($pet->create()){
	 
			// set response code - 201 created
			http_response_code(201);
	 
			// tell the user
			echo json_encode(array("message" => "pet was created."));
		} 
		// if unable to create the pet, tell the user
		else{
	 
			// set response code - 503 service unavailable
			http_response_code(503);
	 
			// tell the user
			echo json_encode(array("message" => "Unable to create pet."));
		}
	} 
	// tell the user data is incomplete
	else{
	 
		// set response code - 400 bad request
		http_response_code(400);
	 
		// tell the user
		echo json_encode(array("message" => "Unable to create pet. Data is incomplete."));
	}
}


/*+++++++++++++++++++STart: put_update_existing_pet+++++++++++++++++++*/
if(isset($_REQUEST['type']) && $_REQUEST['type']=='put_update_existing_pet'){
	$data = json_decode($_POST['body']);
	// make sure data is not empty
	if(
		!empty($data->name) &&
		!empty($data->photoUrls) &&
		!empty($data->category->id) &&
		!empty($data->tags[0]->id) && 
		!empty($data->id)
	){ 
		// set pet property values
		$pet->id=$data->id;
		$pet->name = $data->name;
		$pet->id = $data->id;
		$pet->photoUrls = $data->photoUrls[0];
		$pet->category_id = $data->category->id;    
		$pet->category_name = $data->category->name;
		$pet->status = $data->status;
		$pet->tag_id=$data->tags[0]->id;
		$pet->tag_name=$data->tags[0]->name;
		$pet->created = date('Y-m-d H:i:s');
		if($pet->fetch_data_id()){
			if($pet->update()){ 
				// set response code - 201 created
				http_response_code(201); 
				// tell the user
				echo json_encode(array("message" => "pet was updated."));
			} 
			// if unable to create the pet, tell the user
			else{ 
				// set response code - 404 service unavailable
				http_response_code(404); 
				// tell the user
				echo json_encode(array("message" => "pet not found."));    
			}
		}else{
			 // set response code - 400 bad request
			http_response_code(400);
			echo json_encode(array("message"=> "Invalid ID supplied."));
		}
		
	} 
	// tell the user data is incomplete
	else{
		// set response code - 405 bad request
		http_response_code(405); 
		// tell the user
		echo json_encode(array("message" => "Validation Exception. Data is incomplete."));
	}
	
}
/*+++++++++++++++++++End: put_update_existing_pett+++++++++++++++++++*/


/*+++++++++++++++++++STart: put_update_existing_pet+++++++++++++++++++*/
if(isset($_REQUEST['type']) && $_REQUEST['type']=='find_pet_by_status'){
	//print_r($_POST);exit;
	if(isset($_POST['status'])){
		$status=$_POST['status'];
		$where="where";
		foreach($status as $statusKey=>$statusVal){
			$where=$where." a.status='".$statusVal."' or";
		}
		$where=rtrim($where," or");
		$query=("SELECT a.id,a.name,a.photoUrls,b.id as category_id , b.name as category_name, c.id as tag_id, c.name as tag_name, a.status  FROM `pet`as a inner join category as b on (a.category=b.id) INNER JOIN tags as c on (a.tags=c.id) $where");
		$result=$pet->find_by_status($query);
		$res_arr_values = array();
		foreach($result as $row){
			$Val=array('id'=>$row->id,'category'=>array('id'=>$row->category_id,'name'=>$row->category_name),'name'=>$row->name,'photoUrls'=>array($row->photoUrls),'tags'=>array(array("id"=>$row->tag_id,"name"=>$row->tag_name)),'status'=>$row->status);
			array_push($res_arr_values, $Val);
		}
		http_response_code(200);
		echo json_encode($res_arr_values);
	}else{
		http_response_code(400);
		echo json_encode(array("message" => "Invalid ID supplied."));
	}	
}
/*+++++++++++++++++++End: put_update_existing_pett+++++++++++++++++++*/	


/*+++++++++++++++++++STart: find_pet_by_id+++++++++++++++++++*/
if(isset($_REQUEST['type']) && $_REQUEST['type']=='find_pet_by_id'){
	//print_r($_POST);exit;
	$id=$_POST['pet_id'];
	if(isset($id)){
		$result=$pet->find_pet_by_id($id);
		//print_r($result);
		if($result==0){
			http_response_code(404);
			echo json_encode(array("message" => "Pet not found."));
		}else{
			http_response_code(200);
			echo json_encode($result);
		}
	}else{
		http_response_code(400);
		echo json_encode(array("message" => "Invalid ID supplied."));
	}	
}
/*+++++++++++++++++++End: find_pet_by_id+++++++++++++++++++*/

/*+++++++++++++++++++STart: update_pet_data_by_id+++++++++++++++++++*/
if(isset($_REQUEST['type']) && $_REQUEST['type']=='update_pet_data_by_id'){
	$id=$_POST['pet_id'];
	$pet_name=$_POST['pet_name'];
	$pet_status=$_POST['pet_status'];
	if(isset($id)){
		$response=$pet->update_pet_by_id($id,$pet_name,$pet_status);
		if($response==1){
			http_response_code(200);
			echo json_encode(array("message" => "success."));
		}else if($response==2){
			http_response_code(405);
			echo json_encode(array("message" => "Invalid Input."));
		}else if($response==3){
			http_response_code(404);
			echo json_encode(array("message" => "Pet not found."));
		}
	}else{
		http_response_code(400);
		echo json_encode(array("message" => "Invalid ID supplied."));
	}
}
/*+++++++++++++++++++End: update_pet_data_by_id+++++++++++++++++++*/	

/*+++++++++++++++++++STart: delete_pet_data_by_id+++++++++++++++++++*/
if(isset($_REQUEST['type']) && $_REQUEST['type']=='delete_pet_by_id'){
	$id=$_POST['pet_id'];
	if(isset($id)){
		$response=$pet->delete_pet_by_id($id);
		if($response==1){
			http_response_code(200);
			echo json_encode(array("message" => "Pet Record is Deleted."));
		}else if($response==2){
			http_response_code(404);
			echo json_encode(array("message" => "Pet not found."));
		}
	}else{
		http_response_code(400);
		echo json_encode(array("message" => "Invalid ID supplied."));
	}
}
?>
