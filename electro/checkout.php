<?php 
session_start();
$cart = isset($_SESSION['CART']) ? $_SESSION['CART'] : [];

// $totalPrice = 0;
    // var_dump($cart);die;
?>
<?php 
		  require_once "db.php";
      $select = "SELECT * from cart";
      $stmt = $conn->prepare($select);
      $stmt->execute();
      $slide = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $mess = "";

		if(isset($_POST['btn_cart'])){
   		 extract($_REQUEST);
    
    if($name_user == "" || $address == "" || $email == "" || $phone == ""  ){
      $mess = "Vui lòng điền đầy đủ thông tin cần thiết";
    }else{
      //Sql create
    	$date_cart = date('Y/m/d');
      $create_cart = "INSERT into cart(name_user, address,  email, phone, date_cart, total, order_note) values('$name_user', '$address', '$email', '$phone', 'date_cart', '$totalPrice', '$order_note')";
      $stmt = $conn->prepare($create_cart);
      $stmt->execute();
      //Check
      if($stmt->rowCount() > 0){
      //Chuyển trang
       
          
         echo "<script> aleart(Tạo đơn hàng thành công)</script>";
      }else{
        $mess = "Không thể thêm dữ liệu";
      }
    } 
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
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="home.php">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
<div style="color: red ; text-align: center;">
						<?=$mess ?> 
					</div>
		<!-- SECTION -->
		<div class="section">
			
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Thanh toán</h3>
							</div>
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<input class="input" type="text" name="name_user" placeholder="Điền tên">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="address" placeholder="Địa chỉ">
								</div>
								<div class="form-group">
									<input class="input" type="email" name="email" placeholder="Email">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="phone" placeholder="Số điện thoại">
								</div>
								<?php
								// date_default_timezone_set('Asia/Ho_Chi_Minh');
								// date_create('now')->format('Y-m-d  H:i:s');
								?>
								<!-- <input type="hidden" name="date_cart" style="height: 38px" value="<?php echo date('Y-m-d  H:i:s'); ?>" /> -->
								<input type="hidden" name="status" style="height: 38px" value="0">


							<!-- <div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telephone">
							</div> -->
							
						</div>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" name="order_note" placeholder="Ghi chú"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Đơn hàng của bạn</h3>
						</div>
						
						<div class="order-summary">
							<div class="order-col">
								<div><strong>Sản phẩm</strong></div>
								<div><strong>Thành tiền</strong></div>
							</div>
							<?php foreach ($cart as $item): ?>
								<div class="order-products">
									<div class="order-col">
										<div><?php echo $item['name'] ?></div>
										<div>*<?php echo $item['quantity'] ?></div>
										<div><?php  $itemTotal = $item['sale_price']*$item['quantity'];
										$totalPrice += $itemTotal;

										echo number_format($itemTotal); ?>.000 vnđ</td></div>
									</div>

								</div>
							<?php endforeach ?>
							<div class="order-col">
								<div>Phí ship</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>Tổng đơn</strong></div>
								<div><strong class="order-total"><input type="hidden" name="totalPrice" value="<?php $totalPrice ?>"><?php echo number_format($totalPrice); ?>.000 vnđ</strong></div>
							</div>
						</div>
						<!-- <div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									Direct Bank Transfer
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2">
								<label for="payment-2">
									<span></span>
									Cheque Payment
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3">
								<label for="payment-3">
									<span></span>
									Paypal System
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div> -->
						<!-- <div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div> -->

						<input type="submit" style="margin-right: 15px" class="primary-btn order-submit" name="btn_cart" value="Gửi">
						<!-- <input type="submit" class="" name="btn_cart" value="Gửi" -->
						

						
					</div>
					<!-- /Order Details -->
				</form>
			</div>
			<!-- /row -->
		</div>
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
	<footer id="footer">
		<!-- top footer -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">About Us</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
							<ul class="footer-links">
								<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
								<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
								<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Categories</h3>
							<ul class="footer-links">
								<li><a href="#">Hot deals</a></li>
								<li><a href="#">Laptops</a></li>
								<li><a href="#">Smartphones</a></li>
								<li><a href="#">Cameras</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>
						</div>
					</div>

					<div class="clearfix visible-xs"></div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Information</h3>
							<ul class="footer-links">
								<li><a href="#">About Us</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Orders and Returns</a></li>
								<li><a href="#">Terms & Conditions</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Service</h3>
							<ul class="footer-links">
								<li><a href="#">My Account</a></li>
								<li><a href="#">View Cart</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Track My Order</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top footer -->

		<!-- bottom footer -->
		<div id="bottom-footer" class="section">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12 text-center">
						<ul class="footer-payments">
							<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
							<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
						</ul>
						<span class="copyright">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</span>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bottom footer -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
