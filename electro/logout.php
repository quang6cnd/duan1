<?php 
		
		session_start();
		require_once 'db.php';
		require_once './commons/constants.php';
		require_once './commons/helpers.php';
		if (isset($_SESSION['username'])){
			unset($_SESSION['username']); // xóa session user
			
		}header('location: index.php');
		


 ?>