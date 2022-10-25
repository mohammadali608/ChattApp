<?php 

	require 'db.php';

		$error="";
		if(isset($_POST['submit'])){

			$user=$_POST['username'];
			$email=$_POST['email'];
			$profilename="Images/".$_FILES['profile']['name'];
			$path=$_FILES['profile']['tmp_name'];
			$pass=$_POST['pass'];

			
			$query1="select * from tb_register where email='$email'";

			$data1=$con->prepare($query1);

			$data1->execute();

			$result=$data1->get_result();

			if ($result->num_rows>0) {
			
				  	$error="Email already exist";
			}else{
					
			$query="INSERT INTO `tb_register`( `username`, `email`, `profile`, `password`, `active`) VALUES ('$user','$email','$profilename','$pass',0)";

			$data=$con->prepare($query);
			$data->execute();

			move_uploaded_file($path,$profilename);

			header('location:login.php');
			exit;
				$error="";
			}
			
			
			
			

		}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign up</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="LoginContent/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LoginContent/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LoginContent/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LoginContent/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="LoginContent/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LoginContent/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LoginContent/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="LoginContent/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="LoginContent/css/util.css">
	<link rel="stylesheet" type="text/css" href="LoginContent/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('LoginContent/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="POST" enctype="multipart/form-data">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Sign up
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf159;"></span>
						<span class="text text-danger"><?php echo $error;?></span>
					</div>

					<div class="wrap-input100" >
						<input class="input100" type="file"  name="profile" >
						<span class="focus-input100" data-placeholder="&#xf140;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" value="submit">
							Sign up
						</button>
					</div>
					<a href="Login.php" class="text text-white" >Already Account</a>

				</form>
			</div>
		</div>
	</div>
	

<!--===============================================================================================-->
	<script src="LoginContent/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="LoginContent/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="LoginContent/vendor/bootstrap/js/popper.js"></script>
	<script src="LoginContent/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="LoginContent/vendor/select2/select2.min.js"></script>
	<script src="LoginContent/js/main.js"></script>

</body>
</html>