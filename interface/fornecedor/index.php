<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/fornecedor.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">
<section class="content-header">
  <h1>
    Fornecedor
  </h1>
  <ol class="breadcrumb">
    <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
    <li class="active">Fornecedor</li>
  </ol>
</section>

<section class="content">';
  require '../../layout/alert.php';
  echo '
  <div class="row">
   <div class="box box-primary">
    <div class="box-header">
      <i class="ion ion-clipboard"></i>
      <h3 class="box-title">Lista de Fornecedor</h3>
    </div>
    <div class="box-body">
      <ul class="todo-list not-done">';

        $fornecedor->index($perm);
        echo '</ul>
        <br/>
        <div class="left">
         <form action="index.php" method="post">
           <a href="addfornecedor.php" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Adicionar Fornecedor</a>
         </div>
       </div>';
       echo '</div>';
       echo '</section>';
       echo '</div>';
       echo  $footer;
       echo $javascript;
       ?>