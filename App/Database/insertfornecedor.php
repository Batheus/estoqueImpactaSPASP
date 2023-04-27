<?php
require_once '../auth.php';
require_once '../Models/fornecedor.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){
$NomeFornecedor = $_POST['NomeFornecedor'];
$CNPJFornecedor = $_POST['CNPJFornecedor'];
$EmailFornecedor = $_POST['EmailFornecedor'];
$EnderecoFornecedor = $_POST['EnderecoFornecedor'];
$TelefoneFornecedor = $_POST['TelefoneFornecedor'];
$Public = $_POST['Public'];
$status = 1;
$iduser = $_POST['iduser'];
if($iduser == $idUsuario && $NomeFornecedor != NULL){
		if (!isset($_POST['idFornecedor'])){
			$fornecedor->InsertFornecedor($NomeFornecedor, $CNPJFornecedor, $EmailFornecedor, $EnderecoFornecedor, $TelefoneFornecedor, $idUsuario, $status, $perm);
	}
	else{
			$idFornecedor = $_POST['idFornecedor'];
			$fornecedor->UpdateFornecedor($idFornecedor, $NomeFornecedor, $CNPJFornecedor, $EmailFornecedor, $EnderecoFornecedor, $TelefoneFornecedor, $Public, $idUsuario , $perm);
		}
	}
	else{
			header('Location: ../../interface/fornecedor/index.php?alert=3');
		}
}
else{
	header('Location: ../../interface/fornecedor/index.php');
}