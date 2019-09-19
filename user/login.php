
<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Login User</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontello.css"> 
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery.min.js"></script> 
	</head>
	<body>
		<div class="row bg-light mx-0 vh-100 login-page" >
			<div class="col-lg-4 text-center mx-auto p-3 p-lg-5 align-self-center">
				<div class="p-3 bg-white mx-auto">
				<h1 class="h4" style="font-weight: 500;">Login</h1>
				<form method="post" class="pt-3" id="login">
					<div class="input-group pb-3">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="icon-user"></i></div>
						</div>
						<input type="text" class="form-control" id="name" placeholder="Enter Username" name="username">
					</div>
					<div class="input-group pb-3">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="icon-lock-dark"></i></div>
					</div>
					<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="userpass" id="userpass" ></div>
					<button type="submit"  name="submit" id="loading" class="btn btn-warning btn-block mt-3 px-lg-5">Sign In</button>
				</form>
				</div> 
			<!--<p class="border-top border-bottom w-75 mx-auto mt-3 py-2">Don’t have an account? <a class="text-info font-weight-bold" href="#">Sign Up</a></p>-->
			</div>
		</div>
		<script src="js/jquery.validate.js"></script>
		<script src="js/additional-methods.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/formValidation.js"></script>
	</body>
</html>

