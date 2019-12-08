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
if(isset($_GET['id_cate'])){
		$id_cate = $_GET['id_cate'];
		$delete_dm = "DELETE from categories where id_cate = $id_cate";
		$stmt = $conn->prepare($delete_dm);
		$stmt->execute();
		//Check
		if($stmt->rowCount() > 0){
			header('location: list_danhmucsp.php');
		}else{
			echo "Không thể xóa danh mục";
		}
	}
 ?>
