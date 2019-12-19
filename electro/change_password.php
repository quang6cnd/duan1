		<?php 
		
		session_start();
		if(!isset($_SESSION['username'])){
			header('location: signin.php');
		}
		require_once './commons/constants.php';
		?>
		<?php

		require_once"db.php";
			$message = '';

	if (isset($_GET['username'])) {
		$id_user = $_GET['username'];

		$sql = "SELECT * FROM users WHERE username = '$id_user'";
		$stmt = $conn->query($sql)->fetch();
	}

	if (isset($_POST['doi_mk'])) {
		extract($_REQUEST);
		$pass_cu = md5($password);
		if(empty($password)){
			$message = "Bạn chưa nhập mật khẩu cũ !";
		}elseif($pass_cu != $stmt['password']){
			$message = "Mật khẩu không chính xác !";
		}

		if(empty($new_pass)){
			$message .= "<br>Bạn chưa nhập mật khẩu mới !";
		}

		if(empty($comfirm_new_pass)){
			$message .= "<br>Bạn chưa nhập lại !";
		}elseif ($new_pass != $comfirm_new_pass) {
			$message .= "<br> Mật khẩu mới không trùng khớp !";
		}

		if ($message == '') {
			$new_password = md5($new_pass);
			$sql_update = "UPDATE users SET password = '$new_password' WHERE username = '$id_user'";
			$stmt_update = $conn->prepare($sql_update);
			$stmt_update->execute();

			if ($stmt_update->execute()) {
				$message = "Đổi mật khẩu thành công !";
			}else{
				$message = "Đổi mật khẩu thất thất bại !";
			}
		}
		//
	}
?>
			<DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

				<title>Electro - HTML Ecommerce Template</title>

				<!-- Google font -->
				<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

				<!-- Bootstrap -->
				<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

				<!-- Slick -->
				<link type="text/css" rel="stylesheet" href="css/slick.css"/>
				<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

				<!-- nouislider -->
				<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

				<!-- Font Awesome Icon -->
				<link rel="stylesheet" href="css/font-awesome.min.css">

				<!-- Custom stlylesheet -->
				<link type="text/css" rel="stylesheet" href="css/style.css"/>

				<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<!-- HEADER -->
		<?php include("share/header.php"); ?>
		<!-- /HEADER -->



		<!-- BREADCRUMB -->

		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Tài Khoản</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang chủ</a></li>
							<li class="active">Cập nhật thông tin</li>
							<li><a href="change_password.php?id_user=36 ?>">Đổi mật khẩu</a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
<!-- <div style="color: red ; text-align: center;">
						<?=$mess ?> 
					</div> -->
		<!-- SECTION -->
		<form class="inforuser" style="width: 700px; height: auto; margin-left: 600px" moaction="" name="doi_mk" method="POST" enctype="multipart/form-data">
			<div style="color: red ; text-align: center;">
						<?php 
			if (isset($message)) {
				echo $message;
			}
			?>
					</div>
			
			<h2>Sửa tài khoản</h2>
			
			<div class="form-group">
				<label for="">Mật khẩu cũ</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Mật khẩu mới</label>
				<input type="password" name="new_pass" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Xác nhận </label>
				<input type="password" name="comfirm_new_pass" class="form-control" ><br>
			

			
			<input type="submit" name="doi_mk" class="btn_user" value="Sửa">
					</form>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">
						<p>Sign Up for the <strong>NEWSLETTER</strong></p>
						<form>
							<input class="input" type="email" placeholder="Enter Your Email">
							<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
						</form>
						<ul class="newsletter-follow">
							<li>
								<a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /NEWSLETTER -->

	<!-- FOOTER -->
<?php include("share/footer.php"); ?>


</body>
</html>