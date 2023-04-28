<?php
require_once 'connect.php';
class Cliente extends Connect{
	function index($value, $perm){
		if($perm != 1){
          echo "Você não tem permissão!";
          exit();
        }

        if($value == NULL){
          $value = 1;
        }

     		$this->query = "SELECT * FROM `cliente` WHERE `statusCliente` = '$value'";
     		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));
     		if($this->result){
     			while ($row = mysqli_fetch_array($this->result)) {
             echo '<li>
                          <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                          </span>
                    <form class="label" name="ativ'.$row['idCliente'].'" action="../../App/Database/action.php" method="post">
                    <input type="hidden" name="id" id="id" value="'.$row['idCliente'].'">
                    <input type="hidden" name="tabela" id="tabela" value="cliente"></form>';
                    echo '
    <span class="text"> '.$row['NomeCliente'].' </span>
                      <div class="tools right">
                      <a href="editcliente.php?id='.$row['idCliente'].'"><i class="fa fa-edit"></i></a>
                    <a href="" data-toggle="modal" data-target="#myModal'.$row['idCliente'].'">';
                    echo '</a> </div>
    <div class="modal fade" id="myModal'.$row['idCliente'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="delFab'.$row['idCliente'].'" name="delFab'.$row['idCliente'].'" action="../../App/Database/delcliente.php" method="post" style="color:#000;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Você tem certeza que deseja excluir este item?</h4>
          </div>
          <div class="modal-body">
            Nome: '.$row['NomeCliente'].'
          </div>
          <input type="hidden" id="idCliente" name="idCliente" value="'.$row['idCliente'].'">
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

function insertCliente($NomeCliente, $EmailCliente, $cpfCliente, $idUsuario, $perm){
       if($perm == 1){
        $cpfCliente = connect::limpaCPF_CNPJ($cpfCliente);
        $idCliente = Cliente::idCliente($cpfCliente);

        if($idCliente > 0){
          return 2;
        }else{

        $NomeCliente = mysqli_real_escape_string($this->SQL, $NomeCliente);
        $EmailCliente = mysqli_real_escape_string($this->SQL, $EmailCliente);
        $cpfCliente = mysqli_real_escape_string($this->SQL, $cpfCliente);

        $query = "INSERT INTO `cliente`(`idCliente`, `NomeCliente`, `EmailCliente`, `cpfCliente`, `statusCliente`, `Usuario_idUsuario`) VALUES (NULL,'$NomeCliente','$EmailCliente','$cpfCliente',1,'$idUsuario')";
        $result = mysqli_query($this->SQL, $query) or die ( mysqli_error($this->SQL));

        if($result){
            return 1;
          }
          else{
            return 0;
          }
        }
          mysqli_close($this->SQL);
      }
    }

function updateCliente($idCliente, $NomeCliente, $EmailCliente, $cpfCliente, $idUsuario, $perm){
        if($perm == 1){
          $cpfCliente = connect::limpaCPF_CNPJ($cpfCliente);
          $NomeCliente = mysqli_real_escape_string($this->SQL, $NomeCliente);
          $EmailCliente = mysqli_real_escape_string($this->SQL, $EmailCliente);
          $cpfCliente = mysqli_real_escape_string($this->SQL, $cpfCliente);

          $this->query = "UPDATE `cliente` SET `NomeCliente`='$NomeCliente',`EmailCliente`='$EmailCliente',`cpfCliente`='$cpfCliente', `Usuario_idUsuario`= '$idUsuario' WHERE `idCliente`= '$idCliente'";
          $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

          if($this->result){
            return 1;
          }
          else{
            return 0;
          }
          mysqli_close($this->SQL);
        }
}

public function EditCliente($idCliente){
  $this->query = "SELECT *FROM `cliente` WHERE `idcliente` = '$idCliente'";
  if($this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL))){
    if($row = mysqli_fetch_array($this->result)){
      $NomeCliente = $row['NomeCliente'];
      $cpfCliente = $row['cpfCliente'];
      $EmailCliente = $row['EmailCliente'];
      $Usuario_idUsuario  = $row['Usuario_idUsuario'];
        $array = array('Cliente' => array('Nome' => $NomeCliente, 'CPF' => $cpfCliente, 'Email'=> $EmailCliente, 'Usuario' => $Usuario_idUsuario ),);
        return $array;
    }
  }
  else{
    return 0;
  }
}

function statusCliente($status, $idCliente){
        $this->query = "UPDATE `cliente` SET `statusCliente`= '$status' WHERE `idCliente`= '$idCliente'";
        $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));
        if($this->result){
          return 1;
        }
        else{
          return 0;
        }
        mysqli_close($this->SQL);
}

function deleteCliente($idCliente){
        $this->query = "DELETE FROM `cliente` WHERE `idCliente`= '$idCliente'";
        $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));
        if($this->result){
          return 1;
        }
        else{
          return 0;
        }
        mysqli_close($this->SQL);
}

public function idcliente($cpfCliente){
        $this->client = "SELECT * FROM `cliente` WHERE `cpfCliente` = '$cpfCliente'";
            if($this->resultcliente = mysqli_query($this->SQL, $this->client)  or die (mysqli_error($this->SQL))){
                $row = mysqli_fetch_array($this->resultcliente);
                return $idCliente = $row['idCliente'];
            }
}

function search($value){
        if(isset($value)){
          $query = "SELECT * FROM `cliente` WHERE `cpfCliente` LIKE '".$value."%' OR `NomeCliente` LIKE '".$value."%' LIMIT 5";  
          $result = mysqli_query($this->SQL, $query); 
          if(mysqli_num_rows($result) > 0)  
          {  
           while($row = mysqli_fetch_array($result))  
           {  
            $output[] = $row; 
          } 
          return array('data' => $output);
        }
        else{
          return 0;
        }  
      }
    }

function searchdata($value){
      $value = explode(' ', $value);
      $valor = str_replace("." , "" , $value[0] );
      $valor = str_replace("-" , "" , $valor);
      $value = $valor;
      if(isset($value))  
      {
        $query = "SELECT * FROM `cliente` WHERE `cpfCliente` = '$value'";  
        $result = mysqli_query($this->SQL, $query);  
        if(mysqli_num_rows($result) > 0)  
        {
          if($row = mysqli_fetch_array($result))  
          {  
            $output[] = $row; 
          }  
          return array('data' => $output); 
        }else{
          return $value;
        } 
      }  
}
    
public function dadoscliente($idCliente){
        $this->client = "SELECT * FROM `cliente` WHERE `idCliente` = '$idCliente'";
            if($this->resultcliente = mysqli_query($this->SQL, $this->client)  or die (mysqli_error($this->SQL))){
                $row = mysqli_fetch_array($this->resultcliente);
                return $row;
            }
    }
}

$cliente = new Cliente;