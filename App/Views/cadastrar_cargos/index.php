<?php
include '../../DAL/usuarioDAO.class.php';
include '../../DAL/cargoDAO.class.php';
include '../../DAL/Conexao.class.php';
if(isset($_POST['btnCadastrar'])){
    $codigo = utf8_decode($_POST['codigo']);
    $cargo = utf8_decode($_POST['cargo']);
    
    $cargoDAO = new cargoDAO();
    $cargoDAO->Inserir($codigo, $cargo);
}
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Cargos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../Assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../Assets/css/default.min.css">
	<link rel="stylesheet" type="text/css" href="../../Assets/css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="../../Assets/css/cadastrarUsuario.css">
	<link rel="stylesheet" type="text/css" href="../../Assets/css/bootstrap-datepicker.min.css">
	<script type="text/javascript" src="../../Assets/js/jquery-3.3.1.min.js"></script>
</head>
<body style="background-color: #eee;">
    <?php  
		if(isset($_SESSION['mensagem'])){
	    	if($_SESSION['return'] == 'true'){
                header('Location: ../lista_cargos');	
	    	}else{
                echo "<script>alertify.error('" . $_SESSION['mensagem'] . "');</script>";
                unset($_SESSION['mensagem']);
	            unset($_SESSION['return']);
	    	}
	    }
	    
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-top: 30px;">
				<h3 class="light"> Novo Cargo</h3>
				<form id="form_novoUsuario" method="POST" action="">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="codigo">Código<span style="color:red">*</span></label>
							<input type="text" name="codigo" id="codigo" class="form-control">
						</div>

						<div class="form-group col-md-6">
							<label for="cargo">Cargo<span style="color:red">*</span></label>
							<input type="text" name="cargo" id="cargo" class="form-control">
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<button type="submit" class="btn btn-success" id="btnCadastrar" name="btnCadastrar"> Cadastrar </button>
							<a href="#" class="btn btn-danger" onclick="voltar()"> Cancelar </a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	
	<script type="text/javascript" src="../../Assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../Assets/js/alertify.js"></script>
	<script type="text/javascript" src="cadastrarUsuario.js"></script>
	<script type="text/javascript" src="../../Assets/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="../../Assets/js/bootstrap-datepicker.pt-BR.min.js"></script>

	<script type="text/javascript">
		function voltar(){
			history.go(-1)
		}
	</script>
</body>
</html>