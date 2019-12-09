<?php 
	include 'db.php';
	session_start();
	$message = '';
	$check_user = "";
	$sql = "SELECT * FROM users";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchALL(PDO::FETCH_ASSOC);

	if (isset($_POST['login'])) {
		extract($_REQUEST);
		$new_pass = md5($password);

		// Check tài khoản tồn tại không
		foreach ($result as $row) {
				if ($row['username'] != $username) {
					$check_user = 'false';
				}else{
					$check_user = '';
					break;
				}
			}

		if (empty($username)) {
			$message = "Bạn chưa nhập tài khoản !<br>";
		}elseif($check_user == 'false'){
			$message .= "Tài khoản không tồn tại !<br>";
		}

		
		$sql_check_tk = "SELECT * FROM users WHERE username = '$username'";
		$stmt_check_tk = $conn->query($sql_check_tk)->fetch();

		if (empty($password)) {
			$message .= "Bạn chưa nhập mật khẩu !<br>"; 
		}elseif($new_pass != $stmt_check_tk['password']){
			$message .= "Mật khẩu không đúng !<br>";
		}

		if ($stmt_check_tk['username'] == $username && $stmt_check_tk['password'] == $new_pass) {
			
			
			if ($stmt_check_tk['status'] == '1') {
				header('location: index.php');
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $new_pass;
			}elseif($stmt_check_tk['status'] == '0'){
				echo "<script>alert('tài khoản hoặc mật khẩu không đúng')</script>";
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $new_pass;
			}
		}else{
			$message .= "Đăng nhập thất bại !";
		}
		//
	}

?>
