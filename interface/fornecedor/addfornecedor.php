  <?php
  require_once '../../App/auth.php';
  require_once '../../layout/script.php';

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
          Adicionar <small>Fornecedor</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
          <li class="active">Fornecedor</li>
        </ol>
      </section>
      <section class="content">
        <div class="row">';

  echo '<a href="./" class="btn btn-success">Voltar</a>
        <div class="row">
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Fornecedor</h3>
              </div>
              <form role="form" action="../../App/Database/insertfornecedor.php" method="POST">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome do Fornecedor</label>
                    <input type="text" name="NomeFornecedor" class="form-control" id="exampleInputEmail1" placeholder="Fornecedor">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CNPJ</label>
                    <input type="text" name="CNPJFornecedor" class="form-control" id="exampleInputEmail1" placeholder="CNPJ">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" name="EmailFornecedor" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereço</label>
                    <input type="text" name="EnderecoFornecedor" class="form-control" id="exampleInputEmail1" placeholder="Endereço">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Telefone</label>
                    <input type="text" name="TelefoneFornecedor" class="form-control" id="exampleInputEmail1" placeholder="Telefone">
                  </div>
                  <div class="form-group"><label for="exampleInputEmail1">Publicar</label>
                  <label class="radio-inline">
                    <input type="radio" name="Public" value="1">Sim
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Public" value="0">Não
                  </label>
                  </div>
                   <input type="hidden" name="iduser" value="'.$idUsuario.'">

                <div class="box-footer">
                  <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                  <a class="btn btn-danger" href="../../interface/fornecedor">Cancelar</a>
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