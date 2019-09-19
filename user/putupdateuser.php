<?php
session_start();
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']==1){
// don't need any code this allow user to access this page
}else{
//Redirect user to login page//	header('Location: ' . $_SERVER['HTTP_REFERER']);
   header('Location: login.php');	
 }
if(isset($_POST['submit'])){
$user=$_POST['username'];
$body=$_POST['bodyval'];
$data=( json_decode($body,true));
$array=array('updatedusername'=>$user,'type'=>'updateloginuserwithbody');
$new_array=(array_merge($data,$array));
$str=http_build_query($new_array);
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,"localhost/jumbo/controller/form_submit.php");                                                                     
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $new_array);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                     
$result = curl_exec($ch);
print $result;exit;
}
?>

<!DOCTYPE html>
<script>
	function checkValidation(){
		var body= document.getElementById("bodyval").value;
		var username= document.getElementById("username").value;
		if(username==""){
			document.getElementById('username_error').style.display = '';
			document.getElementById('username_error').innerHTML= 'Please Fill The User Name';
			return false;
		}
		if(body==""){
			document.getElementById('body_error').style.display = '';
			document.getElementById('body_error').innerHTML= 'Please Fill The Body';
			return false;
		}
	}
	function hide_error(val){
		document.getElementById(val).style.display = 'none';
		document.getElementById(val).innerHTML= '';
	}
</script>
<html lang="en">
	<head>
	<title>Login User</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontello.css"> 
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="row bg-light mx-0 vh-100 login-page" >
			<div class="col-lg-4 text-center mx-auto p-3 p-lg-5 align-self-center">
				<div class="p-3 bg-white mx-auto">
				<h1 class="h4" style="font-weight: 500;">Updated user</h1>
				<form method="post" class="pt-3" onsubmit="return checkValidation()">
					<div class="input-group pb-3">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="icon-user"></i></div>
						</div>
						<input type="text" class="form-control" id="username" placeholder="User Name" name="username" onfocus="hide_error('username_error')">
					</div>
					<div class="input-group pb-3">
						<div id="username_error" style="color:red;"></div>
					</div>
					<div class="input-group pb-3">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="icon-user"></i></div>
						</div>
						<textarea class="form-control" id="bodyval" placeholder="Enter JSON" name="bodyval" onfocus="hide_error('body_error')"></textarea>
					</div>
					<div class="input-group pb-3">
						<div id="body_error" style="color:red;"></div>
					</div>
					<button type="submit"  name="submit"   class="btn btn-warning btn-block mt-3 px-lg-5">Execute</button>
				</form>
				</div> 
			<!--<p class="border-top border-bottom w-75 mx-auto mt-3 py-2">Don’t have an account? <a class="text-info font-weight-bold" href="#">Sign Up</a></p>-->
			</div>
		</div>

	</body>
</html>
