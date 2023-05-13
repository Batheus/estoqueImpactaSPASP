<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/produtos.class.php';
require_once '../../App/Models/fornecedor.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '
    <section class="content-header">
      <h1>
        Adicionar <small>Teste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
        <li class="active">Teste</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">';

echo '
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Teste</h3>
            </div>
            <form role="form" enctype="multipart/form-data" action="../../App/Database/insertteste.php" method="POST" autocomplete="off">
              <div class="box-body">
              	<div class="form-group">
                  <label for="exampleInputEmail1">SKU</label>
            <select class="form-control" name="codProduto">';
            $produtos->listProdutos();
            echo '</select>
            </div>
            <div class="form-group">
                  <label for="exampleInputEmail1">Fornecedor</label>
            <select class="form-control" name="idFornecedor">';
            $fornecedor->listfornecedor();
            echo '</select>
            </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Modelo</label>
                  <input type="text" name="ModeloTeste" class="form-control" id="exampleInputEmail1" placeholder="Modelo">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Grade</label>
                  <input type="text" name="GradeTeste" class="form-control" id="exampleInputEmail1" placeholder="Grade">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">IMEI</label>
                  <input type="text" name="IMEITeste" class="form-control" id="exampleInputEmail1" placeholder="IMEI">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Status da manutenção</label>
                  <input type="text" name="StatusTeste" class="form-control" id="exampleInputEmail1" placeholder="Status da manutenção">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Observações</label>
                  <input type="text" name="ObsTeste" class="form-control" id="exampleInputEmail1" placeholder="Observações">
                </div>

                <!-- CheckList -->
                  <div class="box-header with-border">
                    <h3 class="box-title">Checklist Funcional:</h3>
                  </div>

                  <div class="form-group"><label for="exampleInputEmail1">Wifi:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Wifi" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Wifi" value="Defeituoso">Defeituoso
                  </label>
                  </div>

                  <div class="form-group"><label for="exampleInputEmail1">Conector USB:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="ConectorUSB" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="ConectorUSB" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Conector P2:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="ConectorP2" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="ConectorP2" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Bateria:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Bateria" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Bateria" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Display:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Display" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Display" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Touch:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Touch" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Touch" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Biometria:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Biometria" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Biometria" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Botões:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Botoes" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Botoes" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Vibracall:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Vibracall" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Vibracall" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Câmera Traseira:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="CamT" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="CamT" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Câmera Frontal:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="CamF" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="CamF" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Flash:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Flash" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Flash" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Chip 1:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Chip1" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Chip1" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Chip 2:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Chip2" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Chip2" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Antena de Rede:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="AntRede" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="AntRede" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Microfone 1:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Mic1" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Mic1" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Microfone 2:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Mic2" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Mic2" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Sensor:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Sensor" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Sensor" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Auricular:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Auricular" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Auricular" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Viva-Voz:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="VivaVoz" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="VivaVoz" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Siri/Google:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="SiriGoogle" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="SiriGoogle" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="box-header with-border">
                    <h3 class="box-title">Cosmética</h3>
                  </div>

                  <div class="form-group"><label for="exampleInputEmail1">Carcaça:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Carcaca" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Carcaca" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Tela:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Tela" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Tela" value="Defeituoso">Defeituoso
                  </label>
                  </div>
                  
                  <div class="form-group"><label for="exampleInputEmail1">Traseira:</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="Traseira" value="Funcionando">Funcionando
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Traseira" value="Defeituoso">Defeituoso
                  </label>
                  </div>

                 <input type="hidden" name="valor" value="#">
                 <input type="hidden" name="iduser" value="'.$idUsuario.'">
              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../interface/teste/">Cancelar</a>
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
?>
