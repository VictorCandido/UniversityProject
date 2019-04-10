<?php
include '../../DAL/usuarioDAO.class.php';
include '../../DAL/Conexao.class.php';

$usuarioDAO = new usuarioDAO();
$usuarioDAO->verificaLogin();

if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$usuarioPesquisa = $usuarioDAO->pesquisa('id', $id);
}

if(isset($_POST['btnSalvar'])){
	$nome = utf8_decode($_POST['nome']);
	$cpf = utf8_decode($_POST['cpf']);
	$nascimento = utf8_decode($_POST['dataNasc']);
	$email = utf8_decode($_POST['email']);
	$usuario = utf8_decode($_POST['usuario']);
	$senha = utf8_decode($_POST['senha']);
	$cep = utf8_decode($_POST['cep']);
	$logradouro = utf8_decode($_POST['logradouro']);
	$numero = utf8_decode($_POST['numero']);
	$bairro = utf8_decode($_POST['bairro']);
	$complemento = utf8_decode($_POST['complemento']);
	$cidade = utf8_decode($_POST['cidade']);
	$uf = utf8_decode($_POST['uf']);
	$id = utf8_decode($_GET['id']);

	$usuarioDAO->Update($nome, $cpf, $nascimento, $email, $usuario, $senha, $cep, $logradouro, $numero, $bairro, $complemento, $cidade, $uf, $id);
	echo "<script>voltar()</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar Usuário</title>
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
                header('Location: ../home/index.php');	
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
						<h3 class="light"> Editar Usuário</h3>
						<form id="form_novoUsuario" method="POST" action="">
							<div class="row">
								<div class="form-group col-md-12">
									<label for="nome">Nome<span style="color:red">*</span></label>
									<input type="text" name="nome" id="nome" class="form-control" value="<?php echo utf8_encode($usuarioPesquisa['nome']) ?>">
								</div>

								<div class="form-group col-md-6">
									<label for="cpf">CPF<span style="color:red">*</span></label>
									<input type="text" name="cpf" id="cpf" placeholder="111.111.111-11" class="form-control" value="<?php echo $usuarioPesquisa['cpf'] ?>">
								</div>

								<div class="form-group col-md-6">
									<label for="dataNasc">Data de Nascimento<span style="color:red">*</span></label>
									<input type="text" name="dataNasc" id="dataNasc" placeholder="01/01/2018" class="form-control" value="<?php echo $usuarioPesquisa['nascimento'] ?>">
								</div>
							</div>

							<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
								<div class="form-group col-md-3">
									<label for="cep">CEP</label>
									<input type="text" name="cep" id="cep" class="form-control" value="<?php echo $usuarioPesquisa['cep'] ?>">
								</div>

								<div class="form-group col-md-7">
									<label for="logradouro">Logradouro</label>
									<input type="text" name="logradouro" id="logradouro" class="form-control" value="<?php echo $usuarioPesquisa['logradouro'] ?>">
								</div>

								<div class="form-group col-md-2">
									<label for="numero">Número</label>
									<input type="text" name="numero" id="numero" class="form-control" value="<?php echo $usuarioPesquisa['numero'] ?>">
								</div>

								<div class="form-group col-md-4">
									<label for="bairro">Bairro</label>
									<input type="text" name="bairro" id="bairro" class="form-control" value="<?php echo $usuarioPesquisa['bairro'] ?>">
								</div>

								<div class="form-group col-md-3">
									<label for="complemento">Complemento</label>
									<input type="text" name="complemento" id="complemento" class="form-control" value="<?php echo $usuarioPesquisa['complemento'] ?>">
								</div>

								<div class="form-group col-md-4">
									<label for="cidade">Cidade</label>
									<input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo $usuarioPesquisa['cidade'] ?>">
								</div>

								<div class="form-group col-md-1">
									<label for="uf">UF</label>
									<input type="text" name="uf" id="uf" class="form-control" value="<?php echo $usuarioPesquisa['uf'] ?>">
								</div>
							</div>
							
							<div class="row">
								<div class="form-group col-md-4">
									<label for="email">Email</label>
									<input type="text" name="email" class="form-control" readonly value="<?php echo $usuarioPesquisa['email'] ?>">
								</div>
								<div class="form-group col-md-4">
									<label for="usuario">Usuário</label>
									<input type="text" name="usuario" class="form-control" readonly value="<?php echo $usuarioPesquisa['usuario'] ?>">
								</div>
								<div class="form-group col-md-4">
									<label for="senha">Senha</label>
									<input type="password" name="senha" class="form-control" readonly value="<?php echo $usuarioPesquisa['senha'] ?>">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-md-4">
									<a href="#" class="btn btn-info" style="width: 100%" data-toggle="modal" data-target="#alteraEmail">Alterar Email</a>
								</div>
								<div class="form-group col-md-4">
									<button class="btn btn-info" style="width: 100%">Alterar Usuário</button>
								</div>
								<div class="form-group col-md-4">
									<button class="btn btn-info" style="width: 100%">Alterar Senha</button>
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

		<div id="alteraEmail" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Alterar Email</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form>
			          <div class="form-group">
			            <label for="recipient-name" class="col-form-label">Email</label>
			            <input type="text" class="form-control" id="alteraEmail">
			          </div>
			          <div class="form-group">
			            <label for="recipient-name" class="col-form-label">Confirma Email</label>
			            <input type="text" class="form-control" id="confirmaEmail">
			          </div>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar </button>
			        <button type="button" class="btn btn-primary" id="salvarEmail"> Salvar </button>
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

		$('#salvarEmail').click(function(){
			$('#email').val($('#alteraEmail').val());
		});
	</script>
</body>
</html>
<?php  

?>