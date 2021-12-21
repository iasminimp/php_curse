$(document).ready(function(){
    $('#new_contacts_msgs').on("submit", function(){
        //alert("Validar Formulário"); //pop-up java - alerta

        if($('#name').val()===""){
            $(".msg").html("<p style='color: #f00;'>Erro: Preencha o campo nome!</p>");
            return false;
        }else if($('#email').val()===""){
            $(".msg").html("<p style='color: #f00;'>Erro: Preencha o campo e-mail!</p>");
            return false;
        }else if($('#subject').val()===""){
            $(".msg").html("<p style='color: #f00;'>Erro: Preencha o campo assunto!</p>");
            return false;
        }else if($('#content').val()===""){
            $(".msg").html("<p style='color: #f00;'>Erro: Preencha o campo conteúdo!</p>");
            return false;
        }
    });

});