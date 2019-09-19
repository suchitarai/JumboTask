<?php
if(isset($_POST['submit'])){
$orderId=$_POST['orderId'];
$array=array('orderId'=>$orderId,'type'=>'deletepurchaseorderid');

//print_r( $new_array);exit;
$str=http_build_query($array);
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,"localhost/jumbo/controller/form_submit.php");                                                                   
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $array);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                     
$result = curl_exec($ch);
//print "suchi";exit;  
print $result;//exit;
}
?>
<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function checkValidation(){
	var orderId= document.getElementById("orderId").value;
	if(orderId==""){
		document.getElementById('OrderID_error').style.display = '';
		document.getElementById('OrderID_error').innerHTML= 'Please Fill The OrderID';
		return false;
	}
}

function hide_error(val){
	document.getElementById(val).style.display = 'none';
	document.getElementById(val).innerHTML= '';
}
</script>

<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../user/css/bootstrap.min.css">
	<link rel="stylesheet" href="../user/css/fontello.css"> 
	<link rel="stylesheet" href="../user/css/style.css">
	</head>
	<body>
		<div class="row bg-light mx-0 vh-100 login-page" >
			<div class="col-lg-4 text-center mx-auto p-3 p-lg-5 align-self-center">
				<div class="p-3 bg-white mx-auto">
				<h1 class="h4" style="font-weight: 500;">Delete purchase order by ID</h1>
				<form method="post" class="pt-3" onsubmit="return checkValidation()">
					<div class="input-group pb-3">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="icon-user"></i></div>
						</div>
						<input class="form-control" name="orderId" id="orderId" placeholder="Enter OrderID" onkeypress="return isNumber(event)" onfocus="hide_error('OrderID_error')">	
					</div>
					<div class="input-group pb-3">
						<div id="OrderID_error" style="color:red;"></div>
					</div>
					<button type="submit"  name="submit"   class="btn btn-warning btn-block mt-3 px-lg-5">Execute</button>
				</form>
				</div> 
			<!--<p class="border-top border-bottom w-75 mx-auto mt-3 py-2">Don’t have an account? <a class="text-info font-weight-bold" href="#">Sign Up</a></p>-->
			</div>
		</div>

	</body>
</html>
