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