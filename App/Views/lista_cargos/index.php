<?php
include '../../DAL/usuarioDAO.class.php';
include '../../DAL/cargoDAO.class.php';
include '../../DAL/Conexao.class.php';
$verificaLogin = new usuarioDAO();
$cargos = new cargoDAO();

$verificaLogin->verificaLogin();

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $cargos->deletar($id);
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Cargos</title>
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
						<h3 class="text-body"> Cargos</h3>
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Código</th>
									<th scope="col">Cargo</th>
									<th></th>
									<th></th>
								</tr>
							</thead>

							<tbody>
								<?php
                                $Cargos = new cargoDAO();
                                $cont = 0;
                                foreach($Cargos->lista() as $cargo){
                                    $cont++;
                                ?>
								<tr>
									<td scope="row">
										<?php echo $cont ?>
									</td>
									<td>
										<?php echo $cargo['codigo']; ?>
									</td>
									<td>
										<?php echo utf8_encode($cargo['cargo']); ?>
									</td>
									<td><a href="../editar_cargo/index.php?id=<?php echo $cargo['cargoID'] ?>" name="editar"><i class="material-icons">edit</i></a></td>
									<td><a href="#" name="deletar" data-toggle="modal" data-target="#modal<?php echo $cargo['cargoID'] ?>"><i
											 class="material-icons">delete</i></a></td>

									<div id="modal<?php echo $cargo['cargoID'] ?>" class="modal fade" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Excluir</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p>Deseja realmente excluir o cargo
														<?php echo $cargo['cargo']; ?>?</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
													<a href="index.php?delete=<?php echo $cargo['cargoID'] ?>" class="btn btn-primary">Excluir</a>
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

				<div class="row">
					<div class="col-md-4">
						<a href="../cadastrar_cargos" class="btn btn-primary"> Cadastrar Novo Cargo </a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>