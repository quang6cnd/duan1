<style type="text/css">
	.baoloi{
		color: red;
	}
</style>
<?php
include "../include/quan_tri.php";
include('includes/header.php');
require_once "../connection.php";
$select = "SELECT * from users";
$stmt = $conn->prepare($select);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
$mess = "";
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?php 
		if(isset($_POST['btn_user'])){
			extract($_REQUEST);
       //Ảnh
			if($_FILES['avatar']['name'] == ""){
				$image = $avt;
				echo $avt;
			}else{
				$image = $_FILES['avatar']['name'];
				move_uploaded_file($_FILES['avatar']['tmp_name'], "../img/".$image);
			}








    ///Kiểm tra
			if($username == "" || $name == "" || $status != 0 && $status != 1 || $role != 0 && $role != 1){
				$mess = "Vui lòng điền đầy đủ thông tin cần thiết";
			}else{
      //Sql create
				$update_kh = "UPDATE users set username='$username', name='$name', image='$image', email='$email', role='$role' ,status='$status' where id='$id'";
				$stmt = $conn->prepare($update_kh);
				$stmt->execute();
      //Check
				if($stmt->rowCount() > 0){
      //Chuyển trang
					// header('location: list_user.php');
					$mess = "Sửa Thành Công !" ;
				}else{
					$mess = "Không sửa dữ liệu";
				}
			} 
		}
		if(isset($_GET['id'])){
          $id = $_GET['id'];
          $stmt = $conn->prepare("SELECT * from users where id=$id");
          $stmt->execute();
          $users = $stmt->fetch();
        }
		?>
		<form moaction="" name="btn_user" method="POST" enctype="multipart/form-data">
			<?php 
			if (isset($mess)) {
				echo $mess;
			}
			?>
			<h2>Sửa tài khoản</h2>
			<div class="form-group">
				<label for="">Tài khoản</label>
				<input type="text" name="username" class="form-control" value="<?=$users['username']?>">
			</div>
			<div class="form-group">
				<label for="">Họ Tên</label>
				<input type="text" name="name" class="form-control" value="<?=$users['name']?>">
			</div>
			<div class="form-group">
				<label for="">email</label>
				<input type="email" name="email" class="form-control" value="<?=$users['email']?>">
			</div>
			<div class="form-group">
				<label for="">Ảnh</label>
				<input type="hidden" name="avt" value="<?= $users['image'] ?>">
				<!-- <img src="../img/<?= $users['image'] ?>" alt="" name="avt"> -->
				<input type="file" name="avatar" value="">
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