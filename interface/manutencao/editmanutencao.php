<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/produtos.class.php';
require_once '../../App/Models/fornecedor.class.php';
require_once '../../App/Models/manutencao.class.php';

if(isset($_GET['q'])){
$resp = $manutencao->editManutencao($_GET['q']);
echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '
    <section class="content-header">
      <h1>
        Adicionar <small>Manutenção</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
        <li class="active">Manutencao</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">';

echo ' 
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Manutenção</h3>
            </div>
            <form role="form" enctype="multipart/form-data" action="../../App/Database/insertmanutencao.php" method="POST">
              <div class="box-body">
              	<div class="form-group">
                  <label for="exampleInputEmail1">SKU</label>
            <select class="form-control" name="codProduto">';
            $produtos->listProdutos($resp['Manutencao']['CodRefProduto']);
            echo '</select>
            </div>
            <div class="form-group">
                  <label for="exampleInputEmail1">Fornecedor</label>
            <select class="form-control" name="idFornecedor">';
            $fornecedor->listfornecedor($resp['Manutencao']['idFornecedor']);
            echo '</select>
            </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Modelo</label>
                  <input type="text" name="ModeloManutencao" class="form-control" id="exampleInputEmail1" placeholder="Modelo" value="'.$resp['Manutencao']['ModeloManutencao'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Grade</label>
                  <input type="text" name="GradeManutencao" class="form-control" id="exampleInputEmail1" placeholder="Grade" value="'.$resp['Manutencao']['GradeManutencao'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">IMEI</label>
                  <input type="text" name="IMEIManutencao" class="form-control" id="exampleInputEmail1" placeholder="IMEI" value="'.$resp['Manutencao']['IMEIManutencao'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Status da manutenção</label>
                  <input type="text" name="StatusManutencao" class="form-control" id="exampleInputEmail1" placeholder="Status da manutenção" value="'.$resp['Manutencao']['StatusManutencao'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Observação da manutenção</label>
                  <input type="text" name="ObsManutencao" class="form-control" id="exampleInputEmail1" placeholder="Observação da manutenção" value="'.$resp['Manutencao']['ObsManutencao'].'">
                </div>

                 <input type="hidden" name="iduser" value="'.$idUsuario.'">
                 <input type="hidden" name="idManutencao" value="'.$resp['Manutencao']['idManutencao'].'">
              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../interface/manutencao">Cancelar</a>
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
}else{
	header('Location: ./');
}
?>