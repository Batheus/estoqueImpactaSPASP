<?php
   require_once 'connect.php';
   class Teste extends Connect{
    public function listTeste ($idprodutos, $idFornecedor){
      $query = "SELECT * FROM `teste`,`fornecedor`,`produtos` WHERE (`Fornecedor_idFornecedor` = `idFornecedor` AND `Produto_CodRefProduto` = `CodRefProduto`) AND (`Fornecedor_idFornecedor` = '$idFornecedor' AND `Produto_CodRefProduto` = '$idprodutos') ";
      $result = mysqli_query($this->SQL, $query) or die ( mysqli_error($this->SQL));
     while($rowlist = mysqli_fetch_array($result)){
           $skuProduto = $rowlist['skuProduto'];
           $fornecedor  = $rowlist['NomeFornecedor'];
      }
        return array('skuProduto'=> $skuProduto,'Fornecedor'=> $fornecedor ,); 
    }
   	public function index($value){
   		$this->query = "SELECT * FROM `teste`,`fornecedor`,`produtos` WHERE (`Fornecedor_idFornecedor` = `idFornecedor` AND `Produto_CodRefProduto` = `CodRefProduto`) AND `TestePublic` = '$value'";
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
        <th>Checklist</th>
        <th>Deletar</th>
      </tr>
    </thead>
    <tbody>';

   			while ($row = mysqli_fetch_array($this->result)) {
          echo '<tr>';
          $id = $row['idTeste'];

          echo '<form class="label" name="ativ'.$id.'" action="../../App/Database/action.php" method="post">
          <input type="hidden" name="id" id="id" value="'.$id.'">
          <input type="hidden" name="tabela" id="tabela" value="teste"></form>';
          
          echo '<td>'.$row['idTeste'].'</td>
          <td>'.$row['skuProduto'].'</td>
          <td>'.$row['NomeFornecedor'].'</td>
          <td>'.$row['ModeloTeste'].'</td>
          <td>'.$row['GradeTeste'].'</td>
          <td>'.$row['IMEITeste'].'</td>
          <td>'.$row['StatusTeste'].'</td>
          <td>'.$row['ObsTeste'].'</td>
          <td>'.$row['DataTeste'].'</td>
          
          <td>
                <a href="editteste.php?q='.$row['idTeste'].'"><i class="fa fa-edit"></i></a>
          </td>

          <td>
                    <a href="" data-toggle="modal" data-target="#ModalChecklist'.$row['idTeste'].'">';
                    if($row['TestePublic'] == 0){echo '<i class="glyphicon glyphicon-search" aria-hidden="true"></i>';}else{ echo '<i class="glyphicon glyphicon-search" aria-hidden="true"></i>';}
                    echo '</a>
                    <div>
                    <form id="relatorioChecklist'.$row['idTeste'].'" name="relatorioChecklist'.$row['idTeste'].'" action="" method="" style="color:#000;">
                    <div class="modal fade" id="ModalChecklist'.$row['idTeste'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Informações detalhadas sobre o produto:</h4>
                            </div>
                            <div class="box-header with-border">
                                    <h3 class="box-title">Checklist Funcional:</h3>
                            </div>
                          <div class="modal-body">
                            <b>Wifi:</b> '.$row['Wifi'].'
                          </div>
                          <div class="modal-body">
                            <b>Conector USB:</b> '.$row['ConectorUSB'].'
                          </div>
                          <div class="modal-body">
                            <b>Conector P2:</b> '.$row['ConectorP2'].'
                          </div>
                          <div class="modal-body">
                            <b>Bateria:</b> '.$row['Bateria'].'
                          </div>
                          <div class="modal-body">
                            <b>Display:</b> '.$row['Display'].'
                          </div>
                          <div class="modal-body">
                            <b>Touch:</b> '.$row['Touch'].'
                          </div>
                          <div class="modal-body">
                            <b>Biometria:</b> '.$row['Biometria'].'
                          </div>
                          <div class="modal-body">
                            <b>Botões:</b> '.$row['Botoes'].'
                          </div>
                          <div class="modal-body">
                            <b>Vibracall:</b> '.$row['Vibracall'].'
                          </div>
                          <div class="modal-body">
                            <b>Câmera Traseira:</b> '.$row['CamT'].'
                          </div>
                          <div class="modal-body">
                            <b>Câmera Frontal:</b> '.$row['CamF'].'
                          </div>
                          <div class="modal-body">
                            <b>Flash:</b> '.$row['Flash'].'
                          </div>
                          <div class="modal-body">
                            <b>Chip 1:</b> '.$row['Chip1'].'
                          </div>
                          <div class="modal-body">
                            <b>Chip 2:</b> '.$row['Chip2'].'
                          </div>
                          <div class="modal-body">
                            <b>Antena de Rede:</b> '.$row['AntRede'].'
                          </div>
                          <div class="modal-body">
                            <b>Mic 1:</b> '.$row['Mic1'].'
                          </div>
                          <div class="modal-body">
                            <b>Mic 2:</b> '.$row['Mic2'].'
                          </div>
                          <div class="modal-body">
                            <b>Sensor:</b> '.$row['Sensor'].'
                          </div>
                          <div class="modal-body">
                            <b>Viva-Voz:</b> '.$row['VivaVoz'].'
                          </div>
                          <div class="modal-body">
                            <b>Siri/Google:</b> '.$row['SiriGoogle'].'
                          </div>
                          <div class="box-header with-border">
                            <h3 class="box-title">Checklist Cosmético:</h3>
                          </div>
                          <div class="modal-body">
                            <b>Carcaça:</b> '.$row['Carcaca'].'
                          </div>
                          <div class="modal-body">
                            <b>Tela:</b> '.$row['Tela'].'
                          </div>
                          <div class="modal-body">
                            <b>Traseira:</b> '.$row['Traseira'].'
                          </div>
                            <input type="hidden" id="idTeste" name="idTeste" value="'.$row['idTeste'].'">
                            <div class="modal-footer">
                              <button type="submit" value="Cancelar" class="btn btn-default">Fechar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      </form></div>
          </td>

          <td>
                    <a href="" data-toggle="modal" data-target="#myModal'.$row['idTeste'].'">';
                    if($row['TestePublic'] == 0){echo '<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>';}else{ echo '<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>';}
                    echo '</a>
  <div>
    <form id="delTeste'.$row['idTeste'].'" name="delTeste'.$row['idTeste'].'" action="../../App/Database/delTeste.php" method="post" style="color:#000;">
    <div class="modal fade" id="myModal'.$row['idTeste'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Você tem certeza que deseja deletar este item?</h4>
          </div>
          <div class="modal-body">
            Código: '.$row['idTeste'].' - '.$row['skuProduto'].' - '.$row['NomeFornecedor'].'
          </div>
          <input type="hidden" id="id" name="id" value="'.$row['idTeste'].'">
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

      public function InsertTeste($ModeloTeste, $IMEITeste, $StatusTeste, $ObsTeste, $GradeTeste, $Wifi, $ConectorUSB, $ConectorP2, $Bateria, $Display, $Touch, $Biometria, $Botoes, $Vibracall, $CamT, $CamF, $Flash, $Chip1, $Chip2, $AntRede, $Mic1, $Mic2, $Sensor, $VivaVoz, $SiriGoogle, $Carcaca, $Tela, $Traseira, $Produto_CodRefProduto, $Fornecedor_idFornecedor, $idUsuario){
       $this->query = "INSERT INTO `teste`(`idTeste`, `ModeloTeste`, `IMEITeste`, `StatusTeste`, `ObsTeste`, `GradeTeste`, `Wifi`, `ConectorUSB`, `ConectorP2`, `Bateria`, `Display`, `Touch`, `Biometria`, `Botoes`, `Vibracall`, `CamT`, `CamF`, `Flash`, `Chip1`, `Chip2`, `AntRede`, `Mic1`, `Mic2`, `Sensor`, `VivaVoz`, `SiriGoogle`, `Carcaca`, `Tela`, `Traseira`, `TesteAtivo`, `TestePublic`, `Produto_CodRefProduto`, `Fornecedor_idFornecedor`, `Usuario_idUser`) VALUES 
       (NULL, '$ModeloTeste', '$IMEITeste', '$StatusTeste', '$ObsTeste', '$GradeTeste', '$Wifi', '$ConectorUSB', '$ConectorP2', '$Bateria', '$Display', '$Touch', '$Biometria', '$Botoes', '$Vibracall', '$CamT', '$CamF', '$Flash', '$Chip1', '$Chip2', '$AntRede', '$Mic1', '$Mic2', '$Sensor', '$VivaVoz', '$SiriGoogle', '$Carcaca', '$Tela', '$Traseira', 1, 1, '$Produto_CodRefProduto', '$Fornecedor_idFornecedor', '$idusuario')";
       if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
        header('Location: ../../interface/teste/index.php?alert=1');
      }
      else{
        header('Location: ../../interface/teste/index.php?alert=0');
      }
   	}

    public function editTeste($value)
    {
      $this->query = "SELECT *FROM `teste` WHERE `idTeste` = '$value'";
      $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

      if($row = mysqli_fetch_array($this->result)){
        $idTeste = $row['idTeste'];
        $ModeloTeste = $row['ModeloTeste'];
        $GradeTeste = $row['GradeTeste'];
        $IMEITeste = $row['IMEITeste'];
        $StatusTeste = $row['StatusTeste'];
        $ObsTeste = $row['ObsTeste'];
        $Wifi = $row['Wifi'];
        $ConectorUSB = $row['ConectorUSB'];
        $ConectorP2 = $row['ConectorP2'];
        $Bateria = $row['Bateria'];
        $Display = $row['Display'];
        $Touch = $row['Touch'];
        $Biometria = $row['Biometria'];
        $Botoes = $row['Botoes'];
        $Vibracall = $row['Vibracall'];
        $CamT = $row['CamT'];
        $CamF = $row['CamF'];
        $Flash = $row['Flash'];
        $Chip1 = $row['Chip1'];
        $Chip2 = $row['Chip2'];
        $AntRede = $row['AntRede'];
        $Mic1 = $row['Mic1'];
        $Mic2 = $row['Mic2'];
        $Sensor = $row['Sensor'];
        $VivaVoz = $row['VivaVoz'];
        $SiriGoogle = $row['SiriGoogle'];
        $Carcaca = $row['Carcaca'];
        $Tela = $row['Tela'];
        $Traseira = $row['Traseira'];
        $Produto_CodRefProduto = $row['Produto_CodRefProduto'];
        $Fornecedor_idFornecedor = $row['Fornecedor_idFornecedor'];

        return $resp = array('Teste' => ['idTeste' => $idTeste,
          'ModeloTeste' => $ModeloTeste,
          'GradeTeste' => $GradeTeste,
          'IMEITeste' => $IMEITeste,
          'StatusTeste' => $StatusTeste,
          'ObsTeste' => $ObsTeste,
          'Wifi' => $Wifi,
          'ConectorUSB' => $ConectorUSB,
          'ConectorP2' => $ConectorP2,
          'Bateria' => $Bateria,
          'Display' => $Display,
          'Touch' => $Touch,
          'Biometria' => $Biometria,
          'Botoes' => $Botoes,
          'Vibracall' => $Vibracall,
          'CamT' => $CamT,
          'CamF' => $CamF,
          'Flash' => $Flash,
          'Chip1' => $Chip1,
          'Chip2' => $Chip2,
          'AntRede' => $AntRede,
          'Mic1' => $Mic1,
          'Mic2' => $Mic2,
          'Sensor' => $Sensor,
          'VivaVoz' => $VivaVoz,
          'SiriGoogle' => $SiriGoogle,
          'Carcaca' => $Carcaca,
          'Tela' => $Tela,
          'Traseira' => $Traseira,
          'CodRefProduto' => $Produto_CodRefProduto,
          'idFornecedor' => $Fornecedor_idFornecedor ] , );  
      }
    }

    public function updateTeste($idTeste,$ModeloTeste, $IMEITeste, $StatusTeste, $ObsTeste, $GradeTeste, $Wifi, $ConectorUSB, $ConectorP2, $Bateria, $Display, $Touch, $Biometria, $Botoes, $Vibracall, $CamT, $CamF, $Flash, $Chip1, $Chip2, $AntRede, $Mic1, $Mic2, $Sensor, $VivaVoz, $SiriGoogle, $Carcaca, $Tela, $Traseira, $Produto_CodRefProduto, $Fornecedor_idFornecedor, $idUsuario)
    {
      $this->query = "UPDATE `teste` SET
      `ModeloTeste`='$ModeloTeste',
      `GradeTeste`='$GradeTeste',
      `IMEITeste`='$IMEITeste',
      `StatusTeste`='$StatusTeste',
      `ObsTeste`='$ObsTeste',
      `Wifi`='$Wifi',
      `ConectorUSB`='$ConectorUSB',
      `ConectorP2`='$ConectorP2',
      `Bateria`='$Bateria',
      `Display`='$Display',
      `Touch`='$Touch',
      `Biometria`='$Biometria',
      `Botoes`='$Botoes',
      `Vibracall`='$Vibracall',
      `CamT`='$CamT',
      `CamF`='$CamF',
      `Flash`='$Flash',
      `Chip1`='$Chip1',
      `Chip2`='$Chip2',
      `AntRede`='$AntRede',
      `Mic1`='$Mic1',
      `Mic2`='$Mic2',
      `Sensor`='$Sensor',
      `VivaVoz`='$VivaVoz',
      `SiriGoogle`='$SiriGoogle',
      `Carcaca`='$Carcaca',
      `Tela`='$Tela',
      `Traseira`='$Traseira',
      `Produto_CodRefProduto`='$Produto_CodRefProduto',
      `Fornecedor_idFornecedor`='$Fornecedor_idFornecedor',
      `Usuario_idUser`='$idusuario' 
      WHERE `idTeste`= '$idTeste'";

      if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
        header('Location: ../../interface/teste/index.php?alert=1');
      }
      else{
        header('Location: ../../interface/teste/index.php?alert=0');
      }
    }

     public function DelTeste($value){
        $this->query = "DELETE FROM `teste` WHERE `idTeste` = '$value'";
        if($this->query = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
          header('Location: ../../interface/teste/index.php?alert=5'); 
        }
        else{
            header('Location: ../../interface/teste/index.php?alert=0');
        }
    } 

    public function Ativo($value, $id)
    {
      if($value == 0){ $v = 1; }else{ $v = 0; }
      $this->query = "UPDATE `teste` SET `TesteAtivo` = '$v' WHERE `idTeste` = '$id'";
      $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
      header('Location: ../../interface/teste/');
    }
}

$teste = new Teste;