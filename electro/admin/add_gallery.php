<?php 
include'includes/check_login.php';
require_once '../db.php';
require_once '../commons/constants.php';
require_once '../commons/helpers.php';
if (isset($_POST['submit'])) {
	$product_id= $_POST['product_id'];
	$image="";
	$image_text=$_POST['image_text'];

	if(isset($_FILES['file']['name'])){
		$filename=$_FILES['file']['name'];
		$fileType=$_FILES['file']['type'];
		$fileSize=$_FILES['file']['size'];
		$fileTmpName=$_FILES['file']['tmp_name'];
		$fileErro=$_FILES['file']['error'];
		if ($fileErro===0) {
			if ($fileSize<=1000000) {
				$fileDestination="gallery/".$filename;
				if(move_uploaded_file($fileTmpName,$fileDestination)){
					echo "đã cập nhập ảnh thành công";  
				}else{
					echo "cập nhật ảnh thất bại";
				}
			}else{
				echo "Mời bạn chọn file ảnh dưới 1 GB";
			}
		}

	}

	if (empty($product_id) || empty($image_text) ) {
		echo "Không được để rỗng";
	}

	$mysql="INSERT INTO galleries(product_id,url,image_text) VALUES('$product_id','".$filename."','$image_text')";
	$stmt=$conn->prepare($mysql);
	$stmt->execute();
	if ($stmt->rowCount()>0) {
		echo "upload thành công";
		include("gallery.php");
	}else{
		echo "upload thất bại . Mời kiểm tra lại";
	}
}





?>