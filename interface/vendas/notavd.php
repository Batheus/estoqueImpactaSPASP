<?php
require_once '../../App/auth.php';

if(isset($_SESSION['notavd']) != NULL){
  require_once '../../layout/script.php';
  require_once '../../App/Models/cliente.class.php';
  require_once '../../App/Models/vendas.class.php';
  echo $head;
  echo $header;
  echo $aside;
  ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Vendas
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
        <li class="active">Vendas</li>
      </ol>
    </section>

    <section class="content">
      <?php require '../../layout/alert.php'; ?>
      <div class="row">
        <div class="box box-primary">
          <div class="box-body">
            <div class="row">
              <div class="box-body">
                <div class="col-xs-12 col-sm-12">
                  <?php 
                      if(isset($_SESSION['msg']) != NULL){
                        echo $_SESSION['msg'];
                      }
                  ?>
                </div>
              </div>

              <div id="print" class="row">
                <style type="text/css">
                  table{
                    width:100%;
                    border: 1px solid #000;
                    border-collapse: collapse;

                  }
                  table tr td{
                    border: 1px solid #000; 
                    border-collapse: collapse;
                    text-spacing: 2px;
                    line-height: 1.6;
                    padding-left: 5px;
                  }
                </style>
                <div class="box-body">
                  <div class="col-xs-12 col-sm-12">
                    <div class="table-responsive">
                      <table id="table_notavd" class="table table-bordred table-striped">
                        
                        <?php 
                        $cartvd = $_SESSION['notavd'];
                        $vendas = new vendas;
                        $row = $vendas->notavd($cartvd);
                        $cliente = new cliente;
                        $dados = $cliente->dadoscliente($row[0]['cliente_idCliente']);
                        ?>
                        <tr>
                          <td colspan="6">
                            Cliente: <?php echo $dados['NomeCliente']; ?>
                            </br>CPF: <?php echo $connect->format_CPF($dados['cpfCliente']); ?>
                          </td>
                        </tr>
                            <tr>
                              <td>ID Item</td>
                              <td>Produto</td>
                              <td>Fornecedor</td>
                              <td>IMEI</td>
                              <td>Situação</td>
                              <td>Quantidade</td>
                            </tr>

                            <?php
                            $soma = 0;
                            foreach ($row as $key) {
                              $vendas = new vendas;
                              $dadosItem = $vendas->dadosItem($key["iditem"]);
                              $nomeProduto = $dadosItem['NomeProduto'];
                              $NomeFornecedor = $dadosItem['NomeFornecedor'];

                              echo "<tr>";
                              echo '<td>' . $key["iditem"] .    '</td>';
                              echo '<td>' . $nomeProduto .      '</td>';
                              echo '<td>' . $NomeFornecedor .   '</td>';
                              echo '<td>' . $key["IMEI"] .'</td>';
                              echo '<td>' . $key["situacao"] .'</td>';
                              echo '<td>' . $key["quantitens"] .'</td>';
                              echo "</tr>";
                            }
                            ?>
                            <tr>
                              <td colspan="6">Data: <?php echo date('d M Y H:i:s'); ?> </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a href="./"><button class="btn btn-success">Voltar</button></a>
            <input type="button" class="btn btn-primary" onclick="cont();" value="Imprimir">          
        </div>
      </section>
    </div>
  <?php
        unset($_SESSION['msg'],$_SESSION['CPF'], $_SESSION['Cliente'], $_SESSION['Email'], $_POST);
        echo  $footer;
        echo $javascript;
      }
      else{
        header('Location: ../');
        exit();
      }
  ?>