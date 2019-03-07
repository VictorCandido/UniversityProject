<?php
include '../../DAL/usuarioDAO.class.php';
include '../../DAL/Conexao.class.php';
$verificaLogin = new usuarioDAO();

$verificaLogin->verificaLogin();

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $verificaLogin->deletar($id);
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Usuários</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="../../Assets/js/alertify.js"></script>
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
					<div class="col-md-12" style="margin-top: 20px;">
						<h3 class="text-body"> Usuários</h3>
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Nome de Usuário</th>
									<th scope="col">Nome</th>
									<th scope="col">Data de Nascimento</th>
									<th scope="col">Email</th>
									<th></th>
									<th></th>
								</tr>
							</thead>

							<tbody>
								<?php
                                $usuarioDAO = new usuarioDAO();
                                $cont = 0;
                                foreach($usuarioDAO->lista() as $usuario){
                                    $cont++;
                                ?>
								<tr>
									<td scope="row">
										<?php echo $cont ?>
									</td>
									<td>
										<?php echo $usuario['usuario']; ?>
									</td>
									<td>
										<?php echo utf8_encode($usuario['nome']); ?>
									</td>
									<td>
										<?php echo utf8_encode($usuario['nascimento']); ?>
									</td>
									<td>
										<?php echo $usuario['email']; ?>
									</td>
									<td><a href="../editar_usuario/index.php?id=<?php echo $usuario['usuarioID'] ?>" name="editar"><i class="material-icons">edit</i></a></td>
									<td><a href="#" name="deletar" data-toggle="modal" data-target="#modal<?php echo $usuario['usuarioID'] ?>"><i
											 class="material-icons">delete</i></a></td>

									<div id="modal<?php echo $usuario['usuarioID'] ?>" class="modal fade" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Excluir</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p>Deseja realmente excluir o usuário
														<?php echo $usuario['usuario']; ?>?</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
													<a href="index.php?delete=<?php echo $usuario['usuarioID'] ?>" class="btn btn-primary">Excluir</a>
												</div>
											</div>
										</div>
									</div>
								</tr>
								<?php
                                }
                                ?>
							</tbody>
						</table>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>