<?php

$url = 'http://localhost/estoqueimpacta/interface/';

$head = '<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="content-language" content="pt-br" /> 
  <title>ImpactaPhone</title>
  <!-- Ícone do sistema -->
  <link rel="shortcut icon" href="'.$url.'dist/img/icon.png" />
  <!-- Comunica com o navegador para que o estilo seja responsivo -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="'.$url.'bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="'.$url.'dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="'.$url.'dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="'.$url.'plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="'.$url.'plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="'.$url.'plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="'.$url.'plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="'.$url.'plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="'.$url.'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>

<!-- Imprimir Venda -->

  <script type="text/javascript">
    
    function cont(){
       var conteudo = document.getElementById(\'print\').innerHTML;
       tela_impressao = window.open(\'about:blank\');
       tela_impressao.document.write(conteudo);
       tela_impressao.window.print();
       tela_impressao.window.close(); 
    }

</script>

<!-- Imprimir Venda --> 

  <script type="text/javascript">
    $(document).ready(function(){
    $("input[name=\'status[]\']").click(function(){
      var $this = $( this );//guardando o ponteiro em uma variavel, por performance


      var status = $this.attr(\'checked\') ? 1 : 0;
      var id = $this.next(\'input\').val();


      $.ajax({
        url: \'action.php\',
        type: \'GET\',
        data: \'status=\'+status+\'&id=\'+id,
        success: function( data ){
          alert( data );
        }
      });
    });
  }); 
  </script>

  <!-- Lista Cliente CPF -->

<script type="text/javascript">
 
 $(document).ready(function(){  
      $(\'#cpfCliente\').keyup(function(){  
           var query = $(this).val();  
           if(query != "")  
           {  
                $.ajax({  
                     url:"'.$url.'../App/Database/search.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          
                          $(\'#Listdata\').fadeIn();  
                          $(\'#Listdata\').html(data);  
                     }  
                });  
           }  
      });  


      $(\'#Listdata\').on("click","li", function(){  
           $(\'#cpfCliente\').val($(this).text());  
           $(\'#Listdata\').fadeOut();
           <!-- console.log(event.target);-->
      });
  });  
 </script>

 <!-- FIM Lista Cliente CPF --> 

 <!-- Consulta Qtd venda -->

<script type="text/javascript">

 $(document).ready(function(){

      $("#prodSubmit").click(function()  {
    var prodSubmit = $("#prodSubmit").val();
    var idItem = $("#idItem").val();
    var qtd = $("#qtd").val();
    
    $.ajax({
      type: "POST",
      url: "'.$url.'../App/Database/carrinho.php",
      data: {prodSubmit: prodSubmit, idItem: idItem, qtd:qtd},
      success: function(data){
              $(\'#listable\').fadeIn();  
              $(\'#listable\').html(data);

          }
      });
    }); 

    $(\'#listable\').on("click","li", function(){  
           $(\'#idItem\').val($(data).text());
           $(\'#qtd\').val($(data).text());  
           $(\'#listable\').fadeOut();
          
            return false;

           <!-- console.log(event.target);-->
      });           
            
    
 });  
 </script>

 <script type="text/javascript">
(function ($) {

    RemoveTableRow = function (handler) {
        var tr = $(handler).closest(\'tr\');

        tr.fadeOut(400, function () {
            tr.remove();
        });

        return false;
    };

    AddTableRow = function () {

        var newRow = $("<tr>");
        var cols = \'<td></td>\';
        var tabela = document.getElementById(\'products-table\');
        var a = (tabela.getElementsByTagName(\'tr\'));
        var b = a.length;
        var i = b - 2;
        var cont = 7 + i;

        cols += \'<td><input type="text" class="form-control" id="idItem" name="idItem[]" autocomplete="off" /></td>\';
        cols += \'<td><input type="text" class="form-control" id="qtd" name="qtd[]" autocomplete="off" /><span id="stv" name="stv[]"></span></td>\';
        cols += \'<td class="actions">\';
        cols += \'<button class="btn btn-danger btn-xs" onclick="RemoveTableRow(this)" type="button"><i class="fa fa-trash"></i></button>\';
        cols += \'</td>\';

        newRow.append(cols);
        $("#products-table").append(newRow);
        return false;
    };


})(jQuery);
</script>

<!-- Consulta Qtd Vendas -->



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">';

$header = '<header class="main-header">
    <!-- Logo -->
    <a href="../" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>MP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ImpactaPhone</b>  </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Conta do Usuário: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="'.$url.''.$foto.'" class="user-image" alt="Foto do Usuário">
              <span class="hidden-xs">'.$usuario.'</span>
            </a>
            <ul class="dropdown-menu">
              <!-- Foto do Usuário -->
              <li class="user-header">
                <img src="'.$url.''.$foto.'" class="img-circle" alt="Foto do Usuário">
                <p>
                  '.$usuario.'
                  <small>Membro desde: '.$registro.'</small>
                </p>
              </li>
              <!-- Menu Footer-->
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

  $aside = '<!-- Coluna da esquerda. Contém a logo e o menu lateral -->
  <aside class="main-sidebar">
    <!-- Barra lateral: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Painel do Usuário na Barra Lateral -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="'.$url.''.$foto.'" class="img-circle" style="height:50px; width:50px;" alt="Foto do Usuário">
        </div>
        <div class="pull-left info">
          <p>'.$usuario.'</p>
        </div>
      </div>
      <!-- Menu da barra lateral: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU PRINCIPAL</li>
        <li class="active treeview">
          <a href="'.$url.'">
            <i class="fa fa-laptop"></i> <span>Página Inicial</span>
            
          </a>
          
        </li>
<!-- Produtos -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i>
            <span>Estoque</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="'.$url.'prod/"><i class="fa fa-circle-o"></i>Lista de SKU</a></li>
            <li><a href="'.$url.'prod/addprod.php"><i class="fa fa-circle-o"></i>Adicionar SKU</a></li>
            <li><a href="'.$url.'itens/"><i class="fa fa-circle-o"></i>Estoque Completo</a></li>
            <li><a href="'.$url.'itens/totalitens.php"><i class="fa fa-circle-o"></i>Estoque Atual</a></li>
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
            <li><a href="'.$url.'teste/"><i class="fa fa-circle-o"></i>Lista de Testes</a></li>
            <li><a href="'.$url.'teste/addteste.php"><i class="fa fa-circle-o"></i>Registrar Teste</a></li>
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
            <li><a href="'.$url.'manutencao/"><i class="fa fa-circle-o"></i>Lista de Manutenção</a></li>
            <li><a href="'.$url.'manutencao/addmanutencao.php"><i class="fa fa-circle-o"></i>Registrar Manutenção</a></li>
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
            <li><a href="'.$url.'fornecedor/"><i class="fa fa-circle-o"></i>Lista de Fornecedores</a></li>
            <li><a href="'.$url.'fornecedor/addfornecedor.php"><i class="fa fa-circle-o"></i>Adicionar Fornecedor</a></li>
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
            <li><a href="'.$url.'cliente/"><i class="fa fa-circle-o"></i>Lista de Clientes</a></li>
            <li><a href="'.$url.'cliente/addcliente.php"><i class="fa fa-circle-o"></i>Adicionar Cliente</a></li>
            
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
            <li><a href="'.$url.'vendas/"><i class="fa fa-circle-o"></i>Registrar Venda</a></li>
            
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.Barra lateral -->
  </aside>';

  $footer = '<footer class="main-footer">
    © 2023 ImpactaPhone - CNPJ: 123456789/0001 - Todos os direitos reservados
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon\'s Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar\'s background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>';

  $javascript = '

  </div>
<!-- jQuery 2.2.3 -->
<script src="'.$url.'plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge(\'uibutton\', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="'.$url.'bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="'.$url.'plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="'.$url.'plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="'.$url.'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="'.$url.'plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="'.$url.'plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="'.$url.'plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="'.$url.'plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="'.$url.'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="'.$url.'plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="'.$url.'plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="'.$url.'dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="'.$url.'dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="'.$url.'dist/js/demo.js"></script>

</body>
</html>
';

