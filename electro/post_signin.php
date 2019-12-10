<?php 
session_start();
require_once 'db.php';
require_once './commons/constants.php';
require_once './commons/helpers.php';
$sql="select * from roles inner join users on roles.id = users.role";
$stmt=$conn->prepare($sql);
$stmt->execute();
$role=$stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];

	$mysql="SELECT * FROM  users WHERE email = '$email'";
	$stmt=$conn->prepare($mysql);
	$stmt->execute();
	$acc=$stmt->fetch();
	if ($acc && password_verify($password, $acc['password'])) {
		$_SESSION[AUTHIES] = [
			"id" => $acc['id'],
			"username" => $acc['username'],
			"name" => $acc['name'],
			"email" => $acc['email'],
			"address" => $acc['address'],
			"image" => $acc['image'],
			"status" => $acc['status'],
			"role" => $acc['role'],
		];
		if(isset($_SESSION[AUTHIES]['role'])==1){
			header("location:admin/index.php");
		}else{
			header("location: index.php");
			die();
		}
	}
	header('location: ' . BASE_URL . 'signin.php?msg=Email/Mật khẩu không đúng');
	
}
?>