<?php include('includes/header.php'); 
	require_once "../connection.php";
	include "../include/quan_tri.php";
	$select = "SELECT * from cart";
	$stmt = $conn->prepare($select);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="row">
	<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<button style="float: right; text-decoration: none; color: #fff; margin-top: 	20px; margin-right: 	30px;">	<a href="them_user.php" style="color: black"> Thêm tài khoản </a></button> -->
		<h3>Danh sách hóa đơn</h3>

		<table class="table table-hover">
			<thead>
				<tr align="center">
					<th>id</th>
					<!-- <th>id-user</th> -->
					<th>Họ tên</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>Ngày đặt</th>
					<th>Tổng</th>
					<th>Trạng thái</th>
					<th width="150">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					//đổ dữ liệu ra
					foreach($result as $row){
						$total = number_format($row['total'], 0, '', ',');
					?>
						<tr>
							<td><?= $row['id'] ?></td>
							<!-- <td><?= $row['id_user'] ?></td> -->
							<td><?= $row['name_user'] ?></td>
							<td><?= $row['address'] ?></td>
							<td><?= $row['phone'] ?></td>
							<td><?= $row['date'] ?></td>
							<td><?= $total ?> VND</td>
							<td>
								<?php
									if($row['status'] == 0){
										?>
											<option value="<?= $row['status'] ?>">Đã hoàn thành</option>
										<?php
									}else{
										?>
											<option value="<?= $row['status'] ?>">Chưa hoàn thành</option>
										<?php
									}
								?>
							</td>
							<td class="action">
								<a href="#?id=<?= $row['id'] ?>">Chi tiết | </a>
								<a href="xoa_donhang.php?id=<?= $row['id'] ?>" OnClick="return confirm('Xóa đơn hàng này ?');">Xóa</a>
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