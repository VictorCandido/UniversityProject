<?php
$usuarioDAO = new usuarioDAO();

$usuario = $usuarioDAO->pesquisa('usuario', $_SESSION['usuario']);
?>
<style>
    a{
        color: black;
    }
    a:hover {
        text-decoration: none;
        color: darkgray;
    }
</style>

<div class="bg-light border-right" id="sidebar-wrapper" style="">
    <ul class="list-group list-group-flush sidebar-nav">
        <li class="">
            <div class="row perfil">
                <div class="form-group col-md-10">
                    <img src="../../Assets/img/user_picture.png" class="rounded float-left" style="width: 70px;">
                    <div style="margin-left: 80px;">
                        <h4 class="h4"><?php echo $_SESSION['usuario'] ?></h4>
                        <a href="../editar_usuario/index.php?id=<?php echo $usuario['usuarioID'] ?>">Editar</a>
                    </div>
                </div>
                <div class="col-md-1">
                    
                </div>
            </div>
        </li>
        <li><a href="../home/index.php" class="list-group-item list-group-item-action bg-light">Página Inicial</a></li>
        <li><a href="" class="list-group-item list-group-item-action bg-light">Avisos</a></li>
        <li><a href="" class="list-group-item list-group-item-action bg-light">Disciplinas</a></li>
        <li><a href="" class="list-group-item list-group-item-action bg-light">Notas e Faltas</a></li>
        <li><a href="" class="list-group-item list-group-item-action bg-light">Calendário</a></li>
        <li><a href="../projeto_marcal" class="list-group-item list-group-item-action bg-light">Projeto Marçal</a></li>
        <li><a href="../painel_controle/index.php" class="list-group-item list-group-item-action bg-light">Painel de Controle</a></li>
</div>

<link rel="stylesheet" type="text/css" href="../../Assets/css/sidebar.css">
<script type="text/javascript" src="../../Assets/js/jquery-3.3.1.min.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>