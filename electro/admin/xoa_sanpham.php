<?php 
require_once "../connection.php";
include "../include/quan_tri.php";
if(isset($_GET['id'])){
		$id = $_GET['id'];
		//xóa bình luận trước
		$delete_bl = "DELETE from comment where id=$id";
		$sttt = $conn->prepare($delete_bl);
		$sttt->execute();
		//xóa mã hàng hóa
		$delete_hh = "DELETE FROM product WHERE id=$id";
		$stmt = $conn->prepare($delete_hh);
		$stmt->execute();
		
		//Kiểm tra nếu xóa thành công thì chuyển trang view
		if($stmt->rowCount() >0){
			header('location: list_sanpham.php');
		}else{
			echo "Không thể xóa Sản phẩm";
		}
	}
 ?>
