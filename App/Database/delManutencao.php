<?php
require_once '../auth.php';
require_once '../Models/manutencao.class.php';

if(isset($_POST['update']) == 'Cadastrar'){
	$idManutencao = $_POST['idManutencao'];
	$manutencao->DelManutencao($idManutencao);
}
else{
	header('Location: ../../interface/manutencao/index.php');
}

?>