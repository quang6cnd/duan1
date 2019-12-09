<?php 
		session_start();
		require_once 'db.php';
		require_once './commons/constants.php';
		require_once './commons/helpers.php';
		if (isset($_POST['sub'])) {
			if (isset($_SESSION[AUTHIES])) {
				$comment=$_POST['comment'];
				$mysql="INSERT INTO "
			}
		}




 ?>