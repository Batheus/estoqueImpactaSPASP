<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/usuario.class.php';
if(isset($_GET['q'])){
$resp = $usuario->editUser($_GET['q']);
echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '
    <section class="content-header">
      <h1>
        Editar <small>Usuário</small>
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
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Usuário</h3>
            </div>
            <form role="form" enctype="multipart/form-data" action="../../App/Database/insertuser.php" method="POST">
              <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputEmail1">Nome do Usuário:</label>
                  <input type="text" name="Username" class="form-control" id="exampleInputEmail1" placeholder="Nome do Usuário" value="'.$resp['Usuario']['Username'].'">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email do Usuário:</label>
                  <input type="text" name="Email" class="form-control" id="exampleInputEmail1" placeholder="Email do Usuário" value="'.$resp['Usuario']['Email'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Senha de acesso:</label>
                  <input type="text" name="senha" class="form-control" id="exampleInputEmail1" placeholder="Senha de acesso" value="">
                </div>

                <div class="form-group">
                <img src="../'.$resp['Usuario']['imagem'].'" width="50" >
                  <label for="exampleInputEmail1">Imagem de perfil: '.$resp['Usuario']['imagem'].'</label>
                  <input type="file" name="arquivo" class="form-control">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Insira a permissão do usuário:</label>
                    <select name="Permissao" class="form-control">
                      <option value="1">Administrador (Valor: 1)</option>
                      <option value= "2">Vendedor (Valor: 2)</option>
                    </select>
                </div>
                <input type="hidden" name="valor" value="'.$resp['Usuario']['imagem'].'">
                <input type="hidden" name="idUser" value="'.$resp['Usuario']['idUser'].'">

              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../interface/usuarios">Cancelar</a>
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
}
else{
	header('Location: ./');
}
?>