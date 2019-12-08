<?php 
session_start();
if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];
$sql_tk = "SELECT * FROM users WHERE username = '$username'";
$stmt_tk = $conn->query($sql_tk)->fetch();

if ($stmt_tk['role'] == "0") {
  header('location: ../index.php');
}
}
 ?>
<?php 
include('includes/header.php');
require_once "../db.php";
// include "../include/quan_tri.php";

?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Thông tin tài khoản
		</h1>
		<!-- <ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard
			</li>
		</ol> -->
		<table border="0" cellspacing="0" cellpadding="5" width="800" >
			<tr>
				<td rowspan="9"><img src="../images/user.png" alt="" width="200" height="170"><br>
		</td>
				<th>Họ:</th>
				<td>Trần Văn </td>
			</tr>
			<tr>
				<th>Tên:</th>
				<td>Quang</td>
			</tr>
			<tr>
				<th>Tên Đăng Nhập:</th>
				<td>admin</td>
			</tr>
			
			<tr>
				<th>Số Điện Thoại:</th>
				<td>0359316477</td>
			</tr>
			<tr>
				<th>Giới Tính:</th>
				<td>Nam</td>
			</tr>
			<tr>
				<th>Ngày Sinh:</th>
				<td>21/06/2000</td>
			</tr>
			<tr>
				<th>Email:</th>
				<td><a href="mailto:quang6cnd@gmail.com">quang6cnd@gmail.com</a></td>
			</tr>
			<tr>
				<th>Địa chỉ:</th>
				<td>Nam Định - Giao Thủy</td>
			</tr>
			<tr>
				<th>Quyền:</th>
				<td>Administrator</td>
			</tr>
		</table>
	</div>
</div>
<!-- /.row -->
<?php
include ('includes/footer.php');
?>
<?php  ?>