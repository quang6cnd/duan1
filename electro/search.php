<?php 
session_start();
require_once './commons/constants.php';
require_once"db.php";
require_once"commons/helpers.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - HTML Ecommerce Template</title>

	<!-- Google font -->
	<?php include("share/style.php"); ?>

	</head>
	<body>
		<!-- HEADER -->
		<header>
			<?php include("share/header.php"); ?>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<!-- <h3 class="aside-title">Categories</h3> -->
						
							<div class="checkbox-filter">

								
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
					
						<!-- /store top filter -->

						<!-- store products -->

						<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php
											$ma_hh = "";
											if(isset($_POST['btn_search'])){
												
												$srchTxt = $_POST['srchTxt'];
												if($srchTxt == ""){
													echo "<script>alert('Vui lòng nhập từ khóa')</script>";
													header('location: index.php');
												}else{
													
													// echo $search_value;
														$sql = "SELECT * FROM product WHERE nameproduct LIKE '%$srchTxt%' limit 9";
													}
												//truy vấn
													$stmt = $conn->prepare($sql);
													$stmt->execute();
													$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


													if($stmt->rowCount() > 0){
													}else{
														echo "<script>alert('Không tìm ra sản phẩm !')</script>";
													}
												}
											

										?>	
										<?php
										if (isset($result)) {
											
										foreach ($result as $product) {

											?>
											<div class="product">
												<div class="product-img">
													<img src="img/<?=$product['image']?>" alt="">
													
												</div>
												<div class="product-body">
													<h3 class="product-name"><?php echo $product['nameproduct'] ?></h3>
													<h4 class="product-price"><?php echo number_format($product['sale_price'] );?> VND</h4>
														<del><?php echo number_format($product['price']); ?> VND</del>
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
														<a href="product.php?id=<?=$product['id']?> && id_cate=<?=$product['id_cate']?>"><button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"> QUICK VIEW</span></button></a>
													</div>
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn"><a href="add-cart.php?masp=<?php echo $product['id'] ?>" onclick="return confirm('Đã thêm vào giỏ hàng của bạn thành công !')"><p>Thêm vào giỏ</p></button></a>
												</div>
											</div>
											<?php
										}

									}
							
										?>
										<!-- /product -->

										<!-- product -->

										<div id="slick-nav-1" class="products-slick-nav"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Products tab & slick -->
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
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
<?php include("share/footer.php"); ?>


</body>
</html>