<?php
include 'App/DAL/Conexao.class.php';
include 'App/DAL/usuarioDAO.class.php'; 
if(isset($_GET['logout'])){
    $usuarioDAO = new usuarioDAO();
    $usuarioDAO->logout();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="App/Assets/js/jquery-3.3.1.min.js"></script>
</head>
<body style="background-color: #eee; padding: 40px;">
    <div class="container">
        <aside class="col-sm-4 mx-auto">
            <div class="row" style="display: unset;">
                <div class="">
                    <article class="card-body">
                        <a href="App/Views/cadastrar_usuario/index.php" class="float-right btn btn-outline-primary">Cadastre-se</a>
                        <h4 class="card-title mb-4 mt-1">Entrar</h4>
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label>Nome de Usuário / Email</label>
                                <input name="email" class="form-control" placeholder="Email" type="text">
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <a class="float-right" href="#">Esqueceu?</a>
                                <label>Senha</label>
                                <input name="senha" class="form-control" placeholder="******" type="password">
                            </div> <!-- form-group// --> 
                            <div class="form-group">    
                                <div class="checkbox">
                                    <label> <input type="checkbox"> Salvar Senha </label>
                                </div> <!-- checkbox .// -->
                                
                                <?php
                                if($_POST){
                                    $usuarioDAO = new usuarioDAO();

                                    $usuario = $_POST['email'];
                                    $senha = $_POST['senha'];

                                    $user = $usuarioDAO->login($usuario, $senha);
                                    

                                    if($user){
                                        session_start();
                                        // $_SESSION['login'] = $usuarioDAO->getUsuario();
                                        header('Location: App/Views/home');
                                    }else{
                                        header('Location: index.php?erro=1');
                                    }    
                                }
                                ?>
                                
                                <?php 
                                if($_GET){ 
                                    if(isset($_GET['erro'])){
                                ?>
                                <span style="color: red">Usuário ou senha inválidos</span>
                                <?php
                                    }
                                }
                                ?>
                            </div> <!-- form-group// -->  
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Entrar  </button>
                            </div> <!-- form-group// -->                                                           
                        </form>
                    </article>
                </div>		
            </div>
        </aside>		
    </div>

    <script type="text/javascript" src="App/Assets/js/bootstrap.min.js"></script>
</body>
</html>