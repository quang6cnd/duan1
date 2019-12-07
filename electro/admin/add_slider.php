
     <div class="row">
	   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<?php  include('includes/header.php');
      include "../include/quan_tri.php";
      require_once "../connection.php";
      $select = "SELECT * from slide";
      $stmt = $conn->prepare($select);
      $stmt->execute();
      $slide = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $mess = "";
      //Thêm slide
        if(isset($_POST['btn_slide'])){

          extract($_REQUEST);
          //ảnh
               $img = ["image/jpeg", "image/jpg", "image/png"];
        if ( $_FILES['anh']['size'] >= 2000000 || in_array($_FILES['anh']['type'], $img) == false ) {
            $message .= "File phải là ảnh có kích thước < 2Mb";
        } else {
            $image = $_FILES['anh']['name'];            
        }

          if(empty($detail)){
            $mess = "Chưa nhập tiêu đề";
          }else if(empty($link)){
            $mess = "Chưa nhập link";
          }else if(empty($status)){
            $mess = "Chưa tích trạng thái";
          }else{
            //Tiến thành thêm slide
            $create_sl = "INSERT into slide(detail, image, link, status) values( '$detail', '$image', '$link', $status)";
            $stmt = $conn->prepare($create_sl);
            $stmt->execute();
            //Check
            if($stmt->rowCount() > 0){
               move_uploaded_file($_FILES['anh']['tmp_name'], "../img/" . $image);
              $mess = " Thêm Thành Công !";
          
            }else{
              $mess = "Tạo Slide không thành công";
            }
          }
        }
?>
          <form moaction="" name="frmadd_slider" method="POST" enctype="multipart/form-data">
             <?php 
        if (isset($mess)) {
          echo $mess;
        }
        ?>
            <h2>Thêm mới slider</h2>
            <div class="form-group">
              <label for="">Title</label>
              <input type="text" name="detail" class="form-control" placeholder="Tiêu đề">
            </div>
            <div class="form-group">
              <label for="">Ảnh</label>
              <input type="file" name="anh" value="">
            </div>
            <div class="form-group">
              <label for="">Link</label>
              <input type="text" name="link" class="form-control" placeholder="Link slider">
            </div>
           
            <div class="form-group">
              <label for="" style="display: block;">Trạng thái</label>
              <label for="" class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
              <label for="" class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
            </div>
            <input type="submit" name="btn_slide" class="btn_slide" value="Thêm">
          </form>
      </div>
</div>
<?php
include('includes/footer.php');
?>

