<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/teste.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">
<section class="content-header">
  <h1>
    Testes
  </h1>
  <ol class="breadcrumb">
    <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
    <li class="active">Testes</li>
  </ol>
</section>
<section class="content">';
  require '../../layout/alert.php';
  echo '
  <div class="row">
   <div class="box box-primary">
    <div class="box-header">
      <i class="ion ion-clipboard"></i>
      <h3 class="box-title">Lista de Testes</h3>
    </div>
    <div class="box-body">
      <ul class="todo-list not-done">';
        if(isset($_POST['public']) != NULL){               
          $value = $_POST['public']; 
          if($value == 1){
            $public = 0;
            $button_name = "Listar Desativados";
          }else{
            $public = 1;
            $button_name = "Listar Publicados";
          }     
        }else{
          $value = 1;
          $public = 0;
          $button_name = "Listar Desativados";
        }
        $teste->index($value);
        echo '</ul>
        <br/>
           <a href="addteste.php" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Adicionar Teste</a>
         </div>
       </div>';
       echo '</div>';
       echo '</section>';
       echo '</div>';
       echo  $footer;
       echo $javascript;
       ?>

