<?php 
require_once"db.php";
require_once"commons/helpers.php";
require_once"commons/constants.php";
$id = $_GET['id'];
$mysql = "SELECT * from product where id='$id'";
$stmt = $conn->prepare($mysql);
$stmt ->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sql="SELECT * FROM galleries WHERE product_id='$id' ORDER BY id DESC limit 6";
$stmt = $conn->prepare($sql);
$stmt ->execute();
$gallery = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql="SELECT * FROM product INNER JOIN categories ON product.id_cate=categories.id_cate where id_cate = ''";
$stmt=$conn->prepare($sql);
$stmt->execute();
$join=$stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Chi tiết sản phẩm</title>

	<!-- Google font -->
	<?php include("share/style.php"); ?>

</head>
<body>
	<!-- HEADER -->


	<!-- MAIN HEADER -->
	<?php include("share/header.php"); ?>

	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- Product main img -->
				<div class="col-md-5 col-md-push-2">
					<div id="product-main-img">
						<?php foreach ($data as $item):?>
							<div class="product-preview">
								<img src="./img/<?=$item['image']?>" alt="">
							</div>
						<?php endforeach; ?>

					</div>
				</div>
				<!-- /Product main img -->

				<!-- Product thumb imgs -->
				<div class="col-md-2  col-md-pull-5">
					<div id="product-imgs">
						<?php foreach ($gallery as $item):?>
							<div class="product-preview">
								<img src="admin/gallery/<?=$item['url']?>" alt="">
							</div>
						<?php endforeach; ?>

					</div>
				</div>
				<!-- Product details -->
				<div class="col-md-5">
					<div class="product-details">
						<?php foreach ($data as $intro):?>
							
							<h2 class="product-name"><?=$intro['nameproduct']?></h2>
							<div>
								<div class="product-rating">
									<?php 
									for($i = 1; $i <= 5; $i++){
										if($intro['rating'] >= $i){
											$starClass = "fa fa-star";
										}else{
											$starClass = "fa fa-star-o";
										}
										?>
										<i class="<?php echo $starClass ?>"></i>
										<?php
									}
									?>
								</div>
								
							</div>
							<div>
								<h3 class="product-price"><?php echo number_format($intro['sale_price']);  ?> VND <del class="product-old-price"><?php echo number_format($intro['price']);  ?>d</del></h3>
								<span class="product-available"> Số luợng: <?=$intro['amount']?></span>
							</div>
							<p><?=$intro['detail']?></p>

							<!-- <div class="product-options">
								<label>
									Color
									<select class="input-select">
										<option value="0">Red</option>
									</select>
								</label>
							</div> -->

							<div class="add-to-cart">
								<!-- <div class="qty-label">
									Qty
									<div class="input-number">
										<input type="number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div> -->
							<button class="add-to-cart-btn"><a href="add-cart.php?masp=<?php echo $product['id'] ?>" onclick="return confirm('Đã thêm vào giỏ hàng của bạn thành công !')"><p>Thêm vào giỏ</p></button></a>
							</div>

							
						<?php endforeach; ?>

					</div>
				</div>
				<!-- /Product details -->

				<!-- Product tab -->
				<div class="col-md-12">
					<div id="product-tab">
						<!-- product tab nav -->
						<ul class="tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
							<li><a data-toggle="tab" href="#tab3">Reviews </a></li>
						</ul>
						<!-- /product tab nav -->

						<!-- product tab content -->
						<div class="tab-content">
							<!-- tab1  -->
							<?php foreach ($data as $intro):?>
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?=$intro['detail_specifications']?></p>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
							<!-- /tab1  -->

							<!-- tab3  -->

							<div id="tab3" class="tab-pane fade in">
								<div class="row">
									<!-- Rating -->
									<div id="comment">
										
									</div>
									<div class="col-md-3">
										<div id="rating">
											<div class="rating-avg">
												<span>4.5</span>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>

										</div>
									</div>
									<!-- /Rating -->

									<!-- Reviews -->

								</div>
								<div class="col-md-6">
									<div id="reviews">
										<ul class="reviews">
											<li>
												<div class="review-heading">
													<h5 class="name">John</h5>
													<p class="date">27 DEC 2018, 8:0 PM</p>
													<div class="review-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o empty"></i>
													</div>
												</div>
												<div class="review-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
												</div>
											</li>
											<li>
												<div class="review-heading">
													<h5 class="name">John</h5>
													<p class="date">27 DEC 2018, 8:0 PM</p>
													<div class="review-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o empty"></i>
													</div>
												</div>
												<div class="review-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
												</div>
											</li>
											<li>
												<div class="review-heading">
													<h5 class="name">John</h5>
													<p class="date">27 DEC 2018, 8:0 PM</p>
													<div class="review-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o empty"></i>
													</div>
												</div>
												<div class="review-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
												</div>
											</li>
										</ul>

									</div>
								</div>
								<!-- /Reviews -->

								<!-- Review Form -->
								<div class="col-md-3">
									<div id="review-form">
										<form class="review-form">
											<input class="input" type="text" placeholder="Your Name">
											<input class="input" type="email" placeholder="Your Email">
											<textarea class="input" placeholder="Your Review"></textarea>
											<div class="input-rating">
												<span>Your Rating: </span>
												<div class="stars">
													<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
													<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
													<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
													<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
													<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
												</div>
											</div>
											<button class="primary-btn">Submit</button>
										</form>
									</div>
								</div>
								<!-- /Review Form -->
							</div>
						</div>
						<!-- /tab3  -->
					</div>
					<!-- /product tab content  -->
				</div>
			</div>
			<!-- /product tab -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
</div>
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>

					<!-- product -->
					<!-- <div class="col-md-3 col-xs-6">
						<?php
										foreach ($result as $product) {

											?>
											<div class="product">
												<div class="product-img">
													<img src="img/<?=$product['image']?>" alt="">
													
												</div>
												<div class="product-body">
													<h3 class="product-name"><?php echo $product['nameproduct'] ?></h3>
													<h4 class="product-price"><?php echo number_format($product['sale_price'] );?>$</h4>
														<del><?php echo number_format($product['price']); ?>$</del>
													<div class="product-rating">
														<?php 
														for($i = 1; $i <= 5; $i++){
															if($product['rating'] >= $i){
																$starClass = "fa fa-star";
															}else{
																$starClass = "fa fa-star-o";
															}
															?>
															<i class="<?php echo $starClass ?>"></i>
															<?php
														}
														?>
													</div>
													<div class="product-btns">
														<a href="product.php?id=<?=$product['id']?>"><button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"> QUICK VIEW</span></button></a>
													</div>
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
												</div>
											</div>
											<?php
										}
										?>
					</div> -->
				</div>

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
