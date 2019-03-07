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

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>