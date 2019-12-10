  <?php 
    session_start();
    $cart = isset($_SESSION['CART']) ? $_SESSION['CART'] : [];

    $totalPrice = 0;
    // var_dump($cart);die;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Giỏ hàng</title>

	<?php 
	include("share/style.php"); 
	require_once"db.php";
	?>

</head>
<body>
	<!-- HEADER -->
	<?php include("share/header.php"); ?>
	<!-- /HEADER -->

	<!-- NAVIGATION -->


	<!-- SECTION -->
	<div id="signin">
		<div class="cart-block">
                                <div class="cart-info table-responsive">
                                    <table class="table product-list">
                                        <thead>
                                            <tr>
                                                <td>Ảnh</td>
                                                <td>Tên sản phẩm</td>
                                                <td>Số lượng</td>
                                                <td>Giá</td>
                                                <td>Thành tiền</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($cart as $item): ?>
                                                
                                                <tr>
                                                    <td>
                                                        <div class="cart-img">
                                                            <a href="#">
                                                                <img src="img/<?php echo $item['feature_image'] ?>" alt="">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td><a href="#"><?php echo $item['name'] ?></a>
                                                    </td>
                                                    <td>
                                                        <div class="cart-action">
                                                            <input type="number" min="0" name="quantity" class="form-control cart-quantity" value="<?php echo $item['quantity'] ?>"/><br>
                                                            <button class="btn btn-default" type="submit"><i class="fa fa-refresh"></i>
                                                            </button>
                                                            <a class="btn btn-danger btn-sm" href="remove_cart_item.php?id=<?php echo $item['id'] ?>" onclick="return confirm('Bạn muốn xóa sản phẩm ?')">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td><?php echo number_format($item['sale_price']); ?>.000 vnđ</td>
                                                    <td><?php 
                                                    $itemTotal = $item['sale_price']*$item['quantity'];
                                                    $totalPrice += $itemTotal;

                                                    echo number_format($itemTotal); ?>.000 vnđ</td>
                                                </tr>
                                            <?php endforeach ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="clearfix text-right">
                                    <span><b>Tổng thanh toán:</b></span>
                                    <li>
                                    </strong></span>  <strong class="cart-total"><?php echo number_format($totalPrice); ?>.000 vnđ </strong>
                                </li>
                            </div>
                            <div class="button text-right">
                                <a class="btn btn-default" href="index.php" onclick="window.history.back()">Tiếp tục mua hàng</a>
                                <a class="btn btn-primary" href="checkout.php">Tiến hành thanh toán</a>
                            </div>
                        </div>
		
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
