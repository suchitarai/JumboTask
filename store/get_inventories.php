<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once("../database.php");
$db=new database();
$result=$db->fetchAllRows("select a.quantity,b.name from pet_order as a inner join pet as b on(a.petId=b.id)");
$res_arr_values = array();
foreach($result as $row){
	$Val=array($row->name=>$row->quantity);
	array_push($res_arr_values, $Val);
}
http_response_code(200);
echo json_encode($res_arr_values);

?>