<?php
include '../../DAL/usuarioDAO.class.php';
include '../../DAL/Conexao.class.php';
if(isset($_POST['btnCadastrar'])){
    $nome = utf8_decode($_POST['nome']);
    $cpf = utf8_decode($_POST['cpf']);
    $dataNasc = utf8_decode($_POST['dataNasc']);
    $email = utf8_decode($_POST['email']);
    $senha = utf8_decode($_POST['senha']);
    $usuario = utf8_decode($_POST['usuario']);
    
    $usuarioDAO = new usuarioDAO();
    $usuarioDAO->Inserir($nome, $cpf, $dataNasc, $email, $usuario, $senha);
    $usuario = $usuarioDAO->pesquisa('email', $email);
    $_SESSION['usuario'] = $usuario['usuario'];
}
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Usuário</title>
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
                header('Location: ../home/index.php');	
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
				<h3 class="light"> Novo Usuário</h3>
				<form id="form_novoUsuario" method="POST" action="">
					<div class="row">
						<div class="form-group col-md-12">
							<label for="nome">Nome<span style="color:red">*</span></label>
							<input type="text" name="nome" id="nome" class="form-control">
						</div>

						<div class="form-group col-md-6">
							<label for="cpf">CPF<span style="color:red">*</span></label>
							<input type="text" name="cpf" id="cpf" placeholder="111.111.111-11" class="form-control">
						</div>

						<div class="form-group col-md-6">
							<label for="dataNasc">Data de Nascimento<span style="color:red">*</span></label>
							<input type="text" name="dataNasc" id="dataNasc" placeholder="01/01/2018" class="form-control">
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-md-6">
							<label for="email">Email<span style="color:red">*</span></label>
							<input type="email" name="email" id="email" placeholder="email@exemplo.com" class="form-control">
							<span class="email-disponivel" style="display: none; color: green">Email disponível</span>
							<span class="email-indisponivel" style="display: none; color: red">Email já cadastrado</span>
						</div>

						<div class="form-group col-md-6">
							<label for="confirmaEmail">Confirmar Email<span style="color:red">*</span></label>
							<input type="email" name="confirmaEmail" id="confirmaEmail" placeholder="email@exemplo.com" class="form-control">
							<span class="email-text" style="display: none; color: red">Email inválido</span>
						</div>

						<div class="form-group col-md-12">
							<label for="usuario">Nome de usuário<span style="color:red">*</span></label>
							<input type="text" name="usuario" id="usuario" placeholder="" class="form-control">
							<span class="usuario-disponivel" style="display: none; color: green">Nome de usuário disponível</span>
							<span class="usuario-indisponivel" style="display: none; color: red">Nome de usuário indisponível</span>
						</div>

						<div class="form-group col-md-6">
							<label for="senha">Senha<span style="color:red">*</span></label>
							<input type="password" name="senha" id="senha" placeholder="***********" class="form-control">
						</div>

						<div class="form-group col-md-6">
							<label for="confirmarSenha">Confirmar Senha<span style="color:red">*</span></label>
							<input type="password" name="confirmarSenha" id="confirmarSenha" placeholder="***********" class="form-control">
							<span class="password-text" style="display: none; color: red">Senha inválida</span>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<button type="submit" class="btn btn-success" id="btnCadastrar" name="btnCadastrar"> Cadastrar </button>
							<a href="../../../index.php" class="btn btn-danger"> Cancelar </a>
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
</body>
</html>