<?php
require_once '../auth.php';
require_once '../Models/fornecedor.class.php';

if(isset($_POST['update']) == 'Cadastrar'){
	$idFornecedor = $_POST['idFornecedor'];
	$fornecedor->DelFornecedor($idFornecedor, $perm);
}
else{
	header('Location: ../../interface/fornecedor/index.php');
}
?>
