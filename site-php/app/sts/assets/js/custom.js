$(document).ready(function(){
    $('#new_contacts_msgs').on("submit", function(){
        //alert("Validar Formulário"); //pop-up java - alerta

        if($('#name').val()===""){
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Preencha o campo nome!</div>");
            return false;
        }else if($('#email').val()===""){
            /*  $(".msg").html("<p style='color: #f00;'>Erro: Preencha o campo e-mail!</p>");*/
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Preencha o campo e-mail!</div>");
            return false;
        }else if($('#subject').val()===""){
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Preencha o campo assunto!</div>");
            return false;
        }else if($('#content').val()===""){
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Preencha o campo conteúdo!</div>");
            return false;
        }
    });

});