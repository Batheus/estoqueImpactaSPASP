<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/itens.class.php';
echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Itens cadastrados
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
        <li class="active">Itens</li>
      </ol>
    </section>
    <section class="content">';
    require '../../layout/alert.php';
    echo '
      <div class="row">
      	<div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Lista de Itens</h3>
            </div>
            <div class="box-body">';
          $value = 1;
          $public = 0;
          $button_name = "Inativos";
         echo' <ul class="todo-list">';
               $itens->totalitens($value);
         echo '</ul>';     
        echo ' </div>
            <div class="box-footer clearfix no-border">
             <form action="totalitens.php" method="post">
              <a href="additens.php" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Adicionar Itens</a>
            </div>
          </div>';
echo '</div>';
echo '</section>';
echo '</div>';
echo  $footer;
echo $javascript;
?>