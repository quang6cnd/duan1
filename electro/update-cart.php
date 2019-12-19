<?php 
	session_start();
	include 'db.php';
	require_once './commons/constants.php';

	$id = $_GET['maspham'];
	$id = isset($_GET['id']) ? $_GET['id'] : "";
	$url = isset($_GET['url']) ? $_GET['url'] : "";
	

	if (isset($_POST['increase'])) {
		extract($_REQUEST);
		
		// Kiểm tram giá trị quantity
		if ($quantity > 0 && $quantity != '' && is_numeric($quantity)) {
			if(isset($_SESSION[CART])){
		        $cart = $_SESSION[CART];
		        foreach ($cart as $key => $item) {
		        	// Tìm sản phẩm theo id
		        	if ($item['id']  == $id) {
		        		// Lấy được sản phẩm quantity +1
		        		$quantity ++;
		            	$item['quantity'] = $quantity;
		            	// Update mảng mới của id được chọn
		            	$_SESSION[CART][$key] = $item;
		         		header('location: ' . $url);
   						die;	
		            }
		        }
		    }
		}else{
			header('location: ' . $url);
    		die;
		}
	}

	if (isset($_POST['reduction'])) {
		extract($_REQUEST);

		
		


		
		if ($quantity != '' && is_numeric($quantity)) {
			// Không có số lượng sẽ xóa sản phẩm
			if($quantity == 1){
			$cart = $_SESSION[CART];
		        foreach ($cart as $key => $item) {
		        	// Tìm sản phẩm theo id
		        	if ($item['id']  == $id) {
		        		// xóa sản phẩm trong giỏ hàng
		        		unset($_SESSION[CART][$key]);
		         		header('location: ' . $url);
   						die;	
		            }
		        }
			}

			
			// Kiểm tra số lương và kiểu dữ liệu
				if(isset($_SESSION[CART])){
			        $cart = $_SESSION[CART];
			        foreach ($cart as $key => $item) {
			        	// Tìm sản phẩm theo id
			        	if ($item['id']  == $id) {
			        		// Lấy được sản phẩm quantity -1
			        		$quantity --;
			            	$item['quantity'] = $quantity;
			            	// Update mảng mới của id được chọn
			            	$_SESSION[CART][$key] = $item;
			         		header('location: ' . $url);
	   						die;	
			            }
			        }
			    }
			}



	}


			header('location: ' . $url);
    		die;
	
?>