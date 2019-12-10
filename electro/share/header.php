<?php 
require_once"db.php";
require_once './commons/constants.php';
require_once './commons/helpers.php';
$sql="select *from categories where show_menu= 1";
$stmt=$conn->prepare("$sql");
$stmt->execute();
$cate=$stmt->fetchAll(PDO::FETCH_ASSOC);

$cart = isset($_SESSION['CART']) ? $_SESSION['CART'] : [];
$totalPrice = 0;
    // var_dump($cart);die;


?>
<header>
	<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<ul class="header-links pull-left">
				<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
				<li><a href="#"><i class="fa fa-envelope-o"></i> Laptophyq@email.com</a></li>
				<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
			</ul>
			<ul class="header-links pull-right">
				<li><a href="signin.php"><i class="fa fa-user-o"></i>
						<?php 
							if (isset($_SESSION['username'])) {
										$username = $_SESSION['username'];
										$sql_tk = "SELECT * FROM users WHERE username = '$username'";
										$stmt_tk = $conn->query($sql_tk)->fetch();
						?>

					</a>

				</li>
					<li style="color: #fff"> Xin chào <?php echo $username; ?></li>
					<li><a href="logout.php" title="">Đăng xuất</a></li>
					<?php
						}else{
					?>
						<a href="signin.php" style="color: #000"><button>Đăng nhập</button></a>
						
					<?php
						}

					?>
			</ul>
		</div>
	</div>
	<!-- /TOP HEADER -->

	<!-- MAIN HEADER -->
	<div id="header">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-3">
					<div class="header-logo">
						<a href="index.php" class="logo">
							<img src="./img/logo.png" alt="">
						</a>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
						<form action="search.php" method="post">
									<!-- <select class="input-select">
										<option value="0">All Categories</option>
									</select> -->
									<input class="input" placeholder="Search here" name="srchTxt">
									<button class="search-btn" type="submit" name="btn_search">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->

								<!-- /Wishlist -->

								<!-- Cart -->
									<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" >
										<i class="fa fa-shopping-cart"></i>
										<span><a href="product_summary.php">Your Cart</a></span>
										<!-- <div class="qty"> </div> -->
									</a>
		<!-- 							<?php foreach ($cart as $item): ?>
									<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="img/<?php echo $item['feature_image'] ?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><?php echo $item['name'] ?></h3>
													<h4 class="product-price"></span><?php echo number_format($item['sale_price']); ?>.000 vnđ</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="img/<?php echo $item['feature_image'] ?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><?php echo $item['name'] ?></h3>
													<h4 class="product-price"></span><?php echo number_format($item['sale_price']); ?>.000 vnđ</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-btns">
											<a href="product_summary.php">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->
							<!-- <?php endforeach ?>  -->
								<!-- Menu Toogle -->
								<!-- <div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div> -->
								<!-- /Menu Toogle -->
								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				
				<div id="responsive-nav">

					<!-- NAV -->

					<?php foreach ($cate as $value) { ?>
						<ul class="main-nav nav navbar-nav">

							<li style="margin-left: 80px;font-family: tahoma;"><a href="store.php?id_cate=<?php echo $value['id_cate'] ?>"><?php echo $value['name_cate'] ?></a></li>
						</ul>
					<?php } ?>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>