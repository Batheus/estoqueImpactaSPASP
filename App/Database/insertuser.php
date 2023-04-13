<?php
require_once '../auth.php';
require_once '../Models/usuario.class.php';
if(isset($_POST['upload']) == 'Cadastrar'){
$Username = $_POST['Username'];
$Email = $_POST['Email'];
$senha = $_POST['senha'];
$Permissao = $_POST['Permissao'];
if($Username != NULL && $senha != NULL){
	if (!file_exists($_FILES['arquivo']['name'])) {		
			$pt_file =  '../../interface/dist/img/'.$_FILES['arquivo']['name'];
			if ($pt_file != '../../interface/dist/img/'){	
				$destino =  '../../interface/dist/img/'.$_FILES['arquivo']['name'];				
				$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
				move_uploaded_file($arquivo_tmp, $destino);
				chmod ($destino, 0644);	
				$nomeimagem =  'dist/img/'.$_FILES['arquivo']['name'];
			}elseif($_POST['valor'] != NULL){
				$nomeimagem = $_POST['valor'];
				}
			}
if(isset($_POST['idUser'])){
	$idUser = $_POST['idUser'];
	$usuario->updateUser($idUser, $Username, $Email, $senha, $nomeimagem, $Permissao);
}
else{
$usuario->InsertUser($Username, $Email, $senha, $nomeimagem, $Permissao);
}
}
else{
	header('Location: ../../interface/usuarios/index.php?alert=3');
}
}
else{
	header('Location: ../../interface/usuarios/index.php');
}