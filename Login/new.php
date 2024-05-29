<?php
	session_start ();
	$db_host="localhost";
	$db_user="root";
	$db_pass="";
	$db_name="stunting";
	$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>

<html lang="en">
	<head>
		<title>Login E-Stunting</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> 
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/style_login.css">
	</head>

	<style>
		body{
			background: url('images/bg-02.jpg');
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			background-attachment: fixed;
		}

		option{
			background-color: #a8a8a8;
		}
	</style>

	<body>
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="login-wrap">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
					</div>

					<form class="login100-form validate-form" method="post" style="padding-top:20px; padding-bottom:40px;">
						<div class="wrap-input100 validate-input m-b-25" data-validate="Username is required">
							<span class="label-input100">Username</span>
							<input class="input100" type="text" name="username" placeholder="Enter username">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-25" data-validate = "Password is required">
							<span class="label-input100">Password</span>
							<input class="input100" type="password" name="pass" placeholder="Enter password">
							<span class="focus-input100"></span>
						</div>

                        <div class="wrap-input100 validate-input m-b-25" data-validate = "Password is required">
							<span class="label-input100">Confirm Your Password</span>
							<input class="input100" type="password" name="cpass" placeholder="Confirm Your password">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-25" data-validate = "Password is required">
							<span class="label-input100">No. KK</span>
							<input class="input100" type="text" name="kk" placeholder="Masukkan No. KK">
							<span class="focus-input100"></span>
						</div>

                        <div class="wrap-input100 validate-input m-b-25" data-validate = "Password is required">
							<span class="label-input100">Foto KK</span>
							<input class="input100" type="file" name="file">
							<span class="focus-input100"></span>
						</div>

						<div class="container-login100-form-btn">
							<a type="submit" href="index.php" class="login100-form-btn">Back</a>
							<button type="submit" name="reg" class="login100-form-btn">Create</button>
						</div>
					</form>
					<?php
						if (isset($_POST['back'])){
							header('Location:index.php');
						} else if(isset($_POST['reg'])){
							header('Location:new.php');
						}
					?>
				</div>
			</div>
		</div>

		
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="vendor/animsition/js/animsition.min.js"></script>
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
		<script src="vendor/countdowntime/countdowntime.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>