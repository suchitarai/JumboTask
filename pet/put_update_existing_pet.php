<script>
	function checkValidation(){
		var body= document.getElementById("body").value;
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
				<h1 class="h4" style="font-weight: 500;">Update Existing Pet</h1>
				<form method="post" class="pt-3" action="petprocessing.php" onsubmit="return checkValidation()">
					<div class="input-group pb-3">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="icon-user"></i></div>
						</div>
						<textarea class="form-control" id="body" placeholder="Enter JSON" name="body" onfocus="hide_error('body_error')"></textarea>
						<input type="hidden" name="type" value="put_update_existing_pet">
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
