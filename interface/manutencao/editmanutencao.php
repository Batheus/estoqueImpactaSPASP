<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/manutencao.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '<section class="content-header">
      <h1>
        Editar Manutencao
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
        <li class="active">Manutenção</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">';

echo ' <a href="./" class="btn btn-success">Voltar</a>
      <div class="row">';
        if(isset($_GET['id'])){
          $idManutencao = $_GET['id'];
       $resp = $manutencao->EditManutencao($idManutencao);

echo '<div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informações Principais</h3>
            </div>
            <form role="form" action="../../App/Database/insertmanutencao.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Funcionário</label>
                  <input type="text" name="FuncionarioManutencao" class="form-control" id="exampleInputEmail1" placeholder="Funcionário" value="'.$resp['Manutencao']['Funcionario'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Aparelho</label>
                  <input type="text" name="AparelhoManutencao" class="form-control" id="exampleInputEmail1" placeholder="Aparelho" value="'.$resp['Manutencao']['Aparelho'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Modelo</label>
                  <input type="text" name="ModeloManutencao" class="form-control" id="exampleInputEmail1" placeholder="Modelo" value="'.$resp['Manutencao']['Modelo'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">IMEI</label>
                  <input type="text" name="IMEIManutencao" class="form-control" id="exampleInputEmail1" placeholder="IMEI" value="'.$resp['Manutencao']['IMEI'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                  <input type="text" name="StatusManutencao" class="form-control" id="exampleInputEmail1" placeholder="Status" value="'.$resp['Manutencao']['Status'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Observação</label>
                  <input type="text" name="ObservacaoManutencao" class="form-control" id="exampleInputEmail1" placeholder="Observação" value="'.$resp['Manutencao']['Observacao'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Grade</label>
                  <input type="text" name="GradeManutencao" class="form-control" id="exampleInputEmail1" placeholder="Grade" value="'.$resp['Manutencao']['Grade'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Fornecedor</label>
                  <input type="text" name="FornecedorManutencao" class="form-control" id="exampleInputEmail1" placeholder="Fornecedor" value="'.$resp['Manutencao']['Fornecedor'].'">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Publicar</label>
                  <select name="Ativo">
                  ';
                    $Ativo = $resp['Manutencao']['Ativo'];
                  if($Ativo == 1){
                    $selected1 = "selected";
                    $selected0 = " ";
                  }else{
                    $selected1 = " ";
                    $selected0 = "selected";
                  }

                  echo '
                  <option value="1" '.$selected1.' >SIM</option>
                  <option value="0" '.$selected0.' >NÃO</option>
                  </select>
                </div>  
                
                <div class="box-header with-border">
                  <h3 class="box-title">Checklist Funcional</h3>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Wifi</label>
                  <input type="text" name="Wifi" class="form-control" id="exampleInputEmail1" placeholder="Wifi" value="'.$resp['Manutencao']['Wifi'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Conector USB</label>
                  <input type="text" name="ConectorUSB" class="form-control" id="exampleInputEmail1" placeholder="Conector USB" value="'.$resp['Manutencao']['ConectorUSB'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Conector P2</label>
                  <input type="text" name="ConectorP2" class="form-control" id="exampleInputEmail1" placeholder="Conector P2" value="'.$resp['Manutencao']['ConectorP2'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Bateria</label>
                  <input type="text" name="Bateria" class="form-control" id="exampleInputEmail1" placeholder="Bateria" value="'.$resp['Manutencao']['Bateria'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Display</label>
                  <input type="text" name="Display" class="form-control" id="exampleInputEmail1" placeholder="Display" value="'.$resp['Manutencao']['Display'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Touch</label>
                  <input type="text" name="Touch" class="form-control" id="exampleInputEmail1" placeholder="Touch" value="'.$resp['Manutencao']['Touch'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Biometria</label>
                  <input type="text" name="Biometria" class="form-control" id="exampleInputEmail1" placeholder="Biometria" value="'.$resp['Manutencao']['Biometria'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Botões</label>
                  <input type="text" name="Botoes" class="form-control" id="exampleInputEmail1" placeholder="Botões" value="'.$resp['Manutencao']['Botoes'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Vibracall</label>
                  <input type="text" name="Vibracall" class="form-control" id="exampleInputEmail1" placeholder="Vibracall" value="'.$resp['Manutencao']['Vibracall'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Câmera Traseira</label>
                  <input type="text" name="CamT" class="form-control" id="exampleInputEmail1" placeholder="Câmera Traseira" value="'.$resp['Manutencao']['CamT'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Câmera Frontal</label>
                  <input type="text" name="CamF" class="form-control" id="exampleInputEmail1" placeholder="Câmera Frontal" value="'.$resp['Manutencao']['CamF'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Flash</label>
                  <input type="text" name="Flash" class="form-control" id="exampleInputEmail1" placeholder="Flash" value="'.$resp['Manutencao']['Flash'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Chip 1</label>
                  <input type="text" name="Chip1" class="form-control" id="exampleInputEmail1" placeholder="Chip 1" value="'.$resp['Manutencao']['Chip1'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Chip 2</label>
                  <input type="text" name="Chip2" class="form-control" id="exampleInputEmail1" placeholder="Chip 2" value="'.$resp['Manutencao']['Chip2'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Antena de Rede</label>
                  <input type="text" name="AntRede" class="form-control" id="exampleInputEmail1" placeholder="Antena de Rede" value="'.$resp['Manutencao']['AntRede'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Microfone 1</label>
                  <input type="text" name="Mic1" class="form-control" id="exampleInputEmail1" placeholder="Microfone 1" value="'.$resp['Manutencao']['Mic1'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Microfone 2</label>
                  <input type="text" name="Mic2" class="form-control" id="exampleInputEmail1" placeholder="Microfone 2" value="'.$resp['Manutencao']['Mic2'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Sensor</label>
                  <input type="text" name="Sensor" class="form-control" id="exampleInputEmail1" placeholder="Sensor" value="'.$resp['Manutencao']['Sensor'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">VivaVoz</label>
                  <input type="text" name="VivaVoz" class="form-control" id="exampleInputEmail1" placeholder="VivaVoz" value="'.$resp['Manutencao']['VivaVoz'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Siri/Google</label>
                  <input type="text" name="SiriGoogle" class="form-control" id="exampleInputEmail1" placeholder="Siri/Google" value="'.$resp['Manutencao']['SiriGoogle'].'">
                </div>
                
                <div class="box-header with-border">
                  <h3 class="box-title">Checklist Cosmético</h3>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Carcaça</label>
                  <input type="text" name="Carcaca" class="form-control" id="exampleInputEmail1" placeholder="Carcaça" value="'.$resp['Manutencao']['Carcaca'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Tela</label>
                  <input type="text" name="Tela" class="form-control" id="exampleInputEmail1" placeholder="Tela" value="'.$resp['Manutencao']['Tela'].'">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Traseira</label>
                  <input type="text" name="Traseira" class="form-control" id="exampleInputEmail1" placeholder="Traseira" value="'.$resp['Manutencao']['Traseira'].'">
                </div>
                                
                 <input type="hidden" name="iduser" value="'.$idUsuario.'">
                 <input type="hidden" name="idManutencao" value="'.$idManutencao.'">

              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../interface/manutencao">Cancelar</a>
              </div>
            </form>
          </div>
        <!-- /.box -->
          </div>
</div>';
}

echo '</div>';
echo '</div>';
echo '</section>';
echo '</div>';
echo  $footer;
echo $javascript;
?>