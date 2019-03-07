<?php
include '../../DAL/usuarioDAO.class.php';
include '../../DAL/Conexao.class.php';
$verificaLogin = new usuarioDAO();

$verificaLogin->verificaLogin();

?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD Víctor Cândido</title>
	<meta charset="utf-8">
	
	<style>
		.ul-config{
			list-style-type: none;
			/* margin-top: 10px; */
		}
		.ul-config li{
			margin-top: 30px;
		}
	</style>
</head>
<body style="background-color: #eee;">
	<?php  
		if(isset($_SESSION['mensagem'])){
	    	if($_SESSION['return'] == 'true'){
	    		echo "<script>alertify.success('" . $_SESSION['mensagem'] . "');</script>";	
	    	}else{
	    		echo "<script>alertify.error('" . $_SESSION['mensagem'] . "');</script>";
	    	}
	    }
	    unset($_SESSION['mensagem']);
	    unset($_SESSION['return']);
	?>
	<?php include_once('../../Assets/includes/header.php'); ?>
	
	<div id="wrapper">
		<?php include_once('../../Assets/includes/sidebar.php'); ?>

		<div id="page-content-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12"  style="margin-top: 20px;">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active" href="#div_geral" data-toggle="tab">Geral</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#div_materias" data-toggle="tab">Matérias</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#div_cargos" data-toggle="tab">Cargos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#div_alunos" data-toggle="tab">Alunos</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="div_geral">
						<ul class="row ul-config">
							<li class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
								<div class="row">
									<a href="../lista_usuarios/"><img src="../../Assets/img/user.png"></a>
									<a href="../lista_usuarios/"><p>Usuários</p></a>
								</div>
							</li>
							<li class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
								<div class="row">
									<a href="../cadastrar_cargo/index.php"><img src="../../Assets/img/cargo.png"></a>
									<a href="../cadastrar_cargo/index.php"><p>Cargos</p></a>
								</div>
							</li>
							<li class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
								<div class="row">
									<a href="#"><img src="../../Assets/img/materia.png"></a>
									<a href="#"><p>Matérias</p></a>
								</div>
							</li>
						</ul>
					</div>

					<div role="tabpanel" class="tab-pane fade" id="div_materias">
						tabpanel
					</div>

					<div role="tabpanel" class="tab-pane fade" id="div_cargos">
						3
					</div>

					<div role="tabpanel" class="tab-pane fade" id="div_alunos">
						4
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>