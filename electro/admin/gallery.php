<?php 
include'includes/check_login.php';
require_once '../db.php';
require_once '../commons/constants.php';
require_once '../commons/helpers.php';


$sql="SELECT * FROM product where id";
$stmt=$conn->prepare($sql);
$stmt->execute();
$img=$stmt->fetchAll(PDO::FETCH_ASSOC);
$mess="";
?>


<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php") ;?>



<h3>Thêm mới ảnh sản phẩm</h3>

<form action="add_gallery.php" method="post" enctype="multipart/form-data">
	<div style="color: red ; text-align: center;">
						<?=$mess ?> 
					</div>
	<select name="product_id">
		<?php foreach ($img as $pro):?>
			<option value="<?=$pro['id']?>"><?=$pro['nameproduct']?></option>
		<?php endforeach; ?>

	</select><br><br>
	<input type="file"  name="file" required=""><br><br>
	<input type="text" name="image_text" required="" placeholder="thông tin ảnh"><br><br>
	<button type="submit" class="in"  name="submit"><i class="fa fa-sign-in" aria-hidden="true"></i>Thêm ảnh</button><br><br>
</form>
		
</div>
</div>
<?php
include('includes/footer.php');
?>

