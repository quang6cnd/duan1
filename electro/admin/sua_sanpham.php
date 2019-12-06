<?php
include('includes/header.php');
require_once "../connection.php";
$sttt = $conn->prepare("SELECT product.* , categories.* FROM product INNER JOIN categories ON categories.id = product.id_cate");
$sttt->execute();
$result = $sttt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conn->prepare("SELECT * from categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
$mess = "";

?>

  </style>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <?php 
    //thêm sản phẩm 
       if(isset($_POST['btn_sanpham'])){
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
        if(empty($nameproduct)){
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
      //Sql create
          $update_sp = "UPDATE product set nameproduct='$nameproduct', price='$price',sale_price='$sale_price', detail='$detail', detail_specifications='$detail_specifications', status='$status', amount='$amount',image='$image',id_cate='$id_cate' where id='$id'";
          $stmt = $conn->prepare($update_sp);
          $stmt->execute();
      //Check
          if($stmt->rowCount() > 0){
      //Chuyển trang
            $mess = "Sửa dữ liệu thành công !";
          }else{
            $mess = "Không thể sửa dữ liệu";
          }
        }   

      } 
      if(isset($_GET['id'])){
          $id = $_GET['id'];
          $stql = $conn->prepare("SELECT * from product where id=$id");
          $stql->execute();
          $product = $stql->fetch();
        }

      ?>
      <form name="frmadd_sanpham" method="POST" enctype="multipart/form-data">
        <?php 
        if (isset($mess)) {
          echo $mess;
        }
        ?>

        <h3>Sửa sản phẩm</h3>
        <div class="form-group">
          <div style="float: left;">
           <label name = "" id="">Danh mục sản phẩm</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <select name="id_cate" id="" style="">
            <?php
            //Đổ dữ liệu
            foreach ($categories as $r) {
              ?>

              <option value="<?= $r['id_cate']?>"><?=$r['name_cate']?></option>
              
            </div>
            <?php
          }
          ?></select>  
   <div class="row">
     <div class="form-group col-sm-4">
       <label>Tên sản phẩm</label>
       <input type="text" name="nameproduct" class="form-control" placeholder="Tên sản phẩm" value="<?=$product['nameproduct']?>">
     </div>
     <div class="form-group col-sm-4">
       <label>Giá tiền</label>
       <input type="number" name="price" class="form-control" value="<?=$product['price']?>">
     </div>
     <div class="form-group col-sm-4">
       <label>Khuyến mãi</label>
       <input type="number" name="sale_price" class="form-control" value="<?=$product['sale_price']?>">
     </div>
   </div>
   <div class="row">
     <div class="form-group col-sm-6">
       <label>Thông số</label>
       <textarea id="thongso" name="detail" class="form-control" value="<?=$product['detail']?>" rows="5"></textarea>
       <!-- <textarea id="textarea_tt" name="thongso" class="form-control" placeholder="Thông số sản phẩm" rows="5"></textarea> -->
     </div>
     <div class="form-group col-sm-6">
       <label>Thông số chi tiết</label>
       <textarea id="thongsoct" name="detail_specifications" class="form-control" value="<?=$product['detail_specifications']?>" rows="5"></textarea>
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
        <input type="hidden" name="avt" value="<?= $product['image'] ?>">
        <input type="file" name="avatar" value="">
       </div>
       <div class="form-group col-sm-3">
         <label>Số lượng</label>
         <input type="number" name="amount" class="form-control" value="<?=$product['amount']?>">
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
    <label for="" class="radio-inline"><input type="radio" name="status" value="0" checked="checked">Không hiển thị</label>
  </div>
  <input type="submit" name="btn_sanpham" class="btn_sanpham" value="sửa">
</form>
</div>
</div>
<?php
include('includes/footer.php');
?>

