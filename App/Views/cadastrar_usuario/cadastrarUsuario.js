var validaEmail, validaUsuario;

$(document).ready(function () {
    $('#dataNasc').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR"
    });
});

$('#email').keyup(function (e) {
    verificaEmail();
});

$('#usuario').keyup(function (e) {
    verificaUsuario();
});

$('#confirmaEmail').blur(function () {
    confirmarEmail();
});

$('#confirmarSenha').blur(function () {
    confirmaSenha();
});

$('#form_novoUsuario').submit(function (e) {
    // if(!validaForm()[0]){
    //     e.preventDefault(); 
    //     alertify.error(validaForm()[1]);
    // }
});

// function verificaEmail(){
//     var email = $('#email').val();

//     $.ajax({
//         type: 'POST',
//         data: {
//             dados_email: email
//         },
//         url: 'php/verifica_email.php',
//         async: true
//     }).done(function(data){
//         $email = $.parseJSON(data)['email'];

//         if($email){
//             $('.email-disponivel').show();
//             $('.email-indisponivel').hide();
//             validaEmail = true;
//         }else{
//             $('.email-disponivel').hide();
//             $('.email-indisponivel').show();
//             validaEmail = false;
//         }
//     });
// }

// function verificaUsuario(){
//     var usuario = $('#usuario').val();

//     $.ajax({
//         type: 'POST',
//         data: {
//             dados_usuario: usuario
//         },
//         url: 'php/verifica_usuario.php',
//         async: true
//     }).done(function(data){
//         $usuario = $.parseJSON(data)['usuario'];

//         if($usuario){
//             $('.usuario-disponivel').show();
//             $('.usuario-indisponivel').hide();
//             validaUsuario = true;
//         }else{
//             $('.usuario-disponivel').hide();
//             $('.usuario-indisponivel').show();
//             validaUsuario = false;
//         }
//     });
// }

function confirmarEmail() {
    var email = $('#email');
    var confirmaEmail = $('#confirmaEmail');

    if (email.val() === confirmaEmail.val()) {
        email.css('border-color', '');
        confirmaEmail.css('border-color', '');
        $('.email-text').hide();
        return true;
    } else {
        email.css('border-color', 'red');
        confirmaEmail.css('border-color', 'red');
        $('.email-text').show();
        return false;
    }
}

function confirmaSenha() {
    var senha = $('#senha');
    var confirmarSenha = $('#confirmarSenha');

    if (senha.val() === confirmarSenha.val()) {
        senha.css('border-color', '');
        confirmarSenha.css('border-color', '');
        $('.password-text').hide();
        return true;
    } else {
        senha.css('border-color', 'red');
        confirmarSenha.css('border-color', 'red');
        $('.password-text').show();
        return false;
    }
}

function validaForm() {
    var nome = $('#nome');
    var cpf = $('#cpf');
    var dataNasc = $('#dataNasc');
    var email = $('#email');
    var confirmaEmail = $('#confirmaEmail');
    var usuario = $('#usuario');
    var senha = $('#senha');
    var confirmarSenha = $('#confirmarSenha');
    var retorno = new Array();
    retorno[0] = true;

    if (nome.val() == "") {
        retorno[0] = false;
        retorno[1] = "Nome não inserido";
    }
    if (cpf.val() == "") {
        retorno[0] = false;
        retorno[1] = "CPF não inserido";
    }
    if (dataNasc.val() == "") {
        retorno[0] = false;
        retorno[1] = "Data de nascimento não inserido";
    }
    if (email.val() == "") {
        retorno[0] = false;
        retorno[1] = "Email não inserido";
    } else {
        // if(validaEmail){
        if (confirmaEmail.val() == "") {
            retorno[0] = false;
            retorno[1] = "Email não inserido";
        } else {
            if (!confirmarEmail()) {
                retorno[0] = false;
                retorno[1] = "Email inválido";
            }
        }
        // }else{
        retorno[0] = false;
        retorno[1] = "Email indisponível";
        // }
    }
    if (usuario.val() == "") {
        retorno[0] = false;
        retorno[1] = "Usuário não inserido";
    } else {
        // if(!validaUsuario){
        retorno[0] = false;
        retorno[1] = "Usuário indisponível";
        // }
    }
    if (senha.val() == "") {
        retorno[0] = false;
        retorno[1] = "Senha não inserido";
    } else {
        if (confirmarSenha.val() == "") {
            retorno[0] = false;
            retorno[1] = "Senha não inserido";
        } else {
            if (!confirmaSenha()) {
                retorno[0] = false;
                retorno[1] = "Senha inválida";
            }
        }
    }
    return retorno;
}