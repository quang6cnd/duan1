
<?php
include('includes/header.php');
// include "../include/quan_tri.php";
require_once "../db.php";
$sttt = $conn->prepare("SELECT product.* , categories.* FROM product INNER JOIN categories ON categories.id = product.id_cate");
$sttt->execute();
$result = $sttt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conn->prepare("SELECT * from categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
$mess = "";

?>
<!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#textarea_tt' });</script> -->
  <style>
    .baoloi{
      color: red;
    }
  </style>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <?php 
    //thêm sản phẩm 
      if(isset($_POST['btn_sanpham'])){
        extract($_REQUEST);
    //Ảnh
        if($_FILES['anh']['name'] == ""){
          $mess = "Chưa chọn ảnh";
        }else{
          $image = $_FILES['anh']['name'];
          move_uploaded_file($_FILES['anh']['tmp_name'], "../img/".$image);
        }

    ///Kiểm tra
        if(empty($nameproduct)){
          $mess = "Vui lòng điền tên hàng hóa";
        }else if(empty($price)){
          $mess = "Thiếu đơn giá";
        }else if($price <= 0){
          $mess = "Đơn giá phải lớn hơn 0";
        }else if($status != 0 && $status != 1){
          $mess = "Chưa chọn trạng thái hiện thị";
        }else if(empty($amount)){
          $mess = "Chưa nhập số lượng";
        }else if($amount <= 0){
          $mess = "Số lượng lớn hơn 0";
        }else{
      //Sql create
          $create_sp = "INSERT into product( nameproduct, price, sale_price, image, detail, detail_specifications, status, amount, id_cate) values( '$nameproduct', '$price', '$sale_price', '$image',  '$detail', '$detail_specifications','$status', '$amount', '$id_cate')";
          $stmt = $conn->prepare($create_sp);
          $stmt->execute();
      //Check
          if($stmt->rowCount() > 0){
      //Chuyển trang
            $mess = "Thêm dữ liệu thành công !";
          }else{
            $mess = "Không thể thêm dữ liệu";
          }
        }   

      } ?>
      <form name="frmadd_sanpham" method="POST" enctype="multipart/form-data">
        <?php 
        if (isset($mess)) {
          echo $mess;
        }
        ?>

        <h3>Thêm mới Sản phẩm</h3>
        <div class="form-group">
          <div style="float: left;">
           <label name = "" id="">Danh mục sản phẩm</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <select name="id_cate" id="" style="">
            <?php
            //Đổ dữ liệu
            foreach ($categories as $r) {
              ?>

              <option value="<?= $r['id']?>"><?=$r['name_cate']?></option>
              
            </div>
            <?php
          }
          ?></select>  
     <!-- <div  style="float: left;">
      <label>Kích cỡ màn hình</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <select name="kcmh" style="display: block;">
         <option value="3243">32-43 inch</option>
         <option value="4455">44-55 inch</option>
         <option value="55">>55 inch</option>
       </select>
     </div>
     <div>
      <label>Độ phân giải</label>
       <select name="dpg" style="display: block;">
         <option value="720">HD 720P</option>
         <option value="1080">Full HD 1080P</option>
         <option value="4k">Ultra HD 4K</option>
       </select>
     </div>
   </div> -->
   <div class="row">
     <div class="form-group col-sm-4">
       <label>Tên sản phẩm</label>
       <input type="text" name="nameproduct" class="form-control" placeholder="Tên sản phẩm" >
     </div>
     <div class="form-group col-sm-4">
       <label>Giá tiền</label>
       <input type="number" name="price" class="form-control" placeholder="Giá sản phẩm" min= "0">
     </div>
     <div class="form-group col-sm-4">
       <label>Khuyến mãi</label>
       <input type="number" name="sale_price" min= "0" class="form-control" placeholder="Khuyến mãi">
     </div>
   </div>
   <div class="row">
     <div class="form-group col-sm-6">
       <label>Thông số</label>
       <textarea id="thongso" name="detail" class="form-control" placeholder="Thông số sản phẩm" rows="5"></textarea>
       <!-- <textarea id="textarea_tt" name="thongso" class="form-control" placeholder="Thông số sản phẩm" rows="5"></textarea> -->
     </div>
     <div class="form-group col-sm-6">
       <label>Thông số chi tiết</label>
       <textarea id="thongsoct" name="detail_specifications" class="form-control" placeholder="Thông số chi tiết" rows="5"></textarea>
     </div>
   </div>
     <!-- <div class="form-group">
       <label>Mô tả</label>
       <textarea id="noidung" name="noidung" class="form-control" placeholder="Mô tả"></textarea>
       <script>
            CKEDITOR.config.filebrowserImageUploadUrl = '{!! route('uploadPhoto').'?_token='.csrf_token() !!}';
        </script>
      </div> -->
      <div class="row">
       <div class="form-group col-sm-3">
         <label>Ảnh</label>
         <input type="file" name="anh">
       </div>
       <div class="form-group col-sm-3">
         <label>Số lượng</label>
         <input type="number" name="amount" class="form-control" placeholder="Số lượng" value="<?php if(isset($_POST['amount'])) { echo $_POST['amount'];} ?> ">
       </div>
     <!-- <div class="form-group col-sm-3">
       <label>Ngày tạo</label>
       <input type="date" name="ngaytao" class="form-control" placeholder="">
     </div> -->
     <!-- <div class="form-group col-sm-3">
       <label>Thứ tự</label>
       <input type="number" name="ordernum" class="form-control" placeholder="Thứ tự" value="<?php if(isset($_POST['ordernum'])) { echo $_POST['ordernum'];} ?> ">
     </div> -->
   </div>
   <div class="form-group">
    <label for="" style="display: block;">Trạng thái</label>
    <label for="" class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Hiển thị</label>
    <label for="" class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
  </div>
  <input type="submit" name="btn_sanpham" class="btn_sanpham" value="Thêm">
</form>
</div>
</div>
<?php
include('includes/footer.php');
?>

