<?php 
session_start();
// session_destroy();//Xóa hết session
// header('Location: ../index.php');
// session_start();

if (isset($_SESSION['username'])){
    unset($_SESSION['username']); // xóa session login
}
//
// $session = $_SESSION['username'];
// $date = time();
// $sql2="INSERT INTO history(Username, Action, Timee) VALUES ('$session','Đăng xuất','$date')";
// mysqli_query($link,$sql2);
//
header('location: ../index.php');

 ?>