<?php 
session_start();
session_destroy();//Xóa hết session
header('Location: ../index.php');
 ?>