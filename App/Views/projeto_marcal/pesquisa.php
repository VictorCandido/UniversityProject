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
                        <form class="form-inline">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="pesquisar" placeholder="Pesquise o CNPJ..." style="width: 90%">
                                <input type="button" name="btnPesquisar" class="btn btn-primary" value="Pesquisar">
                            </div>
                        </form>

                        <table class="table table-striped" id="tabela" style="margin-top: 20px"> 
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">Nome</th>
                              <th scope="col">CNPJ</th>
                              <th scope="col">Código</th>
                              <th scope="col">Quantidade</th>
                              <th scope="col">Preço Venda</th>
                              <th scope="col">Ativo</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr></tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('[name="btnPesquisar"]').click(function(){
            var cnpjPesquisa = $('#pesquisar').val();
            $.ajax({
                method:'GET',
                url:'/webservice/GET/?cnpj=' + cnpjPesquisa,
                dataType:'xml'
            }).done(function(response){
                console.log(response);

                var resultado = $(response).find('registro');

                $('#tabela').find('tbody').find('tr').remove();
                for(var i = 0; i < resultado.length; i++){                   
                    var newRow = $("<tr>");     
                    var cols = "";  
                    cols += '<td>' + $(resultado[i]).find('nome').text() + '</td>'; 
                    cols += '<td>' + $(resultado[i]).find('cnpj').text() + '</td>'; 
                    cols += '<td>' + $(resultado[i]).find('codigo').text() + '</td>'; 
                    cols += '<td>' + $(resultado[i]).find('quantidade').text() + '</td>';
                    cols += '<td>' + $(resultado[i]).find('preco').text() + '</td>';  
                    cols += '<td>' + $(resultado[i]).find('ativo').text() + '</td>';  
                    newRow.append(cols);        
                    $("#tabela").append(newRow);
                }

            }).fail(function(response){
                console.log(response)
            })
        });
    </script>

</body>

</html>