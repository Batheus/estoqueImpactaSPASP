<?php
require_once '../auth.php';
require_once '../Models/teste.class.php';

if(isset($_POST['update']) == 'Cadastrar'){
$idTeste = $_POST['id'];
$teste->DelTeste($idTeste);
}
else{
	header('Location: ../../interface/teste/');
}
?>