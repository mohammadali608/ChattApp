<?php 
		require 'db.php';
		session_start();

			$error="";

			if(isset($_POST['submit'])){

						$email=$_POST['email'];
						$pass=$_POST['pass'];

					$query="select * from tb_register where email='$email' and password='$pass'";
					
					$data=$con->prepare($query);
					$data->execute();

					$result=$data->get_result();

					$user=$result->fetch_assoc();

					if ($result->num_rows>0) {
						
								$_SESSION['id']=$user['id'];
								$_SESSION['name']=$user['username'];
								$_SESSION['profile']=$user['profile'];


								$query1="update tb_register set active=1 where id=".$user['id'];
								$data1=$con->prepare($query1);
								$data1->execute();
								header('location:index.php');
								exit;

					}else{

							$error="email or password incorect";
					}



			}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
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
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf159;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" value="submit">
							Login
						</button>
					</div>
					<span class="text text-danger" ><?php echo $error;?></span>
					<a href="register.php" class="text text-white" >Create new Account</a>

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
=====================================================-->
	<script src="LoginContent/js/main.js"></script>

</body>
</html>