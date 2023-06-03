<?php
require_once 'connect.php';
class Vendas extends Connect
{
    public function itensVerify($iditem, $quant){
    $this->query = "SELECT * FROM `itens`, `produtos` WHERE `idItens` = '$iditem' AND `Produto_CodRefProduto` = `CodRefProduto`";
    $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
    $total = mysqli_num_rows($this->result);
        if($total > 0){
            if($row = mysqli_fetch_array($this->result)){
                $q = $row['QuantItens'];
                $v = $row['QuantItensVend'];
                $quantotal = $v + $quant;

                if($q >= $quantotal){
                    return array('status' => '1', 'NomeProduto' => $row['NomeProduto'], );
                }
                else{
                    $estoque = $q - $v;
                    return array('status' => '0', 'NomeProduto' => $row['NomeProduto'], 'estoque'=> $estoque);
                }
            }
        }
        else{
            $_SESSION['msg'] =  '<div class="alert alert-warning">
            <strong>Ops!</strong> Produto ('.$iditem.') não encontrado!</div>';
            header('Location: ../../interface/vendas/index.php');
            exit;
        }
    }

	public function itensVendidos($iditem, $quant, $cliente, $email, $cpfcliente, $IMEI, $situacao, $cart, $idUsuario){
    	$cpfcliente = intval(Connect::limpaCPF_CNPJ($cpfcliente));
        $this->query = "SELECT * FROM `itens` WHERE `idItens`= '$iditem'";
        $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
        if($this->result){
            if($row = mysqli_fetch_array($this->result)){
                $q = $row['QuantItens'];
                $v = $row['QuantItensVend'];
                $quantotal = $v + $quant;
                if($q >= $quantotal){
                    $id = Vendas::idCliente($cpfcliente);
                    if($id > 0){
                        $idCliente = $id;
                    }
                    else{
                        $this->novoclient = "INSERT INTO `cliente`(`idCliente`, `NomeCliente`, `EmailCliente`, `cpfCliente`, `IMEI`, `situacao`, `statusCliente`, `Usuario_idUsuario`) VALUES (NULL,'$cliente','$email','$cpfcliente','$IMEI','$situacao',1,'$idUsuario')";
                            if(mysqli_query($this->SQL, $this->novoclient) or die (mysqli_error($this->SQL))){
                            $idCliente = mysqli_insert_id($this->SQL);
                            }                            
                    }
                    $this->query = "INSERT INTO `vendas`(`idvendas`, `quantitens`, `IMEI`, `situacao`, `iditem`, `cart`, `cliente_idCliente`, `idusuario`) VALUES (NULL, '$quant', '$IMEI', '$situacao', '$iditem', '$cart', '$idCliente', '$idUsuario')";
                    if($this->result = mysqli_query($this->SQL, $this->query) or die (mysqli_error($this->SQL))){
                    $this->query = "UPDATE `itens` SET `QuantItensVend` = '$quantotal' WHERE `idItens`= '$iditem'";
                    if($this->result = mysqli_query($this->SQL, $this->query) or die (mysqli_error($this->SQL))){
                        unset($_SESSION['itens']);
                        $_SESSION['notavd'] = $cart;
                        $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Sucesso!</strong> Venda efetuada!</div>';
                    }
                    }
                    else{
                            $_SESSION['msg'] =  '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Erro!</strong> Venda não efetuada! </div>';
                    header('Location: ../../interface/vendas/');
                    exit();  
                    }
                }
                else{
                    $estoque = $row['QuantItens'] - $row['QuantItensVend'];
                    $_SESSION['msg'] =  '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Ops!</strong> Quantidade maior do que em estoque! </br> Quantidade em estoque: <b>'.$estoque . '</b></div>';
                    header('Location: ../../interface/vendas/');
                    exit();
                }
                header('Location: ../../interface/vendas/notavd.php');
        	}
        }else{
            $_SESSION['alert'] = 0;
        	header('Location: ../../interface/vendas/');
        }
	}

    public function idcliente($cpfCliente){
        $this->client = "SELECT * FROM `cliente` WHERE `cpfCliente` = '$cpfCliente'";
            if($this->resultcliente = mysqli_query($this->SQL, $this->client)  or die (mysqli_error($this->SQL))){
                $row = mysqli_fetch_array($this->resultcliente);
                return $idCliente = $row['idCliente'];
            }
    }

    public function itemNome($idItens){
    $query = "SELECT * FROM `produtos` WHERE `CodRefProduto` IN (SELECT `Produto_CodRefProduto` FROM `itens` WHERE `idItens` = '$idItens' AND `ItensAtivo` = 1 AND `ItensPublic` = 1)";
    $result = mysqli_query($this->SQL, $query)  or die (mysqli_error($this->SQL));
        $row = mysqli_fetch_array($result);
        if($row['NomeProduto'] != NULL){    
            $resp = $row['NomeProduto'];
    }else{
      $resp = NULL;
    }
    return $resp;
  }

    public function notavd($cart){
    $query = "SELECT * FROM `vendas` WHERE `cart` = '$cart' ";
    if($this->result = mysqli_query($this->SQL, $query)  or die (mysqli_error($this->SQL))){
            while($row = mysqli_fetch_array($this->result)){
            $out[] = $row;
            }
    }
    return $out;
}

    public function dadosItem($idItem){
        $query = "SELECT * FROM `fornecedor`, `produtos`, `itens` WHERE `idItens` = '$idItem' AND `Produto_CodRefProduto` = `CodRefProduto` AND `Fornecedor_idFornecedor` = `idFornecedor`";
        if($this->result = mysqli_query($this->SQL, $query)  or die (mysqli_error($this->SQL))){
            $row = mysqli_fetch_array($this->result);
            return $row;
        }
    }
}
