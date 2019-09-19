
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
	var pet_id= document.getElementById("pet_id").value;
	if(pet_id==""){
		document.getElementById('pet_id_error').style.display = '';
		document.getElementById('pet_id_error').innerHTML= 'Please Fill The Pet Id';
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
	<title>Pet</title>
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
				<h1 class="h4" style="font-weight: 500;">Find Pet by ID</h1>
				<form method="post" class="pt-3" action="petprocessing.php" onsubmit="return checkValidation()">
					<div class="input-group pb-3">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="icon-user"></i></div>
						</div>
						<input class="form-control" name="pet_id" id="pet_id" placeholder="Enter ID" onkeypress="return isNumber(event)" onfocus="hide_error('pet_id_error')">	
						<input type="hidden" name="type" value="find_pet_by_id">
					</div>
					<div class="input-group pb-3">
						<div id="pet_id_error" style="color:red;"></div>
					</div>
					<button type="submit"  name="submit"   class="btn btn-warning btn-block mt-3 px-lg-5">Execute</button>
				</form>
				</div> 
			<!--<p class="border-top border-bottom w-75 mx-auto mt-3 py-2">Don’t have an account? <a class="text-info font-weight-bold" href="#">Sign Up</a></p>-->
			</div>
		</div>

	</body>
</html>
