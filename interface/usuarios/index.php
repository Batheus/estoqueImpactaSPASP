<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/usuario.class.php';
echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Usuários cadastrados
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
        <li class="active">Usuários</li>
      </ol>
    </section>

    <section class="content">
    ';
    require '../../layout/alert.php';
    echo '
      <div class="row">
      	<div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Lista de Usuários</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">';

        if(isset($_POST['public']) != NULL){               
          $value = $_POST['public']; 
          if($value == 1){
            $public = 0;
            $button_name = "Inativos";
          }
          else{
            $public = 1;
            $button_name = "Publicados";
          }     

        }
        else{
          $value = 1;
          $public = 0;
          $button_name = "Inativos";
        }

              $usuario->index($value, $perm);

        echo '</div>
            <div class="box-footer clearfix no-border">
              <form action="index.php" method="post">
              <a href="addusuarios.php" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Adicionar Usuário</a>
            </div>
          </div>
';
echo '</div>';
echo '</section>';
echo '</div>';
echo  $footer;
echo $javascript;
?>