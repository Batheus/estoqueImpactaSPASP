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
        Adicionar <small>Usuário</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
        <li class="active">Usuário</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">';
echo ' 
      <div class="row">
';

if($perm == 1){
  echo '
    <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Usuário</h3>
            </div>
            <form role="form" enctype="multipart/form-data" action="../../App/Database/insertuser.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome do Usuário:</label>
                  <input type="text" name="Username" class="form-control" id="exampleInputEmail1" placeholder="Nome">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail do Usuário:</label>
                  <input type="text" name="Email" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Insira sua senha:</label>
                  <input type="password" name="senha" class="form-control" id="exampleInputEmail1" placeholder="Senha">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Imagem</label>
                  <input type="file" name="arquivo" class="form-control">
                </div>

                <input type="hidden" name="valor" value="#">

                <div class="form-group">
                  <label for="exampleInputEmail1">Insira a permissão do usuário:</label>
                    <select name="Permissao" class="form-control">
                      <option value="1">Administrador (Valor: 1)</option>
                      <option value="2">Vendedor (Valor: 2)</option>
                    </select>
                </div>

                <div class="box-footer">
                  <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                  <a class="btn btn-danger" href="../../interface/usuarios">Cancelar</a>
                </div>
            </form>
';}
else{
  echo '<div class="col-md-12">  
          <div class="box box-primary">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Você não possui acesso!</h3>
            </div> 
            ';
}
echo '
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