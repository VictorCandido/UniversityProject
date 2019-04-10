<?php
include '../../DAL/usuarioDAO.class.php';
include '../../DAL/clienteDAO.class.php';
include '../../DAL/Conexao.class.php';

$usuarioDAO = new usuarioDAO();
$usuarioDAO->verificaLogin();

$clienteDAO = new clienteDAO();

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$clientePesquisa = $clienteDAO->pesquisa($id);
}

if(isset($_POST['btnSalvar'])){
	$nome = utf8_decode($_POST['nome']);
	$cpf = utf8_decode($_POST['cpf']);
	$email = utf8_decode($_POST['email']);
	$operadora = utf8_decode($_POST['operadora']);
	$id = $_GET['id'];

	$clienteDAO->Update($nome, $cpf, $email, $operadora, $id);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar Cliente</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../Assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../Assets/css/default.min.css">
	<link rel="stylesheet" type="text/css" href="../../Assets/css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="../../Assets/css/bootstrap-datepicker.min.css">
	<script type="text/javascript" src="../../Assets/js/jquery-3.3.1.min.js"></script>
</head>
<body style="background-color: #eee;">
    <?php  
		if(isset($_SESSION['mensagem'])){
	    	if($_SESSION['return'] == 'true'){
                header('Location: ../prova_marcal/');
	    	}else{
                echo "<script>alertify.error('" . $_SESSION['mensagem'] . "');</script>";
                unset($_SESSION['mensagem']);
	            unset($_SESSION['return']);
	    	}
	    }
	    
	?>
	<?php include_once('../../Assets/includes/header.php'); ?>
	
	<div id="wrapper">
		<?php include_once('../../Assets/includes/sidebar.php'); ?>

		<div id="page-content-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12" style="margin-top: 30px;">
						<h3 class="light"> Editar Cliente</h3>
						<form id="form_novoUsuario" method="POST" action="">
							<div class="row">
								<div class="form-group col-md-6">
									<label for="nome">Nome<span style="color:red">*</span></label>
									<input type="text" name="nome" id="nome" class="form-control" value="<?php echo utf8_encode($clientePesquisa['clienteNome']) ?>">
								</div>

								<div class="form-group col-md-6">
									<label for="cpf">CPF<span style="color:red">*</span></label>
									<input type="text" name="cpf" id="cpf" placeholder="111.111.111-11" class="form-control" value="<?php echo $clientePesquisa['clienteCPF'] ?>">
								</div>

								<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input type="text" name="email" class="form-control" value="<?php echo $clientePesquisa['clienteEmail'] ?>">
								</div>

								<div class="form-group col-md-6">
									<label for="operadora">Operadora<span style="color:red">*</span></label>
									<select name="operadora" class="form-control">
										<?php  
											foreach ($clienteDAO->listaOperadora() as $operadora) {
												if($clientePesquisa['clienteOperadoraID'] == $operadora['operadoraID']){
													?>
													<option value="<?php echo $operadora['operadoraID'] ?>" selected><?php echo $operadora['operadoraNome'] ?></option>	
													<?php
												}else{
											?>
											<option value="<?php echo $operadora['operadoraID'] ?>"><?php echo $operadora['operadoraNome'] ?></option>	
											<?php
												}
											}
										?>
									</select>
								</div>
							</div>

							<div class="row">
								<div class="col-md-3">
									<button type="submit" class="btn btn-success" id="btnSalvar" name="btnSalvar"> Salvar </button>
									<a onclick="voltar()" href="#" class="btn btn-danger"> Cancelar </a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>	
		</div>
	</div>
	<script type="text/javascript" src="../../Assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../Assets/js/alertify.js"></script>
	<script type="text/javascript" src="../../Assets/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="../../Assets/js/bootstrap-datepicker.pt-BR.min.js"></script>
	<script type="text/javascript">
		function voltar(){
			history.go(-1)
		}
	</script>
</body>
</html>
<?php  

?>