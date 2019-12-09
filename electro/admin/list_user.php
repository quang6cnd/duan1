<?php 
	include'includes/check_login.php';
	include('includes/header.php'); 
	require_once "../db.php";
	// include "../include/quan_tri.php";
	$select = "SELECT * from users";
	$stmt = $conn->prepare($select);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="row">
	<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<button style="float: right; text-decoration: none; color: #fff; margin-top: 	20px; margin-right: 	30px;">	<a href="them_user.php" style="color: black"> Thêm tài khoản </a></button> -->
		<h3>Danh sách tài khoản users</h3>

		<table class="table table-hover">
			<thead>
				<tr align="center">
					<th>id</th>
					<th>Username</th>
					<th>Họ tên</th>
					<th>Địa chỉ Email</th>
					<th>Hình ảnh</th>
					<th>Trạng thái</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					//đổ dữ liệu ra
					foreach($result as $row){
					?>
						<tr>
							<td><?= $row['id_user'] ?></td>
							<td><?= $row['username'] ?></td>
							<td><?= $row['name'] ?></td>
							<td><?= $row['email'] ?></td>
							<td><img style="width: 70px; margin: -10px" src="../img/<?= $row['image'] ?>" alt=""></td>
							<td>
								<?php
									if($row['status'] == 0){
										?>
											<option value="<?= $row['status'] ?>">Không hoạt động</option>
										<?php
									}else{
										?>
											<option value="<?= $row['status'] ?>">Hoạt Động</option>
										<?php
									}
								?>
							</td>
							<!-- <td>
								<?php
									if($row['role'] == 0){
										?>
											<option value="<?= $row['role'] ?>">Khách hàng</option>
										<?php
									}else{
										?>
											<option value="<?= $row['role'] ?>">Nhân viên</option>
										<?php
									}
								?>
							</td> -->
							<td class="action">
								<?php
									if($row['role'] == 1){
										?>
										<a href="sua_user.php?id=<?= $row['id'] ?>">Cập nhật</a>
										<?php
									}
								?>
								<?php
									if($row['role'] == 0){
										?>
										&#160;<a href="xoa_user.php?id=<?= $row['id'] ?>" OnClick="return confirm('Xóa Tài khoản này ?');">Xóa</a>
										<?php
									}
								?>
								
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