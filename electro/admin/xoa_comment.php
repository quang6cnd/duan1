<?php 
include'includes/check_login.php'; 
require_once "../db.php";
// include "../include/quan_tri.php";
if(isset($_GET['id_comment'])){
		$id_comment = $_GET['id_comment'];
		//xóa bình luận trước
		$delete_bl = "DELETE from comment where id_comment=$id_comment";
		$sttt = $conn->prepare($delete_bl);
		$sttt->execute();
		//Kiểm tra nếu xóa thành công thì chuyển trang view
		if($sttt->rowCount()>0){
			header('location: dsbinhluan.php');
		}else{
			echo "Không thể xóa bình luận";
		}
	}
 ?>
