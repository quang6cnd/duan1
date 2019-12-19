<?php 
  	session_start();
	if(!isset($_SESSION['user'])){
		header('location: login.php');
	}
	// }if($_SESSION['role'] =='0') {
	// 	header('location: login.php');
	// }

?>	