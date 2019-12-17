
<?php 
include'includes/check_login.php';
require_once "../db.php";
// include "../include/quan_tri.php";
if(isset($_GET['id_order'])){
		$id_order = $_GET['id_order'];
		$delete_dh = "DELETE from cart where id_order = $id_order";
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
