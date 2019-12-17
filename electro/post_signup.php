<?php session_start();
		  require_once "db.php";
      $select = "SELECT * from users";
      $stmt = $conn->prepare($select);
      $stmt->execute();
      $slide = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $mess = "";

		if(isset($_POST['btn_user'])){
   		 extract($_REQUEST);
    //Ảnh
       //Ảnh
        if($_FILES['anh']['name'] == ""){
          $mess = "Chưa chọn ảnh";
        }else{
          $image = $_FILES['anh']['name'];
          move_uploaded_file($_FILES['anh']['tmp_name'], "../img/".$image);
        }

    ///Kiểm tra
    if($username == "" || $name == "" || $password == "" ){
      $mess = "Vui lòng điền đầy đủ thông tin cần thiết";
    }else if($xac_nhan != $password){
      $mess = "Mật khẩu không trùng khớp";
    }else{
      //Sql create
    	$new_pass = md5($password);
      $create_kh = "INSERT into users(username, password, name,  email, address, phone, image, status) values('$username', '$new_pass', '$name', '$email', 'address', '$phone', '$image','$status')";
      $stmt = $conn->prepare($create_kh);
      $stmt->execute();
      //Check
      if($stmt->rowCount() > 0){
      //Chuyển trang
       
          
          header('location: signin.php');
      }else{
        $mess = "Không thể thêm dữ liệu";
      }
    } 
  }
   ?>