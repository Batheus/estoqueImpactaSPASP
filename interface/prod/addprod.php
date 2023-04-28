<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '
    <section class="content-header">
      <h1>
        Adicionar <small>SKU</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
        <li class="active">SKU</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">';

echo '<a href="./" class="btn btn-success">Voltar</a>
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Adicione seu SKU</h3>
            </div>
            <form role="form" action="../../App/Database/insertprod.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome do Produto:</label>
                  <input type="text" name="nomeProduto" class="form-control" id="exampleInputEmail1" placeholder="Nome do Produto">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">SKU:</label>
                  <input type="text" name="skuProduto" class="form-control" id="exampleInputEmail1" placeholder="SKU">
                </div>
                 <input type="hidden" name="iduser" value="'.$idUsuario.'">

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../interface/prod">Cancelar</a>
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