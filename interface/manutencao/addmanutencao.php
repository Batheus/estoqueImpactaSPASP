<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/produtos.class.php';
require_once '../../App/Models/fornecedor.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '
    <section class="content-header">
      <h1>
        Adicionar <small>Manutenção</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
        <li class="active">Manutenção</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">';

echo '
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Produto</h3>
            </div>
            <form role="form" enctype="multipart/form-data" action="../../App/Database/insertmanutencao.php" method="POST" autocomplete="off">
              <div class="box-body">
              	<div class="form-group">
                  <label for="exampleInputEmail1">SKU</label>
            <select class="form-control" name="codProduto">';
            $produtos->listProdutos();
            echo '</select>
            </div>
            <div class="form-group">
                  <label for="exampleInputEmail1">Fornecedor</label>
            <select class="form-control" name="idFornecedor">';
            $fornecedor->listfornecedor();
            echo '</select>
            </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Modelo</label>
                  <input type="text" name="ModeloManutencao" class="form-control" id="exampleInputEmail1" placeholder="Modelo">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Grade</label>
                  <input type="text" name="GradeManutencao" class="form-control" id="exampleInputEmail1" placeholder="Grade">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">IMEI</label>
                  <input type="text" name="IMEIManutencao" class="form-control" id="exampleInputEmail1" placeholder="IMEI">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Status da manutenção</label>
                  <input type="text" name="StatusManutencao" class="form-control" id="exampleInputEmail1" placeholder="Status da manutenção">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Observações</label>
                  <input type="text" name="ObsManutencao" class="form-control" id="exampleInputEmail1" placeholder="Observações">
                </div>
                 <input type="hidden" name="valor" value="#">
                 <input type="hidden" name="iduser" value="'.$idUsuario.'">
              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../interface/manutencao/">Cancelar</a>
              </div>
            </form>
          </div>
          </div>
</div>';
echo '</div>';
echo '</div>';
echo '</section>';
echo '</div>';
echo  $footer;
echo $javascript;
?>
