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
                                    <table class="table product-list" style="height: auto;">
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
                                                             <a class="btn btn-danger btn-sm" href="remove_cart_item.php?id=<?php echo $item['id'] ?>" onclick="return confirm('Bạn muốn xóa sản phẩm ?')">
                                                                <i class="fa fa-trash"></i>
                                                                </a>
                                                            <a href="#">
                                                                <img src="img/<?php echo $item['feature_image'] ?>" alt="" style="width: 150px; height: auto;">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td><a href="#"><?php echo $item['name'] ?></a>
                                                    </td>
                                                    <td>
                                                        <div class="cart-action">
                                                             <form action="update-cart.php?id=<?php echo $item['id'] ?>&url=<?php echo $_SERVER['REQUEST_URI']?>" method="post">
                                                            <button type="" name="reduction">-</button>
                                                            <input style="width: 30px; text-align: center;" type="text" name="quantity" readonly="" value="<?php echo $item['quantity'] ?>" class="quantity_input"  />
                                                            <button type="" name="increase" style="float: right; position: none; margin-top: -45px;margin-right: -20px;">+</button>
                                                            </form>
                                                                
                                                                
                                                        </div>
                                                       
                                                    </td>
                                                    <td><?php echo number_format($item['sale_price']); ?> vnđ</td>
                                                    <td><?php 
                                                    $itemTotal = $item['sale_price']*$item['quantity'];
                                                    $totalPrice += $itemTotal;

                                                    echo number_format($itemTotal); ?> vnđ</td>
                                                </tr>
                                            <?php endforeach ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="clearfix text-right">
                                    <span><b>Tổng thanh toán:</b></span>
                                    <li>
                                    </strong></span>  <strong class="cart-total"><?php echo number_format($totalPrice); ?> vnđ </strong>
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
			<!-- <div class="row">
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
			</div> -->
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /NEWSLETTER -->

	<!-- FOOTER -->
<?php include("share/footer.php"); ?>


</body>
</html>