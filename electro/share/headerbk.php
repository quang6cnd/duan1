<?php 
  require_once"connection.php";
  if(isset($_POST['sub'])){
    $tendm=$_POST['tendm'];
     $sql="INSERT INTO danhmuc(name,show_menu) VALUES('$name','$show_menu')";
  $stmt=$conn->prepare($sql);
  $stmt->execute();

  }



 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Thêm Danh Mục</title>
  <link rel="stylesheet" href="css/quanly.css">
  <link rel="stylesheet" href="icon/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body>
  <div id="left">
     <div id="left_up">
      <img src="img/laptopbe.png">
     </div>
     <div id="left_down">
        <ul>
        <li><i class="fa fa-home" aria-hidden="true"></i><a href="trangchu.php" title="" target="_blank">Home</a></li>
        <li><i class="fa fa-sign-in" aria-hidden="true"></i><a href="taikhoan.php" title="">Tài Khoản</a></li>
        <li><i class="fa fa-product-hunt" aria-hidden="true"></i><a href="themsp.php" title="">Sản phẩm</a></li>
        <li><i class="fa fa-caret-square-o-down" aria-hidden="true"></i><a href="danhmuc.php" title="">Danh mục</a></li>
        <li><i class="fa fa-comments" aria-hidden="true"></i><a href="comment.php" title="">Bình luận</a></li>
        <li><i class="fa fa-sliders" aria-hidden="true"></i><a href="slide.php" title="">Slide</a></li>
        <li><i class="fa fa-cogs" aria-hidden="true"></i><a href="setting.php" title="">Setting</a></li>
      </ul>
     </div>
  </div>
  <div id="right">
    <div id="right_up">
      <form>
        <input type="search" name="" required="search">
        <button type="search"><i class="fa fa-search" aria-hidden="true"></i></button>
      </form>
         <img src="images/ASUS-ROG-Zephyrus-S-01-1560647986.png" class="rounded-circle" alt="Cinque Terre" width="50" height="40"> 
        <span><a href="" title="">Admin</a></span>
      </div>
<div id="right_down">
      
<div class="container">
  <h2><i class="fa fa-plus-circle" aria-hidden="true"></i>Danh mục sản phẩm</h2>           
  <form action="danhmuc.php" method="post" enctype="multipart/form-data">
   <!--  <label>Mã danh mục</label><br>
    <input type="text" name="madm" value=""><br> -->
    <label>Tên danh mục</label><br>
   	<input type="text" name="tendm"><br>
    <label>show danh mục</label><br>
    <select name="show" >
      <option value="1">1</option>
     <option value="2">2</option>
    </select>
   <button type="submit" style="width:150px;height: 40px;margin:10px 10px 10px 20%;background-color: #00cd3f;color:white;border:1px solid #cccccc;font-size: 18px;border-radius: 10px;transition: 0.6s;" name="sub">Thêm Danh Mục</button><br>
   <a href="hienthidm.php" >Bấm để xem, xóa danh mục</a>
   
  </form>

  <div>
    
  </div>
</div>
    </div>
    </div>
</body>
</html>