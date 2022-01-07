//validação do formulário de LOGIN
$(document).ready(function(){ //janela - pop up de notificação 
   // alert("Acessou a validação");
   $('#send_login').on("submit", function(){ 
        if ($('#username').val()==""){
            $(".msg").html("<p style='color:#f00'> Erro: Preencha o campo usuário!</p>");
            return false;
        }
        if($('#password').val()===""){
            $(".msg").html("<p style='color:#f00'> Erro: Preencha o campo senha!</p>");
            return false;
        }
   });

});

//validação do formulário  de NOVO CADASTRO 
$(document).ready(function(){ //janela - pop up de notificação 
    // alert("Acessou a validação");
    $('#login_new_user').on("submit", function(){ 
         if ($('#name').val()==""){
             $(".msg").html("<p style='color:#f00'> Erro: Preencha o campo Nome!</p>");
             return false;
         }
         if($('#email').val()===""){
            $(".msg").html("<p style='color:#f00'> Erro: Preencha o campo E-mail!</p>");
            return false;
        }
         if($('#password').val()===""){
             $(".msg").html("<p style='color:#f00'> Erro: Preencha o campo Senha!</p>");
             return false;
         }
    });
 
 });