<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/cliente.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">
<section class="content-header">
  <h1>
    Cliente
  </h1>
  <ol class="breadcrumb">
    <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Cliente</li>
  </ol>
</section>

<section class="content">';
  require '../../layout/alert.php';
  echo '
  <div class="row">
   <div class="box box-primary">
    <div class="box-header">
      <i class="ion ion-clipboard"></i>
      <h3 class="box-title">Lista de Clientes</h3>
    </div>
    <div class="box-body">
      <ul class="todo-list not-done">';
        $value = 1;
        $public = 0;
        $button_name = "Listar Desativados";
        $cliente = new Cliente;
        $cliente->index($value, $perm);
        echo '</ul>
        <br/>
        <div class="left">
         <form action="index.php" method="post">
           <a href="addcliente.php" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Cliente</a>
         </div>
       </div>';
       echo '</div>';
       echo '</section>';
       echo '</div>';
       echo  $footer;
       echo $javascript;
       ?>