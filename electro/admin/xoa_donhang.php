<?php 
require_once "../connection.php";
if(isset($_GET['id'])){
		$id = $_GET['id'];
		$delete_dh = "DELETE from cart where id = $id";
		$stmt = $conn->prepare($delete_dh);
		$stmt->execute();
		//Check
		if($stmt->rowCount() > 0){
			header('location: hoadonban.php');
		}else{
			echo "Không thể xóa slide";
		}
	}
 ?>
