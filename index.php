<?php
require_once 'App/auth.php';
if($usuario && $perm){
	header('Location: interface/');
}else{
header('Location: login.php');
}
?>