
     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<?php  
include'includes/check_login.php';
include('includes/header.php');
// include "../include/quan_tri.php"; 


?>
<?php
      require_once "../db.php";
      $select = "SELECT * from slide";
      $stmt = $conn->prepare($select);
      $stmt->execute();
      $slide = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $mess = "";
      //Thêm slide
        if(isset($_POST['btn_slide'])){
        extract($_REQUEST);
      //ảnh
              if($_FILES['anh']['name'] == ""){
            //nếu không chọn ảnh thì dùng ảnh cũ
            $image = $anhcu;
            echo $anhcu;
          }else{
            $image = $_FILES['anh']['name'];
             move_uploaded_file($_FILES['anh']['tmp_name'], "../slide/" . $image);
          }

        if(empty($detail)){
          $mess = "Chưa nhập tiêu đề";
        }else if(empty($link)){
          $mess = "Chưa nhập link";
        }else if($status != 1 && $status != 0){
          $mess = "Chưa tích trạng thái";
        }else{
        //Tiến thành thêm slide
         $stmt = $conn->prepare("UPDATE slide set detail='$detail', image='$image', link='$link', status=$status where id_slide=$id_slide");
            $stmt->execute();
        //Check
          if($stmt->rowCount() > 0){
            $mess = "Sửa thành công!";
            
          }else{
            $mess = "Sửa Slide không thành công";
          }
        }
      }

          if(isset($_GET['id_slide'])){
          $id_slide = $_GET['id_slide'];
          $stmt = $conn->prepare("SELECT * from slide where id_slide=$id_slide");
          $stmt->execute();
          $slide = $stmt->fetch();
        }
?>
          <form moaction="" name="frmadd_slider" method="POST" enctype="multipart/form-data">
            <?php
            if ($mess != "") {
                echo $mess;
            }
        ?>
            <h2>Sửa slider</h2>
            <div class="form-group">
              <label for="">Title</label>
              <input type="text" name="detail" class="form-control" value="<?=$slide['detail']?>">
            </div>
            <div class="form-group">
              <label for="">Ảnh</label>
              <input type="hidden" name="anhcu" value="<?=$slide['image']?>">
              <input type="file" name="anh" value="">
            </div>
            <div class="form-group">
              <label for="">Link</label>
              <input type="text" name="link" class="form-control" value="<?=$slide['link']?>">
            </div>
           
            <div class="form-group">
              <label for="" style="display: block;">Trạng thái</label>
              <label for="" class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
              <label for="" class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
            </div>
            <input type="submit" name="btn_slide" class="btn_slide" value="Sửa">
          </form>
      </div>
</div>
<?php
include('includes/footer.php');
?>

