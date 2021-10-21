
<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset="UTF-8">
        <title> Iasmin - Condições de Repetição (FOREACH) </title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-ico">
    </head> 
    <body>
        <?php
        //Condições de Repetição (Foreach)
            $alunos = ["a","b","c","d"];
            var_dump($alunos);

            foreach($alunos as $aluno){ #acesso o elemento ALUNO, na lista/ array ALUNOS
                echo"Nome: $aluno <br>";
            }

        ?>
    </body>
    
</html>



