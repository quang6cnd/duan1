<?php 
include'includes/check_login.php';
require_once "../db.php";
// include "../include/quan_tri.php";
if(isset($_GET['id_slide'])){
		$id = $_GET['id_slide'];
		$delete_sl = "DELETE from slide where id_slide = $id";
		$stmt = $conn->prepare($delete_sl);
		$stmt->execute();
		//Check
		if($stmt->rowCount() > 0){
			header('location: list_slider.php');
		}else{
			echo "Không thể xóa slide";
		}
	}
 ?>
