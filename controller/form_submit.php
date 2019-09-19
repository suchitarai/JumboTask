
<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include ("../database.php");
session_start();
$dbobj=new database();




/*+++++++++++++++++++STart: Login Method+++++++++++++++++++*/

if(isset($_REQUEST['method']) && $_REQUEST['method']=='login'){
	 $username   =$_POST['username'];
	 $password=$_POST['userpass'];
	$val=$dbobj->num_of_rows("select * from user where username='$username' and password='$password'");
	 if($val){
		 $_SESSION['username']=$username;
		 $_SESSION['isLoggedIn']=true;
		 $result="successful operation";
	 }else{
		$result= "Invalid username/password supplied.";
	 }
	 print $result;
	
 }
/*+++++++++++++++++++End: Login Method+++++++++++++++++++*/

/*+++++++++++++++++++STart: purchase /store/order/{orderId}+++++++++++++++++++*/
if(isset($_REQUEST['type']) && $_REQUEST['type']=='purchaseorderid'){
	$order_id=$_POST['orderId'];
	if(1 <= $order_id && $order_id <= 10){
		$db=new database();
		$result=$db->fetchAllRows("select * from pet_order where id=".$order_id);
		if(isset($result)){
			 // set response code - 200 bad request
			http_response_code(200); 
			// tell the user
			echo json_encode(array("message" => "successful operation."));
			echo json_encode($result);
		}else{
			 // set response code - 404 bad request
			http_response_code(404); 
			// tell the user
			echo json_encode(array("message" => "Order not found."));
		}
	}else{
		// set response code - 400 bad request
		http_response_code(400); 
		// tell the user
		echo json_encode(array("message" => "Invalid ID supplied."));
	}
}
/*+++++++++++++++++++End: purchase /store/order/{orderId}+++++++++++++++++++*/


/*+++++++++++++++++++STart: deletepurchaseorderid /store/order/{orderId}+++++++++++++++++++*/
if(isset($_REQUEST['type']) && $_REQUEST['type']=='deletepurchaseorderid'){
	$db=new database();
	$id=$_POST['orderId'];
	if(isset($id)){
		$result=$db->fetchAllRows("select * from pet_order where id=$id");
		//print_r($result);exit;
		if(isset($result)){
			$category_val=$db->query_run("delete from pet_order where id=".$result[0]->id);
			http_response_code(200);
			echo json_encode(array("message" => "Order Record is Deleted."));
		}else{
			http_response_code(404);
			echo json_encode(array("message" => "Order not found."));
		}
	}else{
		http_response_code(400);
		echo json_encode(array("message" => "Invalid ID supplied."));
	}
}
/*+++++++++++++++++++End: deletepurchaseorderid /store/order/{orderId}+++++++++++++++++++*/

/*+++++++++++++++++++STart: Create user+++++++++++++++++++*/
//print_r($_REQUEST);exit;
if(isset($_REQUEST['type']) && $_REQUEST['type']=='createloginuserwithbody'){
	$id=$_POST['id'];
	$username=$_POST['username'];
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$phone=$_POST['phone'];
	$userStatus=$_POST['userStatus'];
	$query="insert into user (id,username,firstName,lastName,email,password,phone,userStatus) values ('".$id."','".$username."','".$firstName."','".$lastName."','".$email."','".$password."','".$phone."','".$userStatus."')";
	$dbobj->query_run($query);
	// set response code - 201 created
	http_response_code(200); 
	// tell the user
	echo json_encode(array("message" => "successful operation"));
}
/*+++++++++++++++++++End: Create/user/{username}+++++++++++++++++++*/
/*+++++++++++++++++++STart: Create user BY Array+++++++++++++++++++*/
if(isset($_REQUEST['type']) && $_REQUEST['type']=='createloginuserarraywithbody'){
	$id=$_POST['id'];
	$username=$_POST['username'];
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$phone=$_POST['phone'];
	$userStatus=$_POST['userStatus'];
	$query="insert into user (id,username,firstName,lastName,email,password,phone,userStatus) values ('".$id."','".$username."','".$firstName."','".$lastName."','".$email."','".$password."','".$phone."','".$userStatus."')";
	$dbobj->query_run($query);
	// set response code - 201 created
	http_response_code(200); 
	// tell the user
	echo json_encode(array("message" => "successful operation"));
}
/*+++++++++++++++++++End: Create user BY Array+++++++++++++++++++*/
/*+++++++++++++++++++STart: Create user BY List+++++++++++++++++++*/
if(isset($_REQUEST['type']) && $_REQUEST['type']=='createuserwithlistapi'){
	$id=$_POST['id'];
	$username=$_POST['username'];
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$phone=$_POST['phone'];
	$userStatus=$_POST['userStatus'];
	$query="insert into user (id,username,firstName,lastName,email,password,phone,userStatus) values ('".$id."','".$username."','".$firstName."','".$lastName."','".$email."','".$password."','".$phone."','".$userStatus."')";
	$dbobj->query_run($query);
	// set response code - 201 created
	http_response_code(200); 
	// tell the user
	echo json_encode(array("list"=>array("username"=>$username,"firstName"=>$firstName,"lastName"=>$lastName,"lastName"=>$lastName,"lastName"=>$lastName,"email"=>$email,"password"=>$password,"phone"=>$phone,"userStatus"=>$userStatus),"message" => "successful operation"));

}
/*+++++++++++++++++++End: Create user BY List+++++++++++++++++++*/
 /*+++++++++++++++++++Start: Update /user/{username} by by the logged in user. Method+++++++++++++++++++*/
if(isset($_REQUEST['type']) && $_REQUEST['type']=='updateloginuserwithbody'){
	$updatedusername=$_POST['updatedusername'];
	$id=$_POST['id'];
	$username=$_POST['username'];	
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$email=$_POST['email'];
	$val=$dbobj->num_of_rows("select * from user where username='$username' and id='$id'");
	if($val){
		$query="update user set username='$updatedusername' where id=$id ";
		$result=$dbobj->query_run($query);
			http_response_code(200);
			echo json_encode(array("message" => "Updated."));
	}else{
		http_response_code(400);
		$result= "User not found";
		echo json_encode($result);
	}
	
	
}
 /*+++++++++++++++++++End: Update /user/{username} by by the logged in user. Method+++++++++++++++++++*/
/*+++++++++++++++++++Start: Delete/user/{username}+++++++++++++++++++*/
if(isset($_REQUEST['type']) && $_REQUEST['type']=='deleteloginuser'){
	$username=$_POST['username'];
	$val=$dbobj->num_of_rows("select * from user where username='$username' ");
	if($val){
		$query="delete from user where username='$username'";
		$result=$dbobj->query_run($query);
			http_response_code(200);
			echo json_encode(array("message" => "deleted."));
	}else{
		http_response_code(400);
		$result= "User not found";
		echo json_encode($result);
	}
	
	
}
/*+++++++++++++++++++End: Delete/user/{username}+++++++++++++++++++*/
/*+++++++++++++++++++Start: Delete/user/{username}+++++++++++++++++++*/
if(isset($_REQUEST['type']) && $_REQUEST['type']=='getValue'){
	$username=$_GET['user_name'];
	$query="select * from user where username='$username' ";
	$val=$dbobj->num_of_rows($query);
	if($val){
		   $result=$dbobj->fetchAllRows($query);
			http_response_code(200);
			echo json_encode($result);
	}else{
		http_response_code(400);
		$result= "User not found";
		echo json_encode($result);
	}
	
	
}
/*+++++++++++++++++++End: Delete/user/{username}+++++++++++++++++++*/
?>
