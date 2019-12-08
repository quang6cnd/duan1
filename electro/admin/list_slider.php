<?php 
session_start();
if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];
$sql_tk = "SELECT * FROM users WHERE username = '$username'";
$stmt_tk = $conn->query($sql_tk)->fetch();

if ($stmt_tk['role'] == "0") {
  header('location: ../index.php');
}}
 ?>
<?php include('includes/header.php');
	require_once "../db.php";
	// include "../include/quan_tri.php";
	$select = "SELECT * from slide";
	$stmt = $conn->prepare($select);
	$stmt->execute();
	$slide = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Danh sách ảnh slider</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					
					<th>Mã Slider</th>
					<th>Tiêu đề</th>
					<th>Ảnh</th>
					
					<th>Link</th>
					<th>Trạng Thái</th>
					<th>Sửa</th>
					<th>Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
					//đổ dữ liệu ra
					foreach($slide as $row){
						if($row['status'] == 1){
							$showtt = "Bật";
						}else{
							$showtt = "Tắt";
						}
					?>
						<tr>
							
							<td><?= $row['id_slide'] ?></td>
							<td><?= $row['detail'] ?></td>
							<td><img style="height: 100px" src="../slide/<?= $row['image'] ?>" alt=""></td>
							<td><?= $row['link'] ?></td>
							<td><?= $showtt ?></td>
							<td><a href="sua_slider.php?id_slide=<?= $row['id_slide'] ?>">Thay đổi</a></td>
							<td><a href="xoa_slider.php?id_slide=<?= $row['id_slide'] ?>" OnClick="return confirm('Xóa Slide này ?');">Xóa</a></td>
						</tr>
						<?php
					}
				?>
					
			</tbody>
		</table>
	</div>
</div>
<?php include('includes/footer.php') ?>
