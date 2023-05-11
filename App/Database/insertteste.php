<?php
require_once '../auth.php';
require_once '../Models/teste.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

	//---Informações Principais---//
	$FuncionarioTeste = $_POST['FuncionarioTeste'];
	$AparelhoTeste = $_POST['AparelhoTeste'];
	$ModeloTeste = $_POST['ModeloTeste'];
	$IMEITeste = $_POST['IMEITeste'];
	$StatusTeste = $_POST['StatusTeste'];
	$ObservacaoTeste = $_POST['ObservacaoTeste'];
	$GradeTeste = $_POST['GradeTeste'];
	$FornecedorTeste = $_POST['FornecedorTeste'];
	$Public = $_POST['Public'];

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
	$status = 1;
	$iduser = $_POST['iduser'];

	if($iduser == $idUsuario && $IMEITeste != NULL){
			if (!isset($_POST['idTeste'])){
				$teste->InsertTeste($FuncionarioTeste, $AparelhoTeste, $ModeloTeste, $IMEITeste, $StatusTeste, $ObservacaoTeste, $GradeTeste, $FornecedorTeste, $Wifi, $ConectorUSB, $ConectorP2, $Bateria, $Display, $Touch, $Biometria, $Botoes, $Vibracall, $CamT, $CamF, $Flash, $Chip1, $Chip2, $AntRede, $Mic1, $Mic2, $Sensor, $VivaVoz, $SiriGoogle, $Carcaca, $Tela, $Traseira, $idUsuario, $status);
		}else{
				$idTeste = $_POST['idTeste'];
				$teste->UpdateTeste($idTeste, $FuncionarioTeste, $AparelhoTeste, $ModeloTeste, $IMEITeste, $StatusTeste, $ObservacaoTeste, $GradeTeste, $FornecedorTeste, $Wifi, $ConectorUSB, $ConectorP2, $Bateria, $Display, $Touch, $Biometria, $Botoes, $Vibracall, $CamT, $CamF, $Flash, $Chip1, $Chip2, $AntRede, $Mic1, $Mic2, $Sensor, $VivaVoz, $SiriGoogle, $Carcaca, $Tela, $Traseira, $Public, $idUsuario);		
			}
		}else{
				header('Location: ../../interface/teste/index.php?alert=3');
			}
}
else{
	header('Location: ../../interface/teste/index.php');
}