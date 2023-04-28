  <?php
   require_once 'connect.php';
   class Itens extends Connect{
    public function listItens ($idprodutos, $idFornecedor)
    {
      $query = "SELECT * FROM `itens`,`fornecedor`,`produtos` WHERE (`Fornecedor_idFornecedor` = `idFornecedor` AND `Produto_CodRefProduto` = `CodRefProduto`) AND (`Fornecedor_idFornecedor` = '$idFornecedor' AND `Produto_CodRefProduto` = '$idprodutos') ";
      $result = mysqli_query($this->SQL, $query) or die ( mysqli_error($this->SQL));
       $q = 0;
       $v = 0;
       $e = 0;
     while($rowlist = mysqli_fetch_array($result)) {
           $q = $q + $rowlist['QuantItens'];  
           $v = $v + $rowlist['QuantItensVend'];   
           $e = $q - $v;               
           $skuProduto = $rowlist['skuProduto'];
           $fornecedor  = $rowlist['NomeFornecedor'];
      }
        return array('skuProduto'=> $skuProduto,'Fornecedor'=> $fornecedor , 'QuantItens' => $q, 'QuantItensVend' => $v, 'Estoque' => $e,); 
    }

    public function totalitens($value){
      $this->query = "SELECT `Produto_CodRefProduto`, `Fornecedor_idFornecedor` FROM `itens` WHERE `itensPublic` = '$value' GROUP BY `Produto_CodRefProduto`, `Fornecedor_idFornecedor`";
      $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));
      while ($row = mysqli_fetch_array($this->result)) {
        $idprodutos = $row['Produto_CodRefProduto'];
        $idFornecedor = $row['Fornecedor_idFornecedor'];
        echo '<li>';
       $resp = Itens::listItens($idprodutos, $idFornecedor);
        echo '<b> Produto: '.$resp['skuProduto'];
        echo ' / Fornecedor: '.$resp['Fornecedor'];
        echo '</b> Comprados: '.$resp['QuantItens'];
        echo ' | Vendidos: '.$resp['QuantItensVend'];
        echo ' | Em Estoque: '.$resp['Estoque'];
        echo '</li>';
      }
    }
   	public function index($value){
   		$this->query = "SELECT * FROM `itens`,`fornecedor`,`produtos` WHERE (`Fornecedor_idFornecedor` = `idFornecedor` AND `Produto_CodRefProduto` = `CodRefProduto`) AND `itensPublic` = '$value'";
   		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

       $q = 0;
       $v = 0;
       $e = 0;

   		if($this->result){

        echo '<table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>Imagem</th>
        <th>ID</th>
        <th>SKU</th>
        <th>Fornecedor</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Memória</th>
        <th>Cor</th>
        <th>Grade</th>
        <th>Local</th>
        <th>Quant. Estoque</th>
        <th>Quant. Saída</th>
        <th>Estoque Atual</th>
        <th>Editar</th>
        <th>Deletar</th>
      </tr>
    </thead>
    <tbody>';

   			while ($row = mysqli_fetch_array($this->result)) {
          $q = $row['QuantItens'];  
          $v = $row['QuantItensVend'];   
          $e = $q - $v; 
          echo '<tr><th>';
          $id = $row['idItens'];

          echo '<form class="label" name="ativ'.$id.'" action="../../App/Database/action.php" method="post">
          <input type="hidden" name="id" id="id" value="'.$id.'">
          <input type="hidden" name="tabela" id="tabela" value="itens"></form>';
           if(!empty($row['Image'])){
            echo '<img src="../'.$row['Image'].'" width="50" />';
          }
          
          echo '</td><td>'.$row['idItens'].'</td>
          <td>'.$row['skuProduto'].'</td>
          <td>'.$row['NomeFornecedor'].'</td>
          <td>'.$row['MarcaItens'].'</td>
          <td>'.$row['ModeloItens'].'</td>
          <td>'.$row['MemoriaItens'].'</td>
          <td>'.$row['CorItens'].'</td>
          <td>'.$row['GradeItens'].'</td>  
          <td>'.$row['LocalItens'].'</td> 
          <td>'.$row['QuantItens'].'</td>
          <td>'.$row['QuantItensVend'].'</td>
          <td>'.$e.'</td>
          
          <td>
                <a href="edititens.php?q='.$row['idItens'].'"><i class="fa fa-edit"></i></a>
          </td>
          <td>
                    <a href="" data-toggle="modal" data-target="#myModal'.$row['idItens'].'">';
                    if($row['Public'] == 0){echo '<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>';}else{ echo '<i class="glyphicon glyphicon-trash" aria-hidden="true"></i>';}
                    echo '</a>
  <div>
    <form id="delItens'.$row['idItens'].'" name="delItens'.$row['idItens'].'" action="../../App/Database/delItens.php" method="post" style="color:#000;">
    <div class="modal fade" id="myModal'.$row['idItens'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Você tem certeza que deseja deletar este item?</h4>
          </div>
          <div class="modal-body">
            Código: '.$row['idItens'].' - '.$row['skuProduto'].' - '.$row['NomeFornecedor'].'
          </div>
          <input type="hidden" id="id" name="id" value="'.$row['idItens'].'">
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

      public function InsertItens($nomeimagem, $QuantItens, $MarcaItens, $ModeloItens, $MemoriaItens, $CorItens, $GradeItens, $LocalItens, $Produto_CodRefProduto, $Fornecedor_idFornecedor, $idusuario){
       $this->query = "INSERT INTO `itens`(`idItens`,`Image` ,`QuantItens`, `QuantItensVend`, `MarcaItens`, `ModeloItens`, `MemoriaItens`, `CorItens`, `GradeItens`, `LocalItens`, `ItensAtivo`,`ItensPublic`, `Produto_CodRefProduto`, `Fornecedor_idFornecedor`, `Usuario_idUser`) VALUES 
       (NULL, '$nomeimagem', '$QuantItens', 0, '$MarcaItens', '$ModeloItens', '$MemoriaItens', '$CorItens', '$GradeItens', '$LocalItens', 1, 1, '$Produto_CodRefProduto', '$Fornecedor_idFornecedor', '$idusuario')";
       if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
        header('Location: ../../interface/itens/index.php?alert=1');
      }
      else{
        header('Location: ../../interface/itens/index.php?alert=0');
      }
   	}

    public function editItens($value)
    {
      $this->query = "SELECT *FROM `itens` WHERE `idItens` = '$value'";
      $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

      if($row = mysqli_fetch_array($this->result)){
        $idItens = $row['idItens'];
        $nomeimagem = $row['Image'];
        $QuantItens = $row['QuantItens'];
        $MarcaItens = $row['MarcaItens'];
        $ModeloItens = $row['ModeloItens'];
        $MemoriaItens = $row['MemoriaItens'];
        $CorItens= $row['CorItens'];
        $GradeItens = $row['GradeItens'];
        $LocalItens = $row['LocalItens'];
        $Produto_CodRefProduto = $row['Produto_CodRefProduto'];
        $Fornecedor_idFornecedor = $row['Fornecedor_idFornecedor'];

        return $resp = array('Itens' => ['idItens' => $idItens,
          'Image' => $nomeimagem,
          'QuantItens'   => $QuantItens,
          'MarcaItens' => $MarcaItens,
          'ModeloItens' => $ModeloItens,
          'MemoriaItens' => $MemoriaItens,
          'CorItens' => $CorItens,
          'GradeItens' => $GradeItens,
          'LocalItens' => $LocalItens,
          'CodRefProduto' => $Produto_CodRefProduto,
          'idFornecedor' => $Fornecedor_idFornecedor ] , );  
      }
    }

    public function updateItens($idItens, $nomeimagem, $QuantItens, $MarcaItens, $ModeloItens, $MemoriaItens, $CorItens, $GradeItens, $LocalItens, $Produto_CodRefProduto, $Fornecedor_idFornecedor, $idusuario)
    {
      $this->query = "UPDATE `itens` SET
      `Image` = '$nomeimagem', 
      `QuantItens`= '$QuantItens',
      `MarcaItens`='$MarcaItens',
      `ModeloItens`='$ModeloItens',
      `MemoriaItens`='$MemoriaItens',
      `CorItens`='$CorItens',
      `GradeItens`='$GradeItens',
      `LocalItens`='$LocalItens',
      `Produto_CodRefProduto`='$Produto_CodRefProduto',
      `Fornecedor_idFornecedor`='$Fornecedor_idFornecedor',
      `Usuario_idUser`='$idusuario' 
      WHERE `idItens`= '$idItens'";

      if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
        header('Location: ../../interface/itens/index.php?alert=1');
      }
      else{
        header('Location: ../../interface/itens/index.php?alert=0');
      }
    }

    public function QuantItensVend($value, $idItens)
    { 
      $this->query = "UPDATE `itens` SET `QuantItensVend` = '$value' WHERE `idItens`= '$idItens'";
      if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
        header('Location: ../../interface/itens/index.php?alert=1');
      }
      else{
        header('Location: ../../interface/itens/index.php?alert=0');
      }
    }

     public function DelItens($value){
        $this->query = "DELETE FROM `itens` WHERE `idItens` = '$value'";
        if($this->query = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){
          header('Location: ../../interface/itens/index.php?alert=5'); 
        }
        else{
            header('Location: ../../interface/itens/index.php?alert=0');
        }
    } 

    public function Ativo($value, $id)
    {
      if($value == 0){ $v = 1; }else{ $v = 0; }
      $this->query = "UPDATE `itens` SET `ItensAtivo` = '$v' WHERE `idItens` = '$id'";
      $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
      header('Location: ../../interface/itens/');
    }
}

$itens = new Itens;