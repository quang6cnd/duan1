<?php 
session_start();
require_once './commons/constants.php';
require_once "db.php";
$id = $_GET['masp'];
$sqlQuery = "select * from product where id = $id";
// $product = $conn->prepare($sqlQuery);
$result = $conn->query($sqlQuery);
$product = $result->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION[CART]) || $_SESSION[CART] == null){
	$_SESSION[CART] = [];
	$_SESSION[CART][] = [
		'id' => $product['id'],
		'name' => $product['nameproduct'],
		'price' => $product['price'],
		'sale_price' => $product['sale_price'],
		'feature_image' => $product['image'],
		'quantity' => 1
	];
}else{
	$cart = $_SESSION[CART];
	$existed = -1;
	foreach ($cart as $index => $item) {
		if($item['id'] == $product['id']){
			$existed = $index;
			break;
		}
	}

	if($existed == -1){
		$cart[] = [
			'id' => $product['id'],
			'name' => $product['nameproduct'],
			'price' => $product['price'],
			'sale_price' => $product['sale_price'],
			'feature_image' => $product['image'],
			'quantity' => 1
		];
	}else{
		$cart[$existed]['quantity']++;
	}
	$_SESSION[CART] = $cart;

}

header('location: product_summary.php');

?>