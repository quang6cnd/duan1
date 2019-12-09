<?php 
session_start();
$cart = isset($_SESSION[CART]) == true ? $_SESSION[CART] : [];
$id = isset($_GET['id']) == true ? $_GET['id'] : null; 
$flag =  -1;
foreach ($cart as $ind => $item) {
	if($id == $item['id']){
		$flag = $ind;
		break;
	}
} 

if($flag != -1){
	array_splice($cart, $flag, 1);
	$_SESSION[CART] = $cart;
}

header('location: product_summary.php');
 ?>