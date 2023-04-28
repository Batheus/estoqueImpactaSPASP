<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/produtos.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">
    <section class="content-header">
      <h1>
        SKU
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-laptop"></i> Página Inicial</a></li>
        <li class="active">SKU</li>
      </ol>
    </section>
    <section class="content">';
    require '../../layout/alert.php';
    echo '
      <div class="row">
      	<div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Lista de SKU</h3>
            </div>
            <div class="box-body">
              <ul class="todo-list">';
          $value = 1;
          $public = 0;
          $button_name = "Inativos";
          $produtos->index($value);
        echo '</ul>
            </div>
            <div class="box-footer clearfix no-border">
            <form action="index.php" method="post">
              <a href="addprod.php" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Adicionar SKU</a>
            </div>
          </div>';
echo '</div>';
echo '</section>';
echo '</div>';
echo  $footer;
echo $javascript;
?>