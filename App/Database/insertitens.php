<?php
require_once '../auth.php';
require_once '../Models/itens.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

$QuantItens = $_POST['QuantItens'];
$MarcaItens = $_POST['MarcaItens'];
$ModeloItens = $_POST['ModeloItens'];
$MemoriaItens = $_POST['MemoriaItens'];
$CorItens = $_POST['CorItens'];
$GradeItens = $_POST['GradeItens'];
$LocalItens = $_POST['LocalItens'];
$Produto_CodRefProduto = $_POST['codProduto'];
$Fornecedor_idFornecedor = $_POST['idFornecedor'];
$iduser = $_POST['iduser'];

if($iduser == $idUsuario && $QuantItens != NULL){
	if (!file_exists($_FILES['arquivo']['name'])) {		
			$pt_file =  '../../interface/dist/img/'.$_FILES['arquivo']['name'];
			if ($pt_file != '../../interface/dist/img/'){	
				$destino =  '../../interface/dist/img/'.$_FILES['arquivo']['name'];				
				$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
				move_uploaded_file($arquivo_tmp, $destino);
				chmod ($destino, 0644);	
				$nomeimagem =  'dist/img/'.$_FILES['arquivo']['name'];
			}
			elseif($_POST['valor'] != NULL){
				$nomeimagem = $_POST['valor'];
				}
			}
	
if(isset($_POST['idItens'])){
	$idItens = $_POST['idItens'];
	$itens->updateItens($idItens, $nomeimagem, $QuantItens, $MarcaItens, $ModeloItens, $MemoriaItens, $CorItens, $GradeItens, $LocalItens, $Produto_CodRefProduto, $Fornecedor_idFornecedor, $idUsuario);
}
else{
$itens->InsertItens($nomeimagem, $QuantItens, $MarcaItens, $ModeloItens, $MemoriaItens, $CorItens, $GradeItens, $LocalItens, $Produto_CodRefProduto, $Fornecedor_idFornecedor, $idUsuario);
}
}
else{
	header('Location: ../../interface/itens/index.php?alert=3');
}
}else{
	header('Location: ../../interface/itens/index.php');
}