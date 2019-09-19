<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

 
// instantiate product object
include_once 'store.php';
$store = new store();
 // get posted data
//$data = json_decode(file_get_contents("php://input"));
$data=json_decode($_POST['body']);
// make sure data is not empty
if(
    !empty($data->petId) &&
    !empty($data->quantity) &&
    !empty($data->shipDate) &&
    !empty($data->status)
){
 
    // set store property values
    $store->petId = $data->petId;
    $store->quantity = $data->quantity;
    $store->shipDate = $data->shipDate;
	$store->status = $data->status;
	$store->complete = $data->complete;
 
    // create the store
    if($store->create()){ 
        // set response code - 201 created
        http_response_code(201); 
        // tell the user
        echo json_encode(array("message" => "successful operation"));
    }
} 
// tell the user data is incomplete
else{ 
    // set response code - 400 bad request
    http_response_code(400); 
    // tell the user
    echo json_encode(array("message" => "Invalid order."));
}
?>
