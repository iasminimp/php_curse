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
/*
//validação do formulário  de NOVO CADASTRO 
$(document).ready(function(){ //janela - pop up de notificação 
    // alert("Acessou a validação");
    $('#login_new_user').on("submit", function(){ 
        var password = $('#password').val(); //criação da variavel password
         if ($('#name').val()==""){
             $(".msg").html("<p style='color:#f00'> Erro: Preencha o campo Nome!</p>");
             return false;
         }
         if($('#email').val()===""){
            $(".msg").html("<p style='color:#f00'> Erro: Preencha o campo E-mail!</p>");
            return false;
        }
        if(password === ""){
            $(".msg").html("<p style='color:#f00'> Erro: Preencha o campo Senha!</p>");
            return false;
        }
        //condição senha - se a senha for menor q 6, exibe uma mensagem de erro
        if(password.length < 6){
            $(".msg").html("<p style='color:#f00'> Erro: A senha deve ter no mínimo 6 caracteres!</p>");
            return false;
        }
        //condição senha- um numero entre 1 e 9, e tende ser mais de uma vez
        if(password.match(/([1-9]+)\1{1,}/)){
            $(".msg").html("<p style='color:#f00'> Erro: A senha não pode conter número repetido!</p>");
            return false;
        }
        //condição senha - deve conter pelo menos uma letra
        if(!password.match(/[A-Za-z]/)){
            $(".msg").html("<p style='color:#f00'> Erro: A senha deve ter pelo menos uma letra!</p>");
            return false;
        }
    });
 
 });
*/

//função para validar a força da senha
 function passwordStrength(){
    //alert("Acessou");
    var password = document.getElementById('password').value;
    var strength = 0;

    if((password.length >= 6) && (password.length <= 7)){
        strength +=10;
    }else if (password.length > 7){
        strength +=25;
    }

    if ((password.length >= 6) && (password.match(/[a-z]+/))){
        strength+=20;
    }
    
    if ((password.length >= 7) && (password.match(/[A-Z]+/))){
        strength+=20;
    }

    if ((password.length >= 8) && (password.match(/[@#$%&*]+/))){
        strength+=25;
    }

    if(password.match(/([1-9]+)\1{1,}/)){
        strength+= -25;
    }

    //console.log (strength);
    viewStrength (strength);
}

function viewStrength (strength){
    //Imprimir a força da senha
    if(strength<30){
        document.getElementById("msgviewStrength").innerHTML = ("<p style='color: #f00'>Senha Fraca</p>");
    }else if ((strength>=30) && (strength<50)){
        document.getElementById("msgviewStrength").innerHTML = ("<p style='color: #ff8c00'>Senha Fraca</p>");
    }else if ((strength>=50) && (strength<70)){
        document.getElementById("msgviewStrength").innerHTML = ("<p style='color: #7cfc00'>Senha Boa</p>");
    }else if ((strength>=70) && (strength<100)){
        document.getElementById("msgviewStrength").innerHTML = ("<p style='color: #008000'>Senha Forte</p>");
    }
}