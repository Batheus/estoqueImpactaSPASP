<?php
   require_once 'connect.php';
   class Manutencao extends Connect{
    public function listManutencao ($idprodutos, $idFornecedor){
      $query = "SELECT * FROM `manutencao`,`fornecedor`,`produtos` WHERE (`Fornecedor_idFornecedor` = `idFornecedor` AND `Produto_CodRefProduto` = `CodRefProduto`) AND (`Fornecedor_idFornecedor` = '$idFornecedor' AND `Produto_CodRefProduto` = '$idprodutos') ";
      $result = mysqli_query($this->SQL, $query) or die ( mysqli_error($this->SQL));
     while($rowlist = mysqli_fetch_array($result)){
           $skuProduto = $rowlist['skuProduto'];
           $fornecedor  = $rowlist['NomeFornecedor'];
      }
        return array('skuProduto'=> $skuProduto,'Fornecedor'=> $fornecedor ,); 
    }
   	public function index($value){
   		$this->query = "SELECT * FROM `manutencao`,`fornecedor`,`produtos` WHERE (`Fornecedor_idFornecedor` = `idFornecedor` AND `Produto_CodRefProduto` = `CodRefProduto`) AND `manutencaoPublic` = '$value'";
   		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));
   		if($this->result){
        echo '<table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>ID</th>
        <th>SKU</th>
        <th>Fornecedor</th>
        <th>Modelo</th>
        <th>Grade</th>
        <th>IMEI</th>
        <th>Status</th>
        <th>Observação</th>
        <th>Data</th>
        <th>Editar</th>
        <th>Deletar</th>
      </tr>
    </thead>
    <tbody>';

   			while ($row = mysqli_fetch_array($this->result)) {
          echo '<tr>';
          $id = $row['idManutencao'];

          echo '<form class="label" name="ativ'.$id.'" action="../../App/Database/action.php" method="post">
          <input type="hidden" name="id" id="id" value="'.$id.'">
          <input type="hidden" name="tabela" id="tabela" value="manutencao"></form>';
          
          echo '<td>'.$row['idManutencao'].'</td>
          <td>'.$row['skuProduto'].'</td>
          <td>'.$row['NomeFornecedor'].'</td>
          <td>'.$row['ModeloManutencao'].'</td>
          <td>'.$row['GradeManutencao'].'</td>
          <td>'.$row['IMEIManutencao'].'</td>
          <td>'.$row['StatusManutencao'].'</td>
          <td>'.$row['ObsManutencao'].'</td>
          <td>'.$row['DataManutencao'].'</td>
          
          <td>
                <a href="editmanutencao.php?q='.$row['idManutencao'].'"><i class="fa fa-edit"></i></a>
          </td>
          <td>
                    <a href="" data-toggle="modal" data-target="#myModal'.$row['idManutencao'].'">';
                    if($row['Public'] == 0){echo '<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>';}else{ echo '<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>';}
                    echo '</a>
  <div>
    <form id="delManutencao'.$row['idManutencao'].'" name="delManutencao'.$row['idManutencao'].'" action="../../App/Database/delManutencao.php" method="post" style="color:#000;">
    <div class="modal fade" id="myModal'.$row['idManutencao'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Você tem certeza que deseja deletar este item?</h4>
          </div>
          <div class="modal-body">
            Código: '.$row['idManutencao'].' - '.$row['skuProduto'].' - '.$row['NomeFornecedor'].'
          </div>
          <input type="hidden" id="id" name="id" value="'.$row['idManutencao'].'">
          <div class="modal-footer">
            <button type="submit" value="Cancelar" class="btn btn-default">Não</button>
            <button type="submit" name="update" value="Cadastrar" class="btn btn-primary">Sim</button>
          </div>
        </div>
      </div>
    </div>
    </form></div>
          </td>
            </tr>';
          }
          echo '</tbody>
  </table>';
        }
      }

      public function InsertManutencao($ModeloManutencao, $GradeManutencao, $IMEIManutencao, $StatusManutencao, $Produto_CodRefProduto, $ObsManutencao, $Fornecedor_idFornecedor, $idUsuario){
       $this->query = "INSERT INTO `manutencao`(`idManutencao`,`ModeloManutencao`, `GradeManutencao`, `IMEIManutencao`, `StatusManutencao`, `ObsManutencao`, `ManutencaoAtivo`,`ManutencaoPublic`, `Produto_CodRefProduto`, `Fornecedor_idFornecedor`, `Usuario_idUser`) VALUES 
       (NULL, '$ModeloManutencao', '$GradeManutencao', '$IMEIManutencao', '$StatusManutencao', '$ObsManutencao', 1, 1, '$Produto_CodRefProduto', '$Fornecedor_idFornecedor', '$idusuario')";
       if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
        header('Location: ../../interface/manutencao/index.php?alert=1');
      }
      else{
        header('Location: ../../interface/manutencao/index.php?alert=0');
      }
   	}

    public function editManutencao($value)
    {
      $this->query = "SELECT *FROM `manutencao` WHERE `idManutencao` = '$value'";
      $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

      if($row = mysqli_fetch_array($this->result)){
        $idManutencao = $row['idManutencao'];
        $ModeloManutencao = $row['ModeloManutencao'];
        $GradeManutencao = $row['GradeManutencao'];
        $IMEIManutencao = $row['IMEIManutencao'];
        $StatusManutencao = $row['StatusManutencao'];
        $ObsManutencao = $row['ObsManutencao'];
        $Produto_CodRefProduto = $row['Produto_CodRefProduto'];
        $Fornecedor_idFornecedor = $row['Fornecedor_idFornecedor'];

        return $resp = array('Manutencao' => ['idManutencao' => $idManutencao,
          'ModeloManutencao' => $ModeloManutencao,
          'GradeManutencao' => $GradeManutencao,
          'IMEIManutencao' => $IMEIManutencao,
          'StatusManutencao' => $StatusManutencao,
          'ObsManutencao' => $ObsManutencao,
          'CodRefProduto' => $Produto_CodRefProduto,
          'idFornecedor' => $Fornecedor_idFornecedor ] , );  
      }
    }

    public function updateManutencao($idManutencao,$ModeloManutencao, $GradeManutencao, $IMEIManutencao, $StatusManutencao, $Produto_CodRefProduto, $ObsManutencao, $Fornecedor_idFornecedor, $idUsuario)
    {
      $this->query = "UPDATE `manutencao` SET
      `ModeloManutencao`='$ModeloManutencao',
      `GradeManutencao`='$GradeManutencao',
      `IMEIManutencao`='$IMEIManutencao',
      `StatusManutencao`='$StatusManutencao',
      `Produto_CodRefProduto`='$Produto_CodRefProduto',
      `ObsManutencao`='$ObsManutencao',
      `Fornecedor_idFornecedor`='$Fornecedor_idFornecedor',
      `Usuario_idUser`='$idusuario' 
      WHERE `idManutencao`= '$idManutencao'";

      if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
        header('Location: ../../interface/manutencao/index.php?alert=1');
      }
      else{
        header('Location: ../../interface/manutencao/index.php?alert=0');
      }
    }

     public function DelManutencao($value){
        $this->query = "DELETE FROM `manutencao` WHERE `idManutencao` = '$value'";
        if($this->query = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
          header('Location: ../../interface/manutencao/index.php?alert=5'); 
        }
        else{
            header('Location: ../../interface/manutencao/index.php?alert=0');
        }
    } 

    public function Ativo($value, $id)
    {
      if($value == 0){ $v = 1; }else{ $v = 0; }
      $this->query = "UPDATE `manutencao` SET `ManutencaoAtivo` = '$v' WHERE `idManutencao` = '$id'";
      $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
      header('Location: ../../interface/manutencao/');
    }
}

$manutencao = new Manutencao;