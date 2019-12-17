<?php 
include'includes/check_login.php'; 
require_once "../db.php";
// include "../include/quan_tri.php";
if(isset($_GET['id_order'])){
	$id_order = $_GET['id_order'];
	//xóa bình luận trước
	$update_order = "UPDATE cart set status='1' where id_order=$id_order";
	$sttt = $conn->prepare($update_order);
	$sttt->execute();
}
header('location: hoadonban.php');
?>