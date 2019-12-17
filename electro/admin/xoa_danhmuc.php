<?php 
include'includes/check_login.php';
require_once "../db.php";
// include "../include/quan_tri.php";
if(isset($_GET['id_cate'])){
		$id_cate = $_GET['id_cate'];
		$delete_dm = "DELETE from categories where id_cate = $id_cate";
		$stmt = $conn->prepare($delete_dm);
		$stmt->execute();
			//xóa mã hàng hóa
		$delete_hh = "DELETE FROM product WHERE id_cate=$id_cate";
		$stmt = $conn->prepare($delete_hh);
		$stmt->execute();
		//xóa bình luận 
		$delete_bl = "DELETE from comment where id=$id";
		$sttt = $conn->prepare($delete_bl);
		$sttt->execute();
		//Check
		if($stmt->rowCount() > 0){
			header('location: list_danhmucsp.php');
		}else{
			echo "Không thể xóa danh mục";
		}
	}
 ?>
