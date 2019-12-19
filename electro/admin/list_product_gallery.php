<?php 
	include'includes/check_login.php';
	include('includes/header.php');
	require_once "../db.php";
	// include "../include/quan_tri.php";

	
$id = isset($_GET['id']) ? $_GET['id'] : null;
$sql = "select * from galleries where product_id = '$id'";
		$stmt = $conn->query($sql);
	

?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Danh sách gallery</h3>
		<table class="table table-hover">
			
			<thead>
				<tr>
					<th>STT</th>		
					<th>Ảnh</th>

					<th>Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
					//đổ dữ liệu ra
					foreach($stmt as $row){
						
					?>
						<tr>
							
							<td>
								<?php 
									if(isset($i)){
										$i += 1;
									}else{
										$i = 1;
									}

									echo $i;
								?>
							</td>

							<td><img style="height: 100px" src="gallery/<?= $row['url'] ?>" alt=""></td>
							
							<td><a href="xoa_gallery.php?id=<?= $row['id'] ?>" OnClick="return confirm('Xóa ảnh này ?');">Xóa</a></td>
						</tr>
						<?php
					}
				?>
					
			</tbody>
		</table>
	</div>
</div>
<?php include('includes/footer.php') ?>
