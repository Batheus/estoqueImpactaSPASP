<?php
session_start();
$email = $_POST['email'];
$senha  = $_POST['senha'];
if($email == NULL || $senha == NULL){
	echo "<script>alert('Você deve digitar seu email e senha');</script>";
	echo "<script> window.location.href='../login.php'</script>";
	exit;
}else{
	require_once 'Models/connect.php';
	$connect->login($email, $senha);	
} 
?>
