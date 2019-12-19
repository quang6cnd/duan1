		<?php 
		
		session_start();
		if(!isset($_SESSION['username'])){
			header('location: signin.php');
		}
		require_once './commons/constants.php';
		?>
		<?php
		require_once"db.php";
		$select = "SELECT * from users";
		$stmt = $conn->prepare($select);
		$stmt->execute();
		$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$mess = "";

		


		
		?>


	<?php 
		if(isset($_POST['btn_user'])){
			extract($_REQUEST);
       //Ảnh
			if($_FILES['avatar']['name'] == ""){
				$image = $avt;
				echo $avt;
			}else{
				$image = $_FILES['avatar']['name'];
				move_uploaded_file($_FILES['avatar']['tmp_name'], "img/".$image);
			}








    ///Kiểm tra
			if($name == "" || $email =="" || $address =="" || $phone ==""){
				$mess = "Vui lòng điền đầy đủ thông tin cần thiết";
			}else{
      //Sql create
				$update_ad = "UPDATE users set name='$name', image='$image', email='$email' where username='$username'";
				$stmt = $conn->prepare($update_ad);
				$stmt->execute();
      //Check
				if($stmt->rowCount() > 0){
      //Chuyển trang
					// header('location: list_user.php');
					$mess = "Sửa Thành Công !" ;
				}else{
					$mess = "Không sửa dữ liệu";
				}
			} 
		}
		if(isset($_GET['username'])){
          $username = $_GET['username'];
          $stmt = $conn->prepare("SELECT * from users where username=$username");
          $stmt->execute();
          $users = $stmt->fetch();
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
							<li><a href="change_password.php?username=<?=$stmt_tk['username']?>">Đổi mật khẩu</a></li>
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
		<form class="inforuser" style="width: 700px; height: auto; margin-left: 400px" moaction="" name="btn_user" method="POST" enctype="multipart/form-data">
			<div style="color: red ; text-align: center;">
						<?php 
			if (isset($mess)) {
				echo $mess;
			}
			?>
					</div>
			
			<h2>Sửa tài khoản</h2>
			
			<div class="form-group">
				<label for="">Họ Tên</label>
				<input type="text" name="name" class="form-control" value="<?=$stmt_tk['name']?>">
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input type="email" name="email" class="form-control" value="<?=$stmt_tk['email']?>">
			</div>
			<div class="form-group">
				<label for="">Địa chỉ</label>
				<input type="text" name="address" class="form-control" value="<?=$stmt_tk['address']?>">
			</div>
			<div class="form-group">
				<label for="">Số điện thoại</label>
				<input type="text" name="phone" class="form-control" value="<?=$stmt_tk['phone']?>">
			</div>
			<div class="form-group">
				<label for="">Ảnh</label>
				<input type="hidden" name="avt" value="<?=$stmt_tk['image'] ?>">
				<!-- <img src="../img/<?= $users['image'] ?>" alt="" name="avt"> -->
				<input type="file" name="avatar" value="">
			</div>


			
			<input type="submit" name="btn_user" class="btn_user" value="Sửa">
			 <img src="img/<?=$stmt_tk['image'] ?>" alt=""  style="width: 250px; float: right;position: none; margin-top: -350px; margin-right: -400px;">
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