<?php 
session_start();
require_once"db.php";
require_once"commons/helpers.php";
require_once"commons/constants.php";
$id = $_GET['id'];
$id_cate = $_GET['id_cate'];

$mysql = "SELECT * from product where id='$id'";
$stmt = $conn->prepare($mysql);
$stmt ->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sql="SELECT * FROM galleries WHERE product_id='$id' ORDER BY id DESC limit 6";
$stmt = $conn->prepare($sql);
$stmt ->execute();
$gallery = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sqli="SELECT * FROM product WHERE id_cate= '$id_cate' AND id !='$id' ORDER BY rand() limit 6";
$stmt=$conn->prepare($sqli);
$stmt->execute();
$joincate= $stmt->fetchAll(PDO::FETCH_ASSOC);

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
						<?php foreach ($gallery as $item):?>
							<div class="product-preview">
								<img src="admin/gallery/<?=$item['url']?>" alt="">
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
								<h3 class="product-price"><?php echo number_format($intro['sale_price']);  ?>đ<del class="product-old-price"><?php echo number_format($intro['price']);  ?>đ</del></h3>
								<span class="product-available"> Số lượng: <?=$intro['amount']?></span>
							</div>
							<p><?=$intro['detail']?></p>

							<div class="add-to-cart">
								<!-- <div class="qty-label">
									Qty
									<div class="input-number">
										<input type="number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div> -->
								<button class="add-to-cart-btn"><a href="add-cart.php?masp=<?php echo $intro['id'] ?>" onclick="return confirm('Đã thêm vào giỏ hàng của bạn thành công !')"><p>Thêm vào giỏ</p></button></a>
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
							<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
						</ul>
						<!-- /product tab nav -->

						<!-- product tab content -->
					</div>
				</div>
			</div>

			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
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
							</div>

							<!-- tab3  -->
						</div>
					</div>
				</div>
				<br>
				<hr>
				<div class="section">
					<!-- container -->
					<div class="container">
						<!-- row -->
						<div class="row">
							<div id="tab3" class="tab-pane fade in">
								<div class="row">
											
									<div id="comment">
								<?php 
								$sql_all_bl = "SELECT * FROM comment WHERE id = '$id' ORDER BY id_comment DESC limit 5";
								$stmt_all_bl = $conn->prepare($sql_all_bl);
								$stmt_all_bl->execute();
								$col = $stmt_all_bl->fetchALL(PDO::FETCH_ASSOC);
								?>
										
									</div>
									
								

									<!-- Reviews -->

								</div>
								<div class="col-md-6">
									<?php 
										foreach ($col as $cmt) {
											# code...
										
									 ?>
									<div id="reviews">
										<ul class="reviews">
											<li>
												<div class="review-heading">
													<h5 class="name"><?=$cmt['username']?></h5>
													<p class="date"><?=$cmt['date_bl'] ?></p>
													<div class="review-rating">
														<?php 
									for($i = 1; $i <= 5; $i++){
										if($cmt['rating'] >= $i){
											$star = "fa fa-star";
										}else{
											$star = "fa fa-star-o";
										}
										?>
										<i class="<?php echo $star ?>"></i>
										<?php
									}
									?>
													</div>
												</div>
												<div class="review-body">
													<p><?=$cmt['content']?></p>
												</div>
											</li>
											
										</ul>

									</div>
									<?php } ?>
								</div>
								
								<!-- /Reviews -->
								
								<?php 
								
						$message = "";
						if (isset($_POST['create_bl'])) {
							if (isset($_SESSION['username'])) {
								extract($_REQUEST);
								$username = $_SESSION['username'];
								
								if (empty($content)) {
									$message = "Bạn chưa nhập bình luận !";
								}

							}else{
							// 		echo "<script>alert('Bạn cần đăng nhập để bình luận')</script>";
								$message = "Bạn phải đăng nhập thì mới có thể bình luận !";
							}

							if ($message == "") {
									$date_bl = date('Y/m/d');
									
									$sql_bl = "INSERT INTO comment(content,date_bl,rating,username,id) VALUES('$content','$date_bl','$rating','$username','$id')";
									$stmt_bl = $conn->prepare($sql_bl);
									$stmt_bl->execute();

									if ($stmt_bl->rowCount() >0) {
										echo "<meta http-equiv='refresh' content='0'>";
									}else{
										$message = 'Thất bại !';
									}
								}
						}
					?>


								<!-- Review Form -->
								<div class="col-md-3">
									<div style="color: red"><? $message ?></div>
									<div id="review-form">
										<form class="review-form" action="" method="post">
											
											<textarea class="input" name="content" placeholder="Your Review"></textarea>
											<div class="input-rating">
												<span>Your Rating: </span>
												<div class="stars">
													<input id="star5" name="rating" value="5" type="radio"><label for="star5" name="rating" value="5"></label>
													<input id="star4" name="rating" value="4" type="radio"><label for="star4" name="rating" value="4"></label>
													<input id="star3" name="rating" value="3" type="radio"><label for="star3" name="rating" value="3"></label>
													<input id="star2" name="rating" value="2" type="radio"><label for="star2" name="rating" value="3"></label>
													<input id="star1" name="rating" value="1" type="radio"><label for="star1" name="rating" value="1"></label>
												</div>
											</div>
											<button class="primary-btn" name="create_bl">Submit</button>
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
<hr>
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<!-- row -->
				<div class="section-title text-center">
					<h3 class="title">SẢN PHẨM LIÊN QUAN</h3>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">

								<?php
								foreach ($joincate as $relate):?>
									<div class="product">
										<div class="product-img">
											<img src="img/<?=$relate['image']?>" alt="">
										</div>

										<div class="product-body">
											<p class="product-category"><?php echo $relate['id_cate'] ?></p>
											<h3 class="product-name"><a href="product.php?id=<?=$relate['id']?> && id_cate=<?=$relate['id_cate']?>"><?php echo $relate['nameproduct'] ?></a></h3>
											<h4 class="product-price"><?php echo number_format($relate['sale_price']) ?>VN <del><span style="font-size:10px "><?php echo number_format( $relate['price'] )?>vnd</span></del></h4>
											<div class="product-rating">
												<?php 
												for($i = 1; $i <= 5; $i++){
													if($relate['rating'] >= $i){
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
												<a href="product.php?id=<?=$relate['id']?> && id_cate=<?=$relate['id_cate']?>"><button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"> QUICK VIEW</span></button></a>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn"><a href="add-cart.php?masp=<?php echo $product['id'] ?>" onclick="return confirm('Đã thêm vào giỏ hàng của bạn thành công !')"><p>Thêm vào giỏ</p></button></a>
										</div>
									</div>
									<?php
								endforeach;
								?>

							</div>
							<!-- /product -->

						</div>
						<!-- /row -->
					</div>
					<!-- /container -->
				</div>
			</div>
		</div>
	</div>
</div>
				<!-- /Section -->
				<!-- FOOTER -->
<?php include("share/footer.php"); ?>


</body>
</html>