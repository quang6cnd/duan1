<?php
	require_once "../connection.php";
	
	class Test{

		public function __construct(){
			if(isset($_POST['btn_danhmuc'])){
				$result = $this->myfunction();
			}
		}
		private function myfunction(){
        //some actions
			return "values";
		}
	}
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$stmt = $conn->prepare("SELECT * from khach_hang where ma_kh='$id'");
		$stmt->execute();
		$quantri = $stmt->fetch();
	}
	if(isset($_GET['id_slide'])){
		$id_slide = $_GET['id_slide'];
		$stmt = $conn->prepare("SELECT * from slide where id_slide=$id_slide");
		$stmt->execute();
		$slide = $stmt->fetch();
	}
	if(isset($_GET['id'])){
		$id_product = $_GET['id'];
		$stmt = $conn->prepare("SELECT * from product where id=$id_product");
		$stmt->execute();
		$hanghoa = $stmt->fetch();

		$mtmt = $conn->prepare("SELECT * from product");
		$mtmt->execute();
		$danhmuc = $mtmt->fetchAll(PDO::FETCH_ASSOC);
	}
	if(isset($_GET['ma_kh'])){
		$ma_kh = $_GET['ma_kh'];
		$stmt = $conn->prepare("SELECT * from khach_hang where ma_kh=$ma_kh");
		$stmt->execute();
		$khachhang = $stmt->fetch();
	}
	if(isset($_GET['id_cate'])){
		$ma_loai = $_GET['id_cate'];
		$stmt = $conn->prepare("SELECT * from categories where id_cate=$id_cate");
		$stmt->execute();
		$danhmuc = $stmt->fetch();

		
	}
	$mess = "";
	//Chỉnh sửa slide
	if(isset($_POST['btn_slide'])){
		extract($_REQUEST);
	//ảnh
		if($_FILES['image']['name'] == ""){
			//nếu không chọn ảnh thì dùng ảnh cũ
			$anh = $anhcu;
		}else{
			$anh = $_FILES['image']['name'];
		}
		if(empty($tieu_de)){
			$mess = "Chưa nhập tiêu đề";
		}else if(empty($link)){
			$mess = "Chưa nhập link";
		}else if($anh == ""){
			$mess = "Thiếu ảnh $anh";
		}else if($trang_thai != 1 && $trang_thai != 0){
			$mess = "Chưa tích trạng thái";
		}else{
		//Tiến thành thêm slide
			$create_sl = "UPDATE slide set tieu_de='$tieu_de', anh='$anh', link='$link', trang_thai=$trang_thai where id_slide=$id_slide";
			$stmt = $conn->prepare($create_sl);
			$stmt->execute();
		//Check
			if($stmt->rowCount() > 0){
				header('location: slide.php');
				move_uploaded_file($_FILES['image']['tmp_name'], "../img/".$anh);
			}else{
				$mess = "Tạo Slide không thành công $create_sl";
			}
		}
	}

	//Chỉnh sửa sản phẩm
	if(isset($_POST['btn_sanpham'])){
		extract($_REQUEST);
		//Ảnh
		if($_FILES['anh']['name'] == ""){
			//nếu không chọn ảnh thì dùng ảnh cũ
			$image = $anhcu;
		}else{
			$image = $_FILES['anh']['name'];
		}
		if(empty($detail)){
			$detail = "";
		}
		///Kiểm tra
		if(empty($name)){
  	    $mess = "Vui lòng điền tên hàng hóa";
  		}else if(empty($price)){
    	$mess = "Thiếu đơn giá";
   		}else if($price <= 0){
   	    $mess = "Đơn giá phải lớn hơn 0";
   	 	}else if($sale_price > 100){
  	    $mess = "Giảm giá quá 100 %";
    // }else if(empty($ngay_nhap)){
    //   $mess = "Thiếu ngày nhập";
  		}else if($status != 0 && $status != 1){
      	$mess = "Chưa chọn trạng thái hiện thị";
    	}else if(empty($amount)){
    	$mess = "Chưa nhập số lượng";
   		}else if($amount <= 0){
   	    $mess = "Số lượng lớn hơn 0";
   	 	}else{
			
			//Sql update
			$update_sp = "UPDATE product SET name='$name', price=$price, sale_price=$sale_price, image='$image', deatil='$detail', detail_specifications=$detail_specifications, amount=$amount, id_cate=$id_cate WHERE id=$id";
			$stmt = $conn->prepare($update_sp);
			$stmt->execute();
			//Check
			if($stmt->rowCount() > 0){
			//Chuyển trang
				header('location: index.php');
				move_uploaded_file($_FILES['anh']['tmp_name'], "img/".$image);
				move_uploaded_file($_FILES['anh']['tmp_name'], "../img/".$image);
			}else{
				$mess = "Không thể sửa $update_sp";
			}
		}		
		
	}
	//Chỉnh sửa danh mục
	if(isset($_POST['btn_danhmuc'])){
		extract($_REQUEST);
		if($ten_loai == ""){
			$mess = "Chưa nhập tên danh mục.";
		}else{
		//SQL
			$update_dm = "UPDATE danh_muc set ten_loai='$ten_loai' where ma_loai='$ma_loai'";
			$stmt = $conn->prepare($update_dm);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				header('location: danh_muc.php');
			}else{
				$mess = "Không thay đổi";
			}
		}
	}
	//update tài khoản
	if(isset($_POST['btn_quantri'])){
		extract($_REQUEST);
		//kiểm tra ảnh
		if($_FILES['avatar']['name'] == ""){
			$hinh = $avt;
		}else{
			$hinh = $_FILES['avatar']['name'];
		}
		//kiểm tra
		if(empty($mat_khau)){
			$mess = "Chưa nhập mật khẩu";
		}else if(empty($ho_ten)){
			$mess = "Chưa nhập họ tên";
		}else if(empty($email)){
			$mess = "Chưa nhập email";
		}else{
		//SQL
			$update_quantri = "UPDATE khach_hang set mat_khau='$mat_khau', ho_ten='$ho_ten', hinh='$hinh', email='$email', vai_tro='$vai_tro' where ma_kh='$ma_kh'";
			$stmt = $conn->prepare($update_quantri);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				header('location: tai_khoan.php');
				move_uploaded_file($_FILES['avatar']['tmp_name'], "images/".$hinh);
				move_uploaded_file($_FILES['avatar']['tmp_name'], "../images/user/".$hinh);
			}else{
				$mess = "Không thay đổi tài khoản";
			}
		}
	}

?>
