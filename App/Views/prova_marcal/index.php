<?php
include '../../DAL/usuarioDAO.class.php';
include '../../DAL/clienteDAO.class.php';
include '../../DAL/Conexao.class.php';
$verificaLogin = new usuarioDAO();
$verificaLogin->verificaLogin();

$clienteDAO = new clienteDAO();
if(isset($_GET['delete'])){
    $clienteDAO->deletar($_GET['delete']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Prova Marçal</title>
    <meta charset="utf-8">
    
</head>

<body style="background-color: #eee;">
    <?php  
    if(isset($_SESSION['mensagem'])){
        if($_SESSION['return'] == 'true'){
            echo "<script>alertify.success('" . $_SESSION['mensagem'] . "');</script>";	
            header('Location: index.php');
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
                        <form class="form-inline">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="pesquisar" placeholder="Pesquise o cliente..." style="width: 100%">
                            </div>
                        </form>

                        <table class="table table-striped" id="tabela" style="margin-top: 20px"> 
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Nome</th>
                              <th scope="col">CPF</th>
                              <th scope="col">E-mail</th>
                              <th scope="col">Operadora</th>
                              <th></th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php  
                            
                            $cont = 0;
                            foreach ($clienteDAO->lista() as $cliente) {
                                $cont ++;
                            ?>
                            <tr>
                                <td scope="row">
                                    <?php echo $cont ?>
                                </td>
                                <td>
                                    <?php echo utf8_encode($cliente['clienteNome']); ?>
                                </td>
                                <td>
                                    <?php echo utf8_encode($cliente['clienteCPF']); ?>
                                </td>
                                <td>
                                    <?php echo utf8_encode($cliente['clienteEmail']); ?>
                                </td>

                                <?php 
                                foreach ($clienteDAO->listaOperadora() as $operadora) {
                                    if($cliente['clienteOperadoraID'] == $operadora['operadoraID']){
                                        ?>
                                        <td>
                                            <?php echo $operadora['operadoraNome']; ?>
                                        </td>
                                        <?php
                                        break;
                                    }
                                }
                                ?>
                                <td><a href="../editar_marcal/?id=<?php echo $cliente['clienteID'] ?>" name="editar"><i class="material-icons">edit</i></a></td>
                                <td><a href="#" name="deletar" data-toggle="modal" data-target="#modal<?php echo $cliente['clienteID'] ?>"><i
                                         class="material-icons">delete</i></a></td>

                                <div id="modal<?php echo $cliente['clienteID'] ?>" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Excluir</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Deseja realmente excluir o cliente
                                                    <?php echo $cliente['clienteNome']; ?>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <a href="index.php?delete=<?php echo $cliente['clienteID'] ?>" class="btn btn-primary">Excluir</a>
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a href="../novo_marcal" class="btn btn-primary" style="width: 100%; margin-top: 20px;"> Novo Cliente </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../Assets/js/alertify.js"></script>
</body>

</html>