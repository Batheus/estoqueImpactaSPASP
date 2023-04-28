<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/produtos.class.php';
require_once '../../App/Models/fornecedor.class.php';
require_once '../../App/Models/itens.class.php';

if(isset($_GET['q'])){
$resp = $itens->editItens($_GET['q']);
echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '
    <section class="content-header">
      <h1>
        Adicionar <small>Produtos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-laptop"></i> Home</a></li>
        <li class="active">Itens</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">';

echo ' 
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Produto</h3>
            </div>
            <form role="form" enctype="multipart/form-data" action="../../App/Database/insertitens.php" method="POST">
              <div class="box-body">
              	<div class="form-group">
                  <label for="exampleInputEmail1">SKU</label>
            <select class="form-control" name="codProduto">';
            $produtos->listProdutos($resp['Itens']['CodRefProduto']);
            echo '</select>
            </div>
            <div class="form-group">
                  <label for="exampleInputEmail1">Fornecedor</label>
            <select class="form-control" name="idFornecedor">';
            $fornecedor->listfornecedor($resp['Itens']['idFornecedor']);
            echo '</select>
            </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Quantidade</label>
                  <input type="text" name="QuantItens" class="form-control" id="exampleInputEmail1" placeholder="Quantidade" value="'.$resp['Itens']['QuantItens'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Marca</label>
                  <input type="text" name="MarcaItens" class="form-control" id="exampleInputEmail1" placeholder="Marca" value="'.$resp['Itens']['MarcaItens'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Modelo</label>
                  <input type="text" name="ModeloItens" class="form-control" id="exampleInputEmail1" placeholder="Modelo" value="'.$resp['Itens']['ModeloItens'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Memória</label>
                  <input type="text" name="MemoriaItens" class="form-control" id="exampleInputEmail1" placeholder="Memória" value="'.$resp['Itens']['MemoriaItens'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cor</label>
                  <input type="text" name="CorItens" class="form-control" id="exampleInputEmail1" placeholder="Cor" value="'.$resp['Itens']['CorItens'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Grade</label>
                  <input type="text" name="GradeItens" class="form-control" id="exampleInputEmail1" placeholder="Grade" value="'.$resp['Itens']['GradeItens'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Local</label>
                  <input type="text" name="LocalItens" class="form-control" id="exampleInputEmail1" placeholder="Local" value="'.$resp['Itens']['LocalItens'].'">
                </div>

                <div class="form-group">
                <img src="../'.$resp['Itens']['Image'].'" width="50" >
                  <label for="exampleInputEmail1">Imagem '.$resp['Itens']['Image'].'</label>
                  <input type="file" name="arquivo" class="form-control">
                </div>
                 <input type="hidden" name="valor" value="'.$resp['Itens']['Image'].'">
                 <input type="hidden" name="iduser" value="'.$idUsuario.'">
                 <input type="hidden" name="idItens" value="'.$resp['Itens']['idItens'].'">
              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../interface/itens">Cancelar</a>
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