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

					<form class="login100-form " method="post" style="padding-top:20px; padding-bottom:40px;">
						<div class="wrap-input100 m-b-25" data-validate="Username ">
							<span class="label-input100">Username</span>
							<input class="input100" type="text" name="username" placeholder="Enter username">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 m-b-25" data-validate = "Password">
							<span class="label-input100">Password</span>
							<input class="input100" type="password" name="pass" placeholder="Enter password">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 m-b-25">
							<span class="label-input100">Login As</span>
							<select class="input100" name="type" style="height:45px; border: 0">
								<option value="Admin">Admin</option>
								<option value="User" default>User</option>
							</select>
							<span class="focus-input100"></span>
						</div>

						<div class="container-login100-form-btn">
							<button type="submit" name="login" class="login100-form-btn">Login</button>
							<button type="submit" name="create" class="login100-form-btn">Create New Account</button>
						</div>
					</form>
					<?php
						if (isset($_POST['login'])){
							$query = mysqli_query($koneksi,"SELECT * FROM `$_POST[type]` WHERE Username = '$_POST[username]' AND Password = '$_POST[pass]'");
							if (mysqli_num_rows($query) == 1){
								if(($_POST['type'] == "Admin")){
									header('Location:../index.php?lval=1');
								} else if($_POST['type'] == "User"){
									header('Location:../index.php?lval=1');
								}
								$_SESSION["Name"] = $_POST['username'];
								$_SESSION["Type"] = $_POST['type'];
								$_SESSION["Id"] = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `$_POST[type]` WHERE Username = '$_POST[username]'"))['Id'];
							} else{
								echo "<script>alert('Username atau Password atau Tipe yang Anda Masukkan Salah!')</script>";
							}
						} else if (isset($_POST['guest'])){
							header('Location:../index.php');
							$_SESSION["Type"] = "Guest";
						} else if(isset($_POST['create'])){
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