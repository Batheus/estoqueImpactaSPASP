<?php
require_once '../auth.php';
require_once '../Models/produtos.class.php';

	if(isset($_POST['update']) == 'Cadastrar'){
		$skuProduto = $_POST['skuProduto'];
		$nomeProduto = $_POST['nomeProduto'];
		$iduser = $_POST['iduser'];
		if($skuProduto != NULL && $nomeProduto != NULL){
			if(isset($_POST['id']) != NULL && $idUsuario != NULL){
				$id = $_POST['id'];
				$produtos->UpdateProd($id, $skuProduto, $nomeProduto, $idUsuario);
			}
			elseif($iduser == $idUsuario){
				$produtos->InsertProd($skuProduto, $nomeProduto, $idUsuario);
			}
		}
		else{
			header('Location: ../../interface/prod/index.php?alert=0');
		}
	}
	else{
		header('Location: ../../interface/prod/index.php');
	}
