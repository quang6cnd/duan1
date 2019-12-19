
<style type="text/css">
	.baoloi{
		color: red;
	}
</style>
<?php
      include'includes/check_login.php';
      include('includes/header.php');
      require_once "../db.php";
      $select = "SELECT * from users";
      $stmt = $conn->prepare($select);
      $stmt->execute();
      $slide = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $mess = "";
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?php 
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
    if($user == "" || $name == "" || $password == "" || $status != 0 && $status != 1 ){
      $mess = "Vui lòng điền đầy đủ thông tin cần thiết";
    }else if($xac_nhan != $password){
      $mess = "Mật khẩu không trùng khớp";
    }else{
      $new_pass = md5($password);
      $create_kh = "INSERT into admin(user, password, name, status, image, email, role) values('$user', '$new_pass', '$name', '$status', '$image', '$email', '$1')";
      $stmt = $conn->prepare($create_kh);
      $stmt->execute();
      //Check
      if($stmt->rowCount() > 0){
      //Chuyển trang
       
          
          $mess = "Thêm Thành Công !" ;
      }else{
        $mess = "Không thể thêm dữ liệu";
      }
    } 
  }
   ?>
		<form moaction="" name="btn_user" method="POST" enctype="multipart/form-data">
      <?php 
        if (isset($mess)) {
          echo $mess;
        }
        ?>
            <h2>Thêm mới tài khoản</h2>
            <div class="form-group">
              <label for="">Tài khoản</label>
              <input type="text" name="user" class="form-control" placeholder="username">
            </div>
            <div class="form-group">
              <label for="">Họ Tên</label>
              <input type="text" name="name" class="form-control" placeholder="Họ tên">
            </div>

            
            <div class="form-group">
              <label for="">Mật khẩu</label>
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="">Xác nhận mật khẩu</label>
              <input type="password" name="xac_nhan" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="">email</label>
              <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="">Ảnh</label>
              <input type="file" name="anh" value="">
            </div>
            
           
            <div class="form-group">
              <label for="" style="display: block;">Trạng thái</label>
              <label for="" class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
              <label for="" class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
            </div>
              <div class="form-group">
              <label for="" style="display: block;">Quyền</label>
              <label for="" class="radio-inline"><input type="radio" name="role" value="1" checked="checked">admin</label>
              <label for="" class="radio-inline"><input type="radio" name="role" value="0">Khách hàng</label>
            </div>
            <input type="submit" name="btn_user" class="btn_user" value="Thêm">
          </form>
	</div>
</div>
<?php
include('includes/footer.php');
?>