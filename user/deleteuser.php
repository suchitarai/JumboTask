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
$array=array('username'=>$user,'type'=>'deleteloginuser');
$str=http_build_query($array);
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,"localhost/jumbo/controller/form_submit.php");                                                                     
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $array);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                     
$result = curl_exec($ch);
print $result;exit;
}
?>
<html>
	<head>
		<title>update multiple user</title>
	</head>
	<body>
		<div>Updated user</div>
		<form id="form1" name="form1" method="post" style="background-color:#f9f9f9; margin:0 auto; width:600px; padding:15px; box-shadow: 0 .5rem 1rem rgba(0,0,0,.15) !important;">
			<table width="100%" border="0" cellpadding='0' cellspacing='10'>
				<tr>
					<td style="width:30%;"><label>User Name </label>&nbsp;</td>
					<td style="width:70%;">
						<input type="text" style="width:100%;" name="username"   required>
					</td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="submit"  style="background-color: #ffbf2f !important;color: #fff; display:block; padding:10px 25px; box-shadow:none;"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>