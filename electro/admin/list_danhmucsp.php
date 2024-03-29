<?php 
	include'includes/check_login.php';
	include('includes/header.php');
	// include "../include/quan_tri.php";
	require_once "../db.php";
	$select = "SELECT * from categories ORDER BY ordernum DESC";
	$stmt = $conn->prepare($select);
	$stmt->execute();
	$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Danh sách Danh mục</h3>
		<table class="table table-hover" >
			<thead>
				<tr align="center">
					<th>ID</th>
					<th>Danh mục</th>
					<th>Thứ tự</th>
					<th>Trạng thái</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
					//đổ dữ liệu ra
					foreach($categories as $row){
						if($row['show_menu'] == 1){
							$showtt = "Bật";
						}else{
							$showtt = "Tắt";
						}
					?>
						<tr>
							
							<td><?= $row['id_cate'] ?></td>
							<td><?= $row['name_cate'] ?></td>
							<td><?= $row['ordernum'] ?></td>
							<td><?= $showtt ?></td>
							<td><a href="sua_danhmuc.php?id_cate=<?= $row['id_cate'] ?>">Thay đổi</a></td>
							<td><a href="xoa_danhmuc.php?id_cate=<?= $row['id_cate'] ?>" OnClick="return confirm('Xóa danh mục này sẽ xóa hết sản phẩm trong danh mục ?');">Xóa</a></td>
						</tr>
						<?php
					}
					?>
			</tbody>
		</table>
	</div>
</div>
<?php include ('includes/footer.php');?>