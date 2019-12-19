<?php 
	include'includes/check_login.php';
	include('includes/header.php'); 
	require_once "../db.php";
	// include "../include/quan_tri.php";
	if (isset($_GET['id_order'])) {
		$id_order = $_GET['id_order'];
		$sql = "SELECT * from cart where id_order = '$id_order'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

?>

<div class="row">
	<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<button style="float: right; text-decoration: none; color: #fff; margin-top: 	20px; margin-right: 	30px;">	<a href="them_user.php" style="color: black"> Thêm tài khoản </a></button> -->
		<h3>Chi tiết hóa đơn</h3>

		<table class="table table-hover">
			<thead>
				<tr align="center">
					<th>Tên khách hàng</th>
					<!-- <th>id-user</th> -->
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>Tổng tiền</th>
					
					


				</tr>
			</thead>
			<tbody>
				<?php
					//đổ dữ liệu ra
					foreach($result as $row){
						$total = number_format($row['totalPrice'], 0, '', ',');
					?>
						<tr>
							
							<td><?= $row['name_user'] ?></td> 
							<td><?= $row['address'] ?></td>
							<td><?= $row['phone'] ?></td>

							<td><?= $total ?> VND</td>
							<!-- <td>
								<?php
									if($row['status'] == 1){
										?>
											<option value="<?= $row['status'] ?>">Đã hoàn thành</option>
										<?php
									}else{
										?>
											<option value="<?= $row['status'] ?>">Chưa hoàn thành</option>
										<?php
									}
								?>
							</td> -->
							
						</tr>

					<?php
					}
				?>
				<button><a href="update.php?id_order=<?= $row['id_order'] ?>" OnClick="return confirm('Xác nhận hoàn thành đơn hàng');">Xác nhận hoàn thành đơn hàng  </a></button>
			</tbody>
		</table>
	</div>
</div>
<?php include ('includes/footer.php');?>