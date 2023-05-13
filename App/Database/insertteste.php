<?php
require_once '../auth.php';
require_once '../Models/teste.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

	//---Informações Principais---//
	$ModeloTeste = $_POST['ModeloTeste'];
	$IMEITeste = $_POST['IMEITeste'];
	$StatusTeste = $_POST['StatusTeste'];
	$ObsTeste = $_POST['ObsTeste'];
	$GradeTeste = $_POST['GradeTeste'];

	//--Checklist--//
	$Wifi = $_POST['Wifi'];
	$ConectorUSB = $_POST['ConectorUSB'];
	$ConectorP2 = $_POST['ConectorP2'];
	$Bateria = $_POST['Bateria'];
	$Display = $_POST['Display'];
	$Touch = $_POST['Touch'];
	$Biometria = $_POST['Biometria'];
	$Botoes = $_POST['Botoes'];
	$Vibracall = $_POST['Vibracall'];
	$CamT = $_POST['CamT'];
	$CamF = $_POST['CamF'];
	$Flash = $_POST['Flash'];
	$Chip1 = $_POST['Chip1'];
	$Chip2 = $_POST['Chip2'];
	$AntRede = $_POST['AntRede'];
	$Mic1 = $_POST['Mic1'];
	$Mic2 = $_POST['Mic2'];
	$Sensor = $_POST['Sensor'];
	$VivaVoz = $_POST['VivaVoz'];
	$SiriGoogle = $_POST['SiriGoogle'];

	//--Cosmético--//
	$Carcaca = $_POST['Carcaca'];
	$Tela = $_POST['Tela'];
	$Traseira = $_POST['Traseira'];
	$Produto_CodRefProduto = $_POST['codProduto'];
	$Fornecedor_idFornecedor = $_POST['idFornecedor'];
	$iduser = $_POST['iduser'];

	if($iduser == $idUsuario){
	if(isset($_POST['idTeste'])){
		$idTeste = $_POST['idTeste'];
		$teste->updateTeste($idTeste, $ModeloTeste, $IMEITeste, $StatusTeste, $ObsTeste, $GradeTeste, $Wifi, $ConectorUSB, $ConectorP2, $Bateria, $Display, $Touch, $Biometria, $Botoes, $Vibracall, $CamT, $CamF, $Flash, $Chip1, $Chip2, $AntRede, $Mic1, $Mic2, $Sensor, $VivaVoz, $SiriGoogle, $Carcaca, $Tela, $Traseira, $Produto_CodRefProduto, $Fornecedor_idFornecedor, $idUsuario);
	}
	else{
	$teste->InsertTeste($ModeloTeste, $IMEITeste, $StatusTeste, $ObsTeste, $GradeTeste, $Wifi, $ConectorUSB, $ConectorP2, $Bateria, $Display, $Touch, $Biometria, $Botoes, $Vibracall, $CamT, $CamF, $Flash, $Chip1, $Chip2, $AntRede, $Mic1, $Mic2, $Sensor, $VivaVoz, $SiriGoogle, $Carcaca, $Tela, $Traseira, $Produto_CodRefProduto, $Fornecedor_idFornecedor, $idUsuario);
	}
	}
	else{
		header('Location: ../../interface/teste/index.php?alert=3');
	}
	}else{
		header('Location: ../../interface/teste/index.php');
	}