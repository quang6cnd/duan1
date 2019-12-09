
<?php
include'includes/check_login.php';
include('includes/header.php');
// include "../include/quan_tri.php";
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <?php 
      require_once "../db.php";
      $select = "SELECT * from categories";
      $stmt = $conn->prepare($select);
      $stmt->execute();
      $categories= $stmt->fetchAll(PDO::FETCH_ASSOC);
      $mess = "";
       if(isset($_POST['frmadd_danhmuc'])){

          extract($_REQUEST);
         if(empty($name_cate)){
            $mess = "Chưa nhập danh mục";
          }else if(empty($ordernum)){
            $mess = "Chưa nhập thứ tự hiển thị";
          }else if(empty($show_menu)){
            $mess = "Chưa tích trạng thái";
          }else{
            //Tiến thành thêm slide
            $create_dm = "INSERT into categories(name_cate, ordernum, show_menu) values( '$name_cate', '$ordernum', '$show_menu')";
            $stmt = $conn->prepare($create_dm);
            $stmt->execute();
            //Check
            if($stmt->rowCount() > 0){
  
              $mess = " Thêm Thành Công !";
          
            }else{
              $mess = "Tạo không thành công";
            }
          }
        }

    ?>
    <form moaction="" name="frmadd_danhmuc" method="POST">
     <?php 
	if (isset($mess)) {
		echo $mess;
	}
     ?>
     <h2>Thêm mới danh mục sản phẩm</h2>
     <div class="form-group">
      <label for="">Danh mục sản phẩm</label>
      <input type="text" name="name_cate" class="form-control" placeholder="Danh mục sản phẩm">
      <?php 
              //if (isset($errors) && in_array('danhmuc',$errors))//kiểm tra mảng error có tôn tại ko và danhmuc có thuộc mảng lỗi này ko 
              //{
              	//echo "<p class='required'>Bạn chưa nhập Danh mục</p>";
              //}
      ?>
    </div>

    <div class="form-group">
     <label for="">Thứ tự</label>
     <input type="text" name="ordernum" class="form-control" placeholder="Thứ tự">
   </div>
   <div class="form-group">
     <label for="" style="display: block;">Trạng thái</label>
     <label for="" class="radio-inline"><input type="radio" name="show_menu" value="1" checked="checked">Hiển thị</label>
     <label for="" class="radio-inline"><input type="radio" name="show_menu" value="0">Không hiển thị</label>
   </div>
   <input type="submit" name="frmadd_danhmuc" class="frmadd_danhmuc" value="Thêm">
 </form>
</div>
</div>
<?php
include('includes/footer.php');
?>

