<?php 
require_once "../connection.php";
include "../include/quan_tri.php";
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
