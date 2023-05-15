<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/produtos.class.php';
require_once '../../App/Models/fornecedor.class.php';
require_once '../../App/Models/teste.class.php';

if(isset($_GET['q'])){
$resp = $teste->editTeste($_GET['q']);
echo $head;
echo $header;
echo $aside;

echo '<div class="content-wrapper">';
echo '
    <section class="content-header">
      <h1>
        Editar <small>Teste</small>
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
            <form role="form" enctype="multipart/form-data" action="../../App/Database/insertteste.php" method="POST">
              <div class="box-body">
              	<div class="form-group">
                  <label for="exampleInputEmail1">SKU</label>
            <select class="form-control" name="codProduto">';
            $produtos->listProdutos($resp['Teste']['CodRefProduto']);
            echo '</select>
            </div>
            <div class="form-group">
                  <label for="exampleInputEmail1">Fornecedor</label>
            <select class="form-control" name="idFornecedor">';
            $fornecedor->listfornecedor($resp['Teste']['idFornecedor']);
            echo '</select>
            </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Modelo</label>
                  <input type="text" name="ModeloTeste" class="form-control" id="exampleInputEmail1" placeholder="Modelo" value="'.$resp['Teste']['ModeloTeste'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Grade</label>
                  <input type="text" name="GradeTeste" class="form-control" id="exampleInputEmail1" placeholder="Grade" value="'.$resp['Teste']['GradeTeste'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">IMEI</label>
                  <input type="text" name="IMEITeste" class="form-control" id="exampleInputEmail1" placeholder="IMEI" value="'.$resp['Teste']['IMEITeste'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Status do aparelho</label>
                  <input type="text" name="StatusTeste" class="form-control" id="exampleInputEmail1" placeholder="Status do aparelho" value="'.$resp['Teste']['StatusTeste'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Observações</label>
                  <input type="text" name="ObsTeste" class="form-control" id="exampleInputEmail1" placeholder="Observações" value="'.$resp['Teste']['ObsTeste'].'">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Wifi</label><br>
                    <input type="radio" name="Wifi" value="Funcionando" ' . (($resp['Teste']['Wifi'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Wifi" value="Defeituoso" ' . (($resp['Teste']['Wifi'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">ConectorUSB</label><br>
                    <input type="radio" name="ConectorUSB" value="Funcionando" ' . (($resp['Teste']['ConectorUSB'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="ConectorUSB" value="Defeituoso" ' . (($resp['Teste']['ConectorUSB'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">ConectorP2</label><br>
                    <input type="radio" name="ConectorP2" value="Funcionando" ' . (($resp['Teste']['ConectorP2'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="ConectorP2" value="Defeituoso" ' . (($resp['Teste']['ConectorP2'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Bateria</label><br>
                    <input type="radio" name="Bateria" value="Funcionando" ' . (($resp['Teste']['Bateria'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Bateria" value="Defeituoso" ' . (($resp['Teste']['Bateria'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Display</label><br>
                    <input type="radio" name="Display" value="Funcionando" ' . (($resp['Teste']['Display'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Display" value="Defeituoso" ' . (($resp['Teste']['Display'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Touch</label><br>
                    <input type="radio" name="Touch" value="Funcionando" ' . (($resp['Teste']['Touch'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Touch" value="Defeituoso" ' . (($resp['Teste']['Touch'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Biometria</label><br>
                    <input type="radio" name="Biometria" value="Funcionando" ' . (($resp['Teste']['Biometria'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Biometria" value="Defeituoso" ' . (($resp['Teste']['Biometria'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Botoes</label><br>
                    <input type="radio" name="Botoes" value="Funcionando" ' . (($resp['Teste']['Botoes'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Botoes" value="Defeituoso" ' . (($resp['Teste']['Botoes'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Vibracall</label><br>
                    <input type="radio" name="Vibracall" value="Funcionando" ' . (($resp['Teste']['Vibracall'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Vibracall" value="Defeituoso" ' . (($resp['Teste']['Vibracall'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">CamT</label><br>
                    <input type="radio" name="CamT" value="Funcionando" ' . (($resp['Teste']['CamT'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="CamT" value="Defeituoso" ' . (($resp['Teste']['CamT'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">CamF</label><br>
                    <input type="radio" name="CamF" value="Funcionando" ' . (($resp['Teste']['CamF'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="CamF" value="Defeituoso" ' . (($resp['Teste']['CamF'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Flash</label><br>
                    <input type="radio" name="Flash" value="Funcionando" ' . (($resp['Teste']['Flash'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Flash" value="Defeituoso" ' . (($resp['Teste']['Flash'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Chip1</label><br>
                    <input type="radio" name="Chip1" value="Funcionando" ' . (($resp['Teste']['Chip1'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Chip1" value="Defeituoso" ' . (($resp['Teste']['Chip1'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Chip2</label><br>
                    <input type="radio" name="Chip2" value="Funcionando" ' . (($resp['Teste']['Chip2'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Chip2" value="Defeituoso" ' . (($resp['Teste']['Chip2'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">AntRede</label><br>
                    <input type="radio" name="AntRede" value="Funcionando" ' . (($resp['Teste']['AntRede'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="AntRede" value="Defeituoso" ' . (($resp['Teste']['AntRede'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Mic1</label><br>
                    <input type="radio" name="Mic1" value="Funcionando" ' . (($resp['Teste']['Mic1'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Mic1" value="Defeituoso" ' . (($resp['Teste']['Mic1'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Mic2</label><br>
                    <input type="radio" name="Mic2" value="Funcionando" ' . (($resp['Teste']['Mic2'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Mic2" value="Defeituoso" ' . (($resp['Teste']['Mic2'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Sensor</label><br>
                    <input type="radio" name="Sensor" value="Funcionando" ' . (($resp['Teste']['Sensor'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Sensor" value="Defeituoso" ' . (($resp['Teste']['Sensor'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">VivaVoz</label><br>
                    <input type="radio" name="VivaVoz" value="Funcionando" ' . (($resp['Teste']['VivaVoz'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="VivaVoz" value="Defeituoso" ' . (($resp['Teste']['VivaVoz'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">SiriGoogle</label><br>
                    <input type="radio" name="SiriGoogle" value="Funcionando" ' . (($resp['Teste']['SiriGoogle'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="SiriGoogle" value="Defeituoso" ' . (($resp['Teste']['SiriGoogle'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Carcaca</label><br>
                    <input type="radio" name="Carcaca" value="Funcionando" ' . (($resp['Teste']['Carcaca'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Carcaca" value="Defeituoso" ' . (($resp['Teste']['Carcaca'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Tela</label><br>
                    <input type="radio" name="Tela" value="Funcionando" ' . (($resp['Teste']['Tela'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Tela" value="Defeituoso" ' . (($resp['Teste']['Tela'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Traseira</label><br>
                    <input type="radio" name="Traseira" value="Funcionando" ' . (($resp['Teste']['Traseira'] == 'Funcionando') ? 'checked' : '') . '> Funcionando
                    <input type="radio" name="Traseira" value="Defeituoso" ' . (($resp['Teste']['Traseira'] == 'Defeituoso') ? 'checked' : '') . '> Defeituoso
                </div>

                 <input type="hidden" name="iduser" value="'.$idUsuario.'">
                 <input type="hidden" name="idTeste" value="'.$resp['Teste']['idTeste'].'">
              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../interface/teste">Cancelar</a>
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