<?php
$url = 'http://localhost/estoque/interface/';
$head = '<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="content-language" content="pt-br" /> 

  <title>ImpactaPhone</title>
  <link rel="shortcut icon" href="'.$url.'#" />

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="'.$url.'bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="'.$url.'dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="'.$url.'dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="'.$url.'plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="'.$url.'plugins/morris/morris.css">
  <link rel="stylesheet" href="'.$url.'plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="'.$url.'plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="'.$url.'plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="'.$url.'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>

  <script type="text/javascript">
  // Espera que o documento esteja completamente carregado antes de executar o código
  $(document).ready(function() {
    // Seleciona todos os elementos de entrada com o atributo "name" igual a "status[]"
    $("input[name=\'status[]\']").click(function() {
      // Armazena o elemento clicado em uma variável para melhorar a performance
      var $this = $(this);
  
      // Determina se o elemento está marcado (true) ou não (false) e armazena o valor em uma variável
      var status = $this.prop(\'checked\') ? 1 : 0;
  
      // Obtém o valor do próximo elemento de entrada e armazena em uma variável
      var id = $this.next(\'input\').val();
  
      // Faz uma solicitação AJAX para um arquivo PHP, passando os valores de "status" e "id" como parâmetros
      $.ajax({
        url: \'action.php\',
        type: \'GET\',
        data: {
          status: status,
          id: id
        },
        success: function(data) {
          // Exibe uma mensagem de alerta com a resposta do servidor
          alert(data);
        }
      });
    });
  });
  </script>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">';

$header = '<header class="main-header">
    <a href="../" class="logo">
      <span class="logo-mini"><b>I</b>MP</span>
      <span class="logo-lg"><b>ImpactaPhone</b>  </span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Alterna navegação</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="'.$url.''.$foto.'" class="user-image" alt="Foto do Usuário">
              <span class="hidden-xs">'.$usuario.'</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="'.$url.''.$foto.'" class="img-circle" alt="Foto do Usuário">
                <p>
                  '.$usuario.'
                  <small>Membro desde: '.$registro.'</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="'.$url.'destroy.php" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>';

  $aside = '<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="'.$url.''.$foto.'" class="img-circle" style="height:50px; width:50px;" alt="Foto do Usuário">
        </div>
        <div class="pull-left info">
          <p>'.$usuario.'</p>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">MENU PRINCIPAL</li>
        <li class="active treeview">
          <a href="'.$url.'">
            <i class="fa fa-laptop"></i> <span>Página Inicial</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i>
            <span>Estoque</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Lista de SKU</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Adicionar SKU</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Estoque Completo</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Estoque Atual</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-mobile" style="font-size:24px"></i>
            <span>Testes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Lista de Testes</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Registrar Teste</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Manutenção</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Lista de Manutenção</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Registrar Manutenção</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-truck"></i>
            <span>Fornecedor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Lista de Fornecedores</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Adicionar Fornecedor</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Usuários</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="'.$url.'usuarios/"><i class="fa fa-circle-o"></i>Lista de Usuários</a></li>
            <li><a href="'.$url.'usuarios/addusuarios.php"><i class="fa fa-circle-o"></i>Adicionar Usuários</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Cliente</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Lista de Clientes</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Adicionar Cliente</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Vendas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Registrar Venda</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>';

  $footer = '<footer class="main-footer">
    © 2023 ImpactaPhone - CNPJ: 12.345.6789/0001-90 - Todos os direitos reservados
  </footer>';

  $javascript = '
  </div>
<script src="'.$url.'plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge(\'uibutton\', $.ui.button);
</script>
<script src="'.$url.'bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="'.$url.'plugins/morris/morris.min.js"></script>
<script src="'.$url.'plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="'.$url.'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="'.$url.'plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="'.$url.'plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="'.$url.'plugins/daterangepicker/daterangepicker.js"></script>
<script src="'.$url.'plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="'.$url.'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="'.$url.'plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="'.$url.'plugins/fastclick/fastclick.js"></script>
<script src="'.$url.'dist/js/app.min.js"></script>
<script src="'.$url.'dist/js/pages/dashboard.js"></script>
<script src="'.$url.'dist/js/demo.js"></script>
</body>
</html>
';
