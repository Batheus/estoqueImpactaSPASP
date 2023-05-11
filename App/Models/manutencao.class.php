    <?php
     require_once 'connect.php';
      class Manutencao extends Connect
     {
     	public function index($value = NULL)
     	{
        if($value == NULL){
          $value = 1;
        }
     		$this->query = "SELECT * FROM `manutencao` WHERE `Public` = '$value'";
     		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));
   		if($this->result){

        echo '<table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>Ativo</th>
        <th>Funcionário</th>
        <th>Aparelho</th>
        <th>Modelo</th>
        <th>IMEI</th>
        <th>Status</th>
        <th>Observação</th>
        <th>Grade</th>
        <th>Fornecedor</th>
        <th>Data</th>
        <th>Editar</th>
        <th>Info</th>
      </tr>
    </thead>
    <tbody>';

   			while ($row = mysqli_fetch_array($this->result)) {
          if($row['Ativo'] == 0){ $c ='class="label-warning"'; }else{ $c =" ";}
          echo '<tr '.$c.'><th>';
          $Ativo = $row['Ativo'];
          echo '<form class="label" name="ativ'.$row['idManutencao'].'" action="../../App/Database/action.php" method="post">
          <input type="hidden" name="id" id="id" value="'.$row['idManutencao'].'">
          <input type="hidden" name="status" id="status" value="'.$row['Ativo'].'">
          <input type="hidden" name="tabela" id="tabela" value="manutencao">  
          <input type="checkbox" id="status" name="status" ';
          if($row['Ativo'] == 1){ echo 'checked'; } 
          echo ' value="'.$row['Ativo'].'" onclick="this.form.submit();"></form>
          </th>';

          echo '<td>'.$row['FuncionarioManutencao'].'</td>
          <td>'.$row['AparelhoManutencao'].'</td>
          <td>'.$row['ModeloManutencao'].'</td>
          <td>'.$row['IMEIManutencao'].'</td>
          <td>'.$row['StatusManutencao'].'</td>
          <td>'.$row['ObservacaoManutencao'].'</td>
          <td>'.$row['GradeManutencao'].'</td>
          <td>'.$row['FornecedorManutencao'].'</td>
          <td>'.$row['DataRegistro'].'</td>
          
          <td>
              <a href="editmanutencao.php?id='.$row['idManutencao'].'"><i class="fa fa-edit"></i></a> 
          </td>
          <td>
              <a href="" data-toggle="modal" data-target="#myModal'.$row['idManutencao'].'">';
              if($row['Public'] == 0){echo '<i class="glyphicon glyphicon-search" aria-hidden="true"></i>';}else{ echo '<i class="glyphicon glyphicon-search" aria-hidden="true"></i>';}
              echo '</a>
  <div>
  <form id="delFix'.$row['idManutencao'].'" name="delFix'.$row['idManutencao'].'" action="../../App/Database/delManutencao.php" method="post" style="color:#000;">
  <div class="modal fade" id="myModal'.$row['idManutencao'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
          <input type="hidden" id="idManutencao" name="idManutencao" value="'.$row['idManutencao'].'">
          <div class="modal-footer">
            <button type="submit" value="Cancelar" class="btn btn-default">Fechar</button>
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

     	public function listmanutencao(){
     		$this->query = "SELECT * FROM `manutencao` WHERE (`Public` = 1) AND (`Ativo` = 1)";
     		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));
     		if($this->result){
     			while ($row = mysqli_fetch_array($this->result)) {
            if($value == $row['idManutencao']){
              $selected = "selected";
            }else{
              $selected = "";
            }
     				echo '<option value="'.$row['idManutencao'].'" '.$selected.' >'.$row['IMEIManutencao'].'</option>';
     			}
     	}
     }

     	public function InsertManutencao($FuncionarioManutencao, $AparelhoManutencao, $ModeloManutencao, $IMEIManutencao, $StatusManutencao, $ObservacaoManutencao, $GradeManutencao, $FornecedorManutencao, $Wifi, $ConectorUSB, $ConectorP2, $Bateria, $Display, $Touch, $Biometria, $Botoes, $Vibracall, $CamT, $CamF, $Flash, $Chip1, $Chip2, $AntRede, $Mic1, $Mic2, $Sensor, $VivaVoz, $SiriGoogle, $Carcaca, $Tela, $Traseira, $idUsuario, $status)
      {
        $this->query = "SELECT * FROM `manutencao` WHERE `IMEIManutencao` = '$IMEIManutencao'";
        $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));
        $total = mysqli_num_rows($this->result); 
        if($total > 0){       
          $row = mysqli_fetch_array($this->result);
          $idManutencao = $row['idManutencao'];
        }else{
         $query = "INSERT INTO `manutencao`(`FuncionarioManutencao`, `AparelhoManutencao`, `ModeloManutencao`, `IMEIManutencao`, `StatusManutencao`, `ObservacaoManutencao`, `GradeManutencao`, `FornecedorManutencao`, `Wifi`, `ConectorUSB`, `ConectorP2`, `Bateria`, `Display`, `Touch`, `Biometria`, `Botoes`, `Vibracall`, `CamT`, `CamF`, `Flash`, `Chip1`, `Chip2`, `AntRede`, `Mic1`, `Mic2`, `Sensor`, `VivaVoz`, `SiriGoogle`, `Carcaca`, `Tela`, `Traseira`, `Public`, `Ativo`, `Usuario_idUser`) VALUES ('$FuncionarioManutencao', '$AparelhoManutencao', '$ModeloManutencao', '$IMEIManutencao', '$StatusManutencao', '$ObservacaoManutencao', '$GradeManutencao', '$FornecedorManutencao', '$Wifi', '$ConectorUSB', '$ConectorP2', '$Bateria', '$Display', '$Touch', '$Biometria', '$Botoes', '$Vibracall', '$CamT', '$CamF', '$Flash', '$Chip1', '$Chip2', '$AntRede', '$Mic1', '$Mic2', '$Sensor', '$VivaVoz', '$SiriGoogle', '$Carcaca', '$Tela', '$Traseira', 1 , 1 , '$idUsuario')";
          $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
          $idManutencao = mysqli_insert_id($this->SQL);
        }
          if($idManutencao > 0){ 
              if($this->query = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
                  header('Location: ../../interface/manutencao/index.php?alert=1'); 
              }else{
                  header('Location: ../../interface/manutencao/index.php?alert=0');
              } 
            }else{
             header("Location: ../../interface/manutencao/index.php?alert=0");
            }
     	}

      public function EditManutencao($idManutencao){
        $this->query = "SELECT *FROM `manutencao` WHERE `idManutencao` = '$idManutencao'";
        if($this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL))){
          if($row = mysqli_fetch_array($this->result)){

            //Informações
            $FuncionarioManutencao = $row['FuncionarioManutencao'];
            $AparelhoManutencao = $row['AparelhoManutencao'];
            $ModeloManutencao = $row['ModeloManutencao'];
            $IMEIManutencao = $row['IMEIManutencao'];
            $StatusManutencao = $row['StatusManutencao'];
            $ObservacaoManutencao = $row['ObservacaoManutencao'];
            $GradeManutencao = $row['GradeManutencao'];
            $FornecedorManutencao = $row['FornecedorManutencao'];

            //Checklist
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

            //Cosmético
            $Carcaca = $row['Carcaca'];
            $Tela = $row['Tela'];
            $Traseira = $row['Traseira'];
            
            $Ativo = $row['Ativo'];
            $Usuario_idUser  = $row['Usuario_idUser'];

              $array = array('Manutencao' => array('Funcionario' => $FuncionarioManutencao, 'Aparelho' => $AparelhoManutencao, 'Modelo'=> $ModeloManutencao, 'IMEI'=>$IMEIManutencao, 'Status' => $StatusManutencao, 'Observacao' => $ObservacaoManutencao, 'Grade' => $GradeManutencao, 'Fornecedor' => $FornecedorManutencao, 'Ativo' => $Ativo, 'Wifi' => $Wifi, 'ConectorUSB' => $ConectorUSB, 'ConectorP2' => $ConectorP2, 'Bateria' => $Bateria, 'Display' => $Display, 'Touch' => $Touch, 'Biometria' => $Biometria, 'Botoes' => $Botoes, 'Vibracall' => $Vibracall, 'CamT' => $CamT, 'CamF' => $CamF, 'Flash' => $Flash, 'Chip1' => $Chip1, 'Chip2' => $Chip2, 'AntRede' => $AntRede, 'Mic1' => $Mic1, 'Mic2' => $Mic2, 'Sensor' => $Sensor, 'VivaVoz' => $VivaVoz, 'SiriGoogle' => $SiriGoogle, 'Carcaca' => $Carcaca, 'Tela' => $Tela, 'Traseira' => $Traseira, 'Usuario' => $Usuario_idUser ),);
              return $array;
          }

        }else{
          return 0;
        }
      }

      public function UpdateManutencao($idManutencao, $FuncionarioManutencao, $AparelhoManutencao, $ModeloManutencao, $IMEIManutencao, $StatusManutencao, $ObservacaoManutencao, $GradeManutencao, $FornecedorManutencao, $Wifi, $ConectorUSB, $ConectorP2, $Bateria, $Display, $Touch, $Biometria, $Botoes, $Vibracall, $CamT, $CamF, $Flash, $Chip1, $Chip2, $AntRede, $Mic1, $Mic2, $Sensor, $VivaVoz, $SiriGoogle, $Carcaca, $Tela, $Traseira, $Ativo, $idUsuario)
      {
        $this->query = "UPDATE `manutencao` SET `FuncionarioManutencao`= '$FuncionarioManutencao', `AparelhoManutencao`='$AparelhoManutencao',`ModeloManutencao`='$ModeloManutencao',`IMEIManutencao`='$IMEIManutencao',`StatusManutencao`='$StatusManutencao', `ObservacaoManutencao`='$ObservacaoManutencao', `GradeManutencao`='$GradeManutencao', `FornecedorManutencao`='$FornecedorManutencao', `Wifi`='$Wifi', `ConectorUSB`='$ConectorUSB', `ConectorP2`='$ConectorP2', `Bateria`='$Bateria', `Display`='$Display', `Touch`='$Touch', `Biometria`='$Biometria', `Botoes`='$Botoes', `Vibracall`='$Vibracall', `CamT`='$CamT', `CamF`='$CamF', `Flash`='$Flash', `Chip1`='$Chip1', `Chip2`='$Chip2', `AntRede`='$AntRede', `Mic1`='$Mic1', `Mic2`='$Mic2', `Sensor`='$Sensor', `VivaVoz`='$VivaVoz', `SiriGoogle`='$SiriGoogle', `Carcaca`='$Carcaca', `Tela`='$Tela', `Traseira`='$Traseira', `Ativo` = '$Ativo' ,`Usuario_idUser`='$idUsuario' WHERE `idManutencao` = '$idManutencao'";
        if($this->query = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
                  header('Location: ../../interface/manutencao/index.php?alert=5'); 
              }else{
                  header('Location: ../../interface/manutencao/index.php?alert=0');
              } 
      }

      public function DelManutencao($idManutencao)
      {
        $this->query = "SELECT * FROM `manutencao` WHERE `idManutencao` = '$idManutencao'";
        $this->result = mysqli_query($this->SQL, $this->query);
        if($row = mysqli_fetch_array($this->result)){
                $id = $row['idManutencao'];
                $public = $row['Public'];
                if($public == 1){
                  $p = 0;
                }else{
                  $p = 1;
                }
                mysqli_query($this->SQL, "UPDATE `manutencao` SET `Public` = '$p' WHERE `idManutencao` = '$id'") or die(mysqli_error($this->SQL));
                header('Location: ../../interface/manutencao/index.php?alert=1');
        }else{
                header('Location: ../../interface/manutencao/index.php?alert=0');
        } 
  }
    
    public function Ativo($value, $id)
    {
      if($value == 0){ $v = 1; }else{ $v = 0; }
      $this->query = "UPDATE `manutencao` SET `Ativo` = '$v' WHERE `idManutencao` = '$id'";
      $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
      header('Location: ../../interface/manutencao/');
    }
}

$manutencao = new Manutencao;