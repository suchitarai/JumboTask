<script>
	function checkValidation(){
		if(document.getElementById("status").selectedIndex=='-1'){
			document.getElementById('status_error').style.display = '';
			document.getElementById('status_error').innerHTML= 'Please Select Status';
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
				<h1 class="h4" style="font-weight: 500;">Find Pet By Status</h1>
				<form method="post" class="pt-3" action="petprocessing.php" onsubmit="return checkValidation()">
					<div class="input-group pb-3">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="icon-user"></i></div>
						</div>
						<select class="form-control" onfocus="hide_error('status_error')"  name="status[]" id="status" size="3" multiple="multiple" tabindex="1">
							<option value="available">available</option>
							<option value="pending">pending</option>
							<option value="sold">sold</option>
						</select>
						<input type="hidden" name="type" value="find_pet_by_status">
					</div>
					<div class="input-group pb-3">
						<div id="status_error" style="color:red;"></div>
					</div>
					<button type="submit"  name="submit"   class="btn btn-warning btn-block mt-3 px-lg-5">Execute</button>
				</form>
				</div> 
			<!--<p class="border-top border-bottom w-75 mx-auto mt-3 py-2">Don’t have an account? <a class="text-info font-weight-bold" href="#">Sign Up</a></p>-->
			</div>
		</div>

	</body>
</html>
