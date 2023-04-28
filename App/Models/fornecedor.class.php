<?php
require_once 'connect.php';

class Fornecedor extends Connect{
  public function index($perm, $value = NULL){
    if($perm != 1){
      echo "Você não tem permissão!";
      exit();
    }

    if($value == NULL){
      $value = 1;
    }

     $this->query = "SELECT * FROM `fornecedor` WHERE `Public` = '$value'";
     $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));
     if($this->result){
       while ($row = mysqli_fetch_array($this->result)) {
        if($row['Ativo'] == 0){ $c ='class="label-warning"'; }else{ $c =" ";}
         echo '<li '.$c.'>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                <form class="label" name="ativ'.$row['idFornecedor'].'" action="../../App/Database/action.php" method="post">
                <input type="hidden" name="id" id="id" value="'.$row['idFornecedor'].'">
                <input type="hidden" name="status" id="status" value="'.$row['Ativo'].'">
                <input type="hidden" name="tabela" id="tabela" value="fornecedor">                  
                <input type="checkbox" id="status" name="status" ';
                 if($row['Ativo'] == 1){ echo 'checked'; } 
                echo ' value="'.$row['Ativo'].'" onclick="this.form.submit();" /></form>
<span class="text"> '.$row['NomeFornecedor'].' </span>

                  <div class="tools right">
                  <a href="editfornecedor.php?id='.$row['idFornecedor'].'"><i class="fa fa-edit"></i></a>
                <a href="" data-toggle="modal" data-target="#myModal'.$row['idFornecedor'].'">';

                if($row['Public'] == 0){echo '<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>';}else{ echo '<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>';}

                echo '</a> </div>

<div class="modal fade" id="myModal'.$row['idFornecedor'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<form id="delFab'.$row['idFornecedor'].'" name="delFab'.$row['idFornecedor'].'" action="../../App/Database/delFornecedor.php" method="post" style="color:#000;">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Você tem certeza que deseja excluir este item?</h4>
      </div>
      <div class="modal-body">
        Nome: '.$row['NomeFornecedor'].'
      </div>
      <input type="hidden" id="idFornecedor" name="idFornecedor" value="'.$row['idFornecedor'].'">
      <div class="modal-footer">
        <button type="submit" value="Cancelar" class="btn btn-default">Não</button>
        <button type="submit" name="update" value="Cadastrar" class="btn btn-primary">Sim</button>
      </div>
    </div>
  </div>
</form>
</div>
</li>';
       }     			
     }
}

public function listfornecedor(){
     $this->query = "SELECT * FROM `fornecedor` WHERE (`Public` = 1) AND (`Ativo` = 1)";
     $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));
     if($this->result){
       while ($row = mysqli_fetch_array($this->result)) {
        if($value == $row['idFornecedor']){
          $selected = "selected";
        }else{
          $selected = "";
        }
         echo '<option value="'.$row['idFornecedor'].'" '.$selected.' >'.$row['NomeFornecedor'].'</option>';
       }
   }
}

public function InsertFornecedor($NomeFornecedor, $CNPJFornecedor, $EmailFornecedor, $EnderecoFornecedor, $TelefoneFornecedor, $idUsuario, $status , $perm){
    if($perm != 1){
      echo "Você não tem permissão!";
      exit();
    }

    $this->query = "SELECT * FROM `fornecedor` WHERE `NomeFornecedor` = '$NomeFornecedor'";
    $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

    $total = mysqli_num_rows($this->result); 

    if($total > 0){       
      $row = mysqli_fetch_array($this->result);
      $idFornecedor = $row['idFornecedor'];
    }
    else{
     $query = "INSERT INTO `fornecedor`(`NomeFornecedor`, `CNPJFornecedor`, `EmailFornecedor`, `EnderecoFornecedor`, `TelefoneFornecedor`, `Public`, `Ativo`, `Usuario_idUser`) VALUES ('$NomeFornecedor', '$CNPJFornecedor', '$EmailFornecedor', '$EnderecoFornecedor', '$TelefoneFornecedor', 1 , 1 , '$idUsuario')";
      $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
      $idFornecedor = mysqli_insert_id($this->SQL);
    }
      if($idFornecedor > 0){ 
          if($this->query = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
              header('Location: ../../interface/fornecedor/index.php?alert=1'); 
          }
          else{
              header('Location: ../../interface/fornecedor/index.php?alert=0');
          } 
        }
        else{
         header("Location: ../../interface/fornecedor/index.php?alert=0");
        }
}

public function EditFornecedor($idFornecedor){
    $this->query = "SELECT *FROM `fornecedor` WHERE `idFornecedor` = '$idFornecedor'";
    if($this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL))){
      if($row = mysqli_fetch_array($this->result)){
        $NomeFornecedor = $row['NomeFornecedor'];
        $CNPJFornecedor = $row['CNPJFornecedor'];
        $EmailFornecedor = $row['EmailFornecedor'];
        $EnderecoFornecedor = $row['EnderecoFornecedor'];
        $TelefoneFornecedor = $row['TelefoneFornecedor'];
        $Ativo = $row['Ativo'];
        $Usuario_idUser  = $row['Usuario_idUser'];
          $array = array('Fornecedor' => array('Nome' => $NomeFornecedor, 'CNPJ' => $CNPJFornecedor, 'Email'=> $EmailFornecedor, 'Endereco'=>$EnderecoFornecedor, 'Telefone' => $TelefoneFornecedor, 'Ativo' => $Ativo, 'Usuario' => $Usuario_idUser ),);
          return $array;
      }
    }
    else{
      return 0;
    }
}

public function UpdateFornecedor($idFornecedor, $NomeFornecedor, $CNPJFornecedor, $EmailFornecedor, $EnderecoFornecedor, $TelefoneFornecedor, $Ativo, $idUsuario, $perm){
    if($perm != 1){
      echo "Você não tem permissão!";
      exit();
    }

    $this->query = "UPDATE `fornecedor` SET `NomeFornecedor`= '$NomeFornecedor', `CNPJFornecedor`='$CNPJFornecedor',`EmailFornecedor`='$EmailFornecedor',`EnderecoFornecedor`='$EnderecoFornecedor',`TelefoneFornecedor`='$TelefoneFornecedor', `Ativo` = '$Ativo' ,`Usuario_idUser`='$idUsuario' WHERE `idFornecedor` = '$idFornecedor'";
    if($this->query = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
              header('Location: ../../interface/fornecedor/index.php?alert=5'); 
          }
          else{
              header('Location: ../../interface/fornecedor/index.php?alert=0');
          } 
  }
  
public function DelFornecedor($idFornecedor, $perm){
    if($perm != 1){
      echo "Você não tem permissão!";
      exit();
    }
      $this->query = "DELETE FROM `fornecedor` WHERE `idFornecedor` = '$idFornecedor'";
      if($this->query = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
        header('Location: ../../interface/fornecedor/index.php?alert=5'); 
    }
    else{
        header('Location: ../../interface/fornecedor/index.php?alert=0');
    } 
}

public function Ativo($value, $id)
{
  if($value == 0){ $v = 1; }else{ $v = 0; }
  $this->query = "UPDATE `fornecedor` SET `Ativo` = '$v' WHERE `idFornecedor` = '$id'";
  $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
  header('Location: ../../interface/fornecedor/');
}
}

$fornecedor = new Fornecedor;