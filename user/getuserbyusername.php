
<?php
session_start();
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']==1){
// don't need any code this allow user to access this page
}else{
//Redirect user to login page//	header('Location: ' . $_SERVER['HTTP_REFERER']);
   header('Location: login.php');	
 }
if(isset($_POST['submit'])){
$username=$_POST['username'];
//  Initiate curl
$url="localhost/jumbo/controller/form_submit.php?user_name=$username&type=getValue";
$ch = curl_init();
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);
// Will dump a beauty json :3
print $result;
}


?>
<script>
	function checkValidation(){
		var username= document.getElementById("username").value;
		if(username==""){
			document.getElementById('username_error').style.display = '';
			document.getElementById('username_error').innerHTML= 'Please Enter User Name';
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
	<title>User</title>
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
				<h1 class="h4" style="font-weight: 500;">Get user by user name</h1>
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
					<button type="submit"  name="submit"   class="btn btn-warning btn-block mt-3 px-lg-5">Execute</button>
				</form>
				</div> 
			<!--<p class="border-top border-bottom w-75 mx-auto mt-3 py-2">Don’t have an account? <a class="text-info font-weight-bold" href="#">Sign Up</a></p>-->
			</div>
		</div>

	</body>
</html>
