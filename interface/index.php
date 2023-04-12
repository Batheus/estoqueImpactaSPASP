<?php
require_once '../App/auth.php';
require_once '../layout/script.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '<section class="content">
<div class="row">
<div class="col-lg-3 col-xs-6"> 
  <div class="small-box bg-yellow">
    <div class="inner">
      <h2>Cadastros</h2>
      <br>
    </div>
    <div class="icon">
      <i class="ion ion-person"></i>
    </div>
    <a href="#" class="small-box-footer">Clientes <i class="fa fa-arrow-circle-right"></i></a>
    <a href="#" class="small-box-footer">Fornecedores <i class="fa fa-arrow-circle-right"></i></a>
    <a href="'.$url.'usuarios/" class="small-box-footer">Funcionários <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h2>Estoque</h2>
        <br>
      </div>
      <div class="icon">
        <i class="ion ion-ios-box"></i>
      </div>
      <a href="#" class="small-box-footer">Estoque completo <i class="fa fa-arrow-circle-right"></i></a>
      <a href="#" class="small-box-footer">Lista de SKU <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h2>Checklist</h2>
        <br>
      </div>
      <div class="icon">
        <i class="ion ion-settings"></i>
      </div>
      <a href="#" class="small-box-footer">Manutenção <i class="fa fa-arrow-circle-right"></i></a>
      <a href="#" class="small-box-footer">Teste <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h2>Saída</h2>
        <br>
      </div>
      <div class="icon">
        <i class="ion ion-android-cart"></i>
      </div>
      <a href="#" class="small-box-footer">Realizar saída de aparelho(s) <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>';

echo '<section class="content">
<div class="row">
  <div class="col-md-12">
    <ul class="timeline">
      <li>
        <i class="fa fa-envelope bg-blue"></i>
        <div class="timeline-item">
          <h3 class="timeline-header">Controle de Estoque - Faculdade Impacta</h3>
          <div class="timeline-body">
            O sistema servirá para sanar a necessidade de um controle de estoque
            de uma empresa de smartphones, facilitando o registro de entrada e saída de
            produtos, assim como toda a bateria de testes que tais aparelhos são
            submetidos antes de serem disponibilizados a venda.
          </div>
          <div class="timeline-body">
            Confira na íntegra a lista de requisitos do sistema acessando o documento disponibilizado abaixo.
          </div>
          <div class="timeline-footer">
            <a href="dist/pdf/listaRequisitos.pdf" class="btn btn-primary btn-xs">Acesse aqui os requisitos do sistema</a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
</section>';
echo '</div>';
echo  $footer;
echo $javascript;
?>