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
<?php 
require_once "../db.php";
// include "../include/quan_tri.php";
//Lấy id trên đường dẫn và xóa theo id của nó
if(isset($_GET['id'])){
		$id = $_GET['id'];
		//xóa bình luận
		$delete_bl = "DELETE FROM comment WHERE id='$id'";
		$stmt = $conn->prepare($delete_bl);
		$stmt->execute();
		//Kiểm tra xóa thành công hay chưa
		if($stmt->rowCount() > 0){
		}else{
			echo "<script>alert('Không thể xóa bình luận')</script>";
		}
		//xóa tài khoản
		$delete_kh = "DELETE FROM users WHERE id='$id'";
		$stmt = $conn->prepare($delete_kh);
		$stmt->execute();
		//Kiểm tra nếu xóa thành công thì chuyển trang view
		if($stmt->rowCount() >0){
			header('location: list_user.php');
		}else{
			echo "<script>alert('Không thể xóa tài khoản')</script>";
		}
	}
?>