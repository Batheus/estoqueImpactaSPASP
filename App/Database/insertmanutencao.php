<?php
require_once '../auth.php';
require_once '../Models/manutencao.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

$ModeloManutencao = $_POST['ModeloManutencao'];
$GradeManutencao = $_POST['GradeManutencao'];
$IMEIManutencao = $_POST['IMEIManutencao'];
$StatusManutencao = $_POST['StatusManutencao'];
$ObsManutencao = $_POST['ObsManutencao'];
$Produto_CodRefProduto = $_POST['codProduto'];
$Fornecedor_idFornecedor = $_POST['idFornecedor'];
$iduser = $_POST['iduser'];
	
if($iduser == $idUsuario){
if(isset($_POST['idManutencao'])){
	$idManutencao = $_POST['idManutencao'];
	$manutencao->updateManutencao($idManutencao, $ModeloManutencao, $GradeManutencao, $IMEIManutencao, $StatusManutencao, $Produto_CodRefProduto, $ObsManutencao, $Fornecedor_idFornecedor, $idUsuario);
}
else{
$manutencao->InsertManutencao($ModeloManutencao, $GradeManutencao, $IMEIManutencao, $StatusManutencao, $Produto_CodRefProduto, $ObsManutencao, $Fornecedor_idFornecedor, $idUsuario);
}
}
else{
	header('Location: ../../interface/manutencao/index.php?alert=3');
}
}else{
	header('Location: ../../interface/manutencao/index.php');
}