<?php
  require_once '../../App/auth.php';
  require_once '../../layout/script.php';

  echo $head;
  echo $header;
  echo $aside;
  echo '<div class="content-wrapper">';
  require '../../layout/alert.php';

if($perm != 1){
          echo "Você não tem permissão! </div>";
          exit();
        }

  echo '
      <section class="content-header">
        <h1>
          Adicionar <small>Cliente</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Cliente</li>
        </ol>
      </section>

      <section class="content">
        <div class="row">';

  echo '<a href="./" class="btn btn-success">Voltar</a>
        <div class="row">
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Cliente</h3>
              </div>
              <form role="form" action="../../App/Database/insertcliente.php" method="POST">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome Cliente</label>
                    <input type="text" name="NomeCliente" class="form-control" id="exampleInputEmail1" placeholder="Nome Cliente">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CPF</label>
                    <input type="text" name="cpfCliente" class="form-control" id="exampleInputEmail1" placeholder="CPF">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" name="EmailCliente" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                  </div>

                <div class="box-footer">
                  <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                  <a class="btn btn-danger" href="../../interface/cliente">Cancelar</a>
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