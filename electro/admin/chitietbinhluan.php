<?php 
	include'includes/check_login.php';
 	include('includes/header.php');
	require_once "../db.php";
	// include "../include/quan_tri.php";

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "SELECT * from comment where id = '$id'";
		$stmt = $conn->query($sql);
	}
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Chi tiết bình luận</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>STT</th>
				<!-- 	<th>Ảnh đại diện</th> -->
					<th>Tên người dùng</th>
					<th>Nội dung</th>
					<th>Thời gian</th>
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
							<td><?= $row['username'] ?></td>
							<!-- <td><img style="width: 70px" src="../img/<?= $row['image'] ?>" alt=""></td> -->
							<td><?= $row['content'] ?></td>
							<td><?= $row['date_bl'] ?></td>
							
							<td class="action">
								<a href="xoa_comment.php?id_comment=<?= $row['id_comment'] ?>">Xóa</a>
							</td>
						</tr>
					<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include ('includes/footer.php');?>