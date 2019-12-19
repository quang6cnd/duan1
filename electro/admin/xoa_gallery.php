<?php 
include'includes/check_login.php';
require_once "../db.php";
// include "../include/quan_tri.php";
if(isset($_GET['id'])){
		$id = $_GET['id'];
		$delete_gl = "DELETE from galleries where id = $id";
		$stmt = $conn->prepare($delete_gl);
		$stmt->execute();
		//Check
		if($stmt->rowCount() > 0){
			header('location: list_sanpham.php');
		}else{
			echo "Không thể xóa gallery";
		}
	}
 ?>
