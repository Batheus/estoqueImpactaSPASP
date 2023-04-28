<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/cliente.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';

if($perm != 1){
          echo "Você não tem permissão! </div>";
          exit();
}
echo '<section class="content-header">
      <h1>
        Cliente
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
        <li class="active">Cliente</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">';

echo '<a href="./" class="btn btn-success">Voltar</a>
      <div class="row">
        <!-- left column -->';
        if(isset($_GET['id'])){
          $idCliente = $_GET['id'];
       $resp = $cliente->EditCliente($idCliente);

  echo '<div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Cliente</h3>
            </div>
            <form role="form" action="../../App/Database/insertcliente.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome do Cliente</label>
                  <input type="text" name="NomeCliente" class="form-control" id="exampleInputEmail1" placeholder="Cliente" value="'.$resp['Cliente']['Nome'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">CPF</label>
                  <input type="text" name="cpfCliente" class="form-control" id="exampleInputEmail1" placeholder="CPF" value="'.$resp['Cliente']['CPF'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="text" name="EmailCliente" class="form-control" id="exampleInputEmail1" placeholder="E-mail" value="'.$resp['Cliente']['Email'].'">
                </div>
                </div>
                 <input type="hidden" name="iduser" value="'.$idUsuario.'">
                 <input type="hidden" name="idCliente" value="'.$idCliente.'">
              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../interface/cliente">Cancelar</a>
              </div>
            </form>
          </div>
          </div>
</div>';
}
echo '</div>';
echo '</div>';
echo '</section>';
echo '</div>';
echo  $footer;
echo $javascript;
?>