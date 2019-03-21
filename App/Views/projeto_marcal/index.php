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
                        <h1 class="h1 mx-auto" style="width: 200px;">Boticário</h1>

                        <form id="formBoticario" method="POST" action="">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="nome">Nome Vendedor</label>
                                    <input type="text" name="nome" class="form-control">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="cnpj">CNPJ</label>
                                    <input type="text" name="cnpj" class="form-control">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="codigo">Código Produto</label>
                                    <input type="text" name="codigo" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="qtd">Quantidade</label>
                                    <input type="number" name="qtd" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="preco">Preço Venda</label>
                                    <input type="number" name="preco" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="checkbox">
                                        Ativo <input type="checkbox" name="ativo" value="sim">
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 50px">
                                 <div class="col-md-6">
                                    <input type="submit" name="enviar" value="Enviar" class="btn btn-success" style="width: 100%">
                                </div>

                                <div class="col-md-6">
                                    <input type="button" name="limpar" value="Limpar" class="btn btn-danger" style="width: 100%" onclick="limparCampos()">
                                </div>

                                <div class="col-md-12" style="margin-top: 30px">
                                    <a href="pesquisa.php" name="pesquisar" class="btn btn-primary" style="width: 100%">Pesquisar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../Assets/js/alertify.js"></script>
    <script type="text/javascript">
        function limparCampos(){
            $('[name="nome"]').val('');
            $('[name="cnpj"]').val('');
            $('[name="codigo"]').val('');
            $('[name="qtd"]').val('');
            $('[name="preco"]').val('');
            $('[name="ativo"]:checked').prop("checked", false);
        }

        $('#formBoticario').submit(function(e){
            e.preventDefault();
            var nome        = $('[name="nome"]');
            var cnpj        = $('[name="cnpj"]');
            var codigo      = $('[name="codigo"]');
            var quantidade  = $('[name="qtd"]');
            var preco       = $('[name="preco"]');

            if($('[name="ativo"]:checked').length > 0){
                var ativo = 'SIM';
            }else{
                var ativo = 'NAO';
            }

            $.ajax({
              url : "http://192.168.64.2/webservice/POST/?insere",
              type : 'post',
              data : {
                    nome: nome.val(),
                    cnpj: cnpj.val(),
                    codigo: codigo.val(),
                    quantidade: quantidade.val(),
                    preco: preco.val(),
                    ativo: ativo
              },
                dataType:'xml',
            }).done(function(msg){
                var retorno = $(msg).find('retorno').text();
                console.log(retorno);

                if(retorno == 'OK'){
                    alertify.success('Dados enviados com sucesso!');
                    nome.val('');
                    cnpj.val('');
                    codigo.val('');
                    quantidade.val('');
                    preco.val('');
                    $('[name="ativo"]:checked').prop("checked", false);

                }else{
                    alertify.error('Falha ao enviar dados!');
                }
            }).fail(function(msg){
              alert(msg);
            }); 
        });



    </script>
</body>

</html>