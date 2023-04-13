<?php
require_once 'connect.php';
class Usuario extends Connect
{
	public function index($value, $perm)
	{
		if($perm == 1){
			$this->query = "SELECT * FROM `usuario`";
			$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));
			$q = 0;
			$v = 0;
			$e = 0;
		if($this->result){
			echo '<table class="table">
					<thead class="thead-inverse">
						<tr>
							<th>Imagem</th>
							<th>Usuário</th>
							<th>Email</th>
							<th>Permissão</th>
							<th>Editar</th>
						</tr>
					</thead>
				<tbody>';

			while ($row = mysqli_fetch_array($this->result)) {
				echo '<tr>';
					$id = $row['idUser'];
					echo '<form class="label" name="ativ'.$id.'" action="../../App/Database/action.php" method="post">
					<input type="hidden" name="id" id="id" value="'.$id.'">
					<input type="hidden" name="tabela" id="tabela" value="usuario">';
					echo '<td>';
					if(!empty($row['imagem'])){
						echo '<img src="../'.$row['imagem'].'" width="50" />';
					}
					echo '</td><td>'.$row['Username'].'</td>
					<td>'.$row['Email'].'</td>
					<td>'.$row['Permissao'].'</td>
					<td>
						<a href="editusuarios.php?q='.$row['idUser'].'"><i class="fa fa-edit"></i></a>
					</td>
				</tr>';
			}
				echo '</tbody>
			</table>';
		}
	}
	else{
		echo "Você não tem Permissao de acesso a este conteúdo!";
	}
}
public function InsertUser($Username, $Email, $senha, $nomeimagem, $Permissao){
		$this->query = "INSERT INTO `usuario`(`idUser`, `Username`, `Email`, `senha`, `imagem`, `Dataregistro`, `Permissao`) VALUES 
		(NULL, '$Username', '$Email', '$senha', '$nomeimagem', CURRENT_TIMESTAMP, '$Permissao')";
		if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

		header('Location: ../../interface/usuarios/index.php?alert=1');
	}else{
		header('Location: ../../interface/usuarios/index.php?alert=0');
	}
}

public function editUser($value){
	$this->query = "SELECT *FROM `usuario` WHERE `idUser` = '$value'";
	$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

	if($row = mysqli_fetch_array($this->result)){
		$idUser = $row['idUser'];
		$Username = $row['Username'];
		$Email = $row['Email'];
		$senha = $row['senha'];
		$nomeimagem = $row['imagem'];
		$Permissao = $row['Permissao'];

		return $resp = array('Usuario' => ['idUser'   => $idUser,
			'Username'   => $Username,
			'Email' => $Email,
			'senha' => $senha,
			'imagem' => $nomeimagem,
			'Permissao' => $Permissao] , );  
		}
	
}
public function updateUser($idUser, $Username, $Email, $senha, $nomeimagem, $Permissao){
	$this->query = "UPDATE `usuario` SET
	`Username` = '$Username', 
	`Email`= '$Email',
	`senha`='$senha',
	`imagem`='$nomeimagem',
	`Permissao`='$Permissao'
	WHERE `idUser`= '$idUser'";
	if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
		header('Location: ../../interface/usuarios/index.php?alert=1');
	}else{
		header('Location: ../../interface/usuarios/index.php?alert=0');
	}
}
}

$usuario = new Usuario;