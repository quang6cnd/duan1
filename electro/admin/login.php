<?php 
	include '../db.php';
	session_start();
	$message = '';
	$check_user = "";
	$sql = "SELECT * FROM admin";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchALL(PDO::FETCH_ASSOC);

	if (isset($_POST['loginad'])) {
		extract($_REQUEST);
		$new_pass = md5($password);

		// Check tài khoản tồn tại không
		foreach ($result as $row) {
				if ($row['user'] != $user) {
					$check_user = 'false';
				}else{
					$check_user = '';
					break;
				}
			}

		if (empty($user)) {
			$message = "Bạn chưa nhập tài khoản !<br>";
		}elseif($check_user == 'false'){
			$message .= "Tài khoản không tồn tại !<br>";
		}

		
		$sql_check_tk = "SELECT * FROM admin WHERE user= '$user'";
		$stmt_check_tk = $conn->query($sql_check_tk)->fetch();

		if (empty($password)) {
			$message .= "Bạn chưa nhập mật khẩu !<br>"; 
		}elseif($new_pass != $stmt_check_tk['password']){
			$message .= "Mật khẩu không đúng !<br>";
		}

		if ($stmt_check_tk['user'] == $user && $stmt_check_tk['password'] == $new_pass) {
			
			
			if ($stmt_check_tk['role'] == '1') {
				header('location: index.php');
				$_SESSION['user'] = $user;
				$_SESSION['password'] = $new_pass;
			}elseif($stmt_check_tk['role'] == '0'){
				header('location: ../index.php');
				$_SESSION['user'] = $user;
				$_SESSION['password'] = $new_pass;
			}
		}else{
			$message .= "Đăng nhập thất bại !";
		}
		//
	}

?>



		<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
	
</head>
<body>
	
	<div class="limiter">
		
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(login/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div><br>	
				<div style="color: red ; text-align: center;">
						<?=$message ?> 
					</div>

				<form action="" method="post" class="login100-form validate-form" >
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username:</span>
						<input class="input100" type="text" name="user" placeholder="Nhập tài khoản">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password:</span>
						<input class="input100" type="password" name="password" placeholder="Mật khẩu">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" value="yes">
							<!-- <label class="label-checkbox100" for="ckb1" name="remember">
								Remember me
							</label> -->
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="loginad" type="submit">
							Login
						</button>
						
							
						
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>