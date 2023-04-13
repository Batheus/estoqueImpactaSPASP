<?php
if(isset($_GET['alert']) || isset($_SESSION['alert'])){
	$value = isset($_GET['alert']) ? $_GET['alert'] : $_SESSION['alert'];
	$alerts = array(
		'0' => '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Erro! Operação não efetuada. Tente novamente.</h4>
                </div>',
		'1' => '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Operação realizada com sucesso!</h4>
                </div>'
	);
	echo '<div class="box-body">' . $alerts[$value] . '</div>';
}
