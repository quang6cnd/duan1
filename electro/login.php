<?php
	require_once "connection.php";
	session_start();
	$mess = "";

	if(isset($_POST['btn_login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM users WHERE username='$username'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($username == "" && $password == ""){
			$mess = "Vui lòng điền đầy đủ tài khoản và mật khẩu";
		}
		
		if($username == $user['username']){
			if($password == $user['password']){
				if(isset($_POST['remember'])){
					$_SESSION['user'] = $user['username'];
					$_SESSION['role'] = $user['role'];
				}else{
					setcookie("user", $user['username'], time() + (3600), "/");
					setcookie("role", $user['role'], time() + (3600), "/");
					//Lưu tài khoản trong 15 phút
				}
				//Chuyển trang phân quyền
				if($user['role'] == 1){
					header('location: admin/');
				}else{
					header('Location: ' . $_SERVER['HTTP_REFERER']);
				}
			}else{
				$mess = "Sai mật khẩu";
			}
		}else{
			$mess = "Sai tài khoản";
		}
	}
?>

<form class="form-horizontal loginFrm" method="post" autocomplete="off">
	<div class="control-group">
		<p style="font-size: 11px; color: #F00;"><?=$mess?></p>
	</div>
	<div class="control-group">
		<input type="text" name="username" placeholder="Tên tài khoản">
	</div>
	<div class="control-group">
		<input type="password" name="password" placeholder="Mật khẩu">
	</div>
	<div class="control-group">
		<label class="checkbox">
			<input type="checkbox" name="remember"> Nhớ tài khoản
		</label>
	</div>
	<input type="submit" name="btn_login" class="btn btn-success" value="Đăng nhập" onclick="return kiemtra()">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
</form>