<?php
   
if(!defined('R4F5CC')){ //limitando acesso ao diretorio
    header("Location: /");//redirecionar para a raiz
    die("Erro: Página não encontrada!");
}
    #fazendo a conexao com o bd - i4smin - sts_rodape
    $query_rodape = "SELECT title_site, imagem_rodape, contato_rodape, phone_rodape, title_redes_rodape, title_rede_um, text_rede_um, title_rede_dois, text_rede_dois
        FROM sts_rodape
        LIMIT 1";
    $result_rodape=mysqli_query($conn, $query_rodape);
    $row_rodape = mysqli_fetch_assoc($result_rodape);
    #var_dump($row_rodape);

    extract($row_rodape);
/*  echo "<hr>";
    echo $title_site."<br>";
    echo $imagem_rodape."<br>";
    echo $contato_rodape."<br>";
    echo $phone_rodape."<br>";
    echo $title_redes_rodape."<br>";
    echo $title_rede_um."<br>";
    echo $text_rede_um."<br>";
    echo $title_rede_dois."<br>";
    echo $text_rede_dois."<br><hr>";
*/

?>


<div class="jumbotron footer-per">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4">
                    <h5><?php echo $title_site;?></h5>
                    <ul class="list-unstyled">
                        <li> <a href='<?php echo URLSITE; ?>' class="link-footer">Home</a></li>
                        <li> <a href='<?php echo URLSITE.'/sobre'; ?>' class="link-footer">Sobre Empresa</a></li>
                        <li> <a href='<?php echo URLSITE.'/contato'; ?>' class="link-footer">Contato</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-4">
                    <h5><?php echo $contato_rodape;?></h5>
                    <ul class="list-unstyled">
                        <li> <a href='<?php echo URLSITE.'/contato'; ?>' class="link-footer"><?php echo $phone_rodape;?></a></li>
                        <!--<li> <a href='' class="link-footer">Av. Oceano Atlatico</a></li> -->
                        <li> <a href='<?php echo URLSITE.'/contato'; ?>' class="link-footer"><?php echo $imagem_rodape;?></a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-4">
                    <h5><?php echo $title_redes_rodape;?></h5>
                  <ul class='list-unstyled'>

                        <li> <a href='<?php echo $text_rede_um;?>' target='_blank' class='link-footer'><?php  echo $title_rede_um;?></a></li>
                        <li> <a href='<?php echo $text_rede_dois;?>' target='_blank' class='link-footer'><?php  echo $title_rede_dois;?></a></li>
                        <!--
                        <li> <a href='https://www.google.com.br/?gws_rd=ssl' target='_blank' class='link-footer'>Instagram</a></li>
                        <li> <a href="https://www.facebook.com/hubdocricare" target='_blank' class='link-footer'>Facebook</a></li>
                        <li><a href="https://www.youtube.com/index" target='_blank' class='link-footer'>Youtube</a></li>
                        <li><a href="https://www.twitter.com/index" target='_blank' class='link-footer'>Twitter</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>


 <!--scripts -->
 <script src="app\sts\assets\js\jquery.min.js"> </script> <!--dentro do projeto -->
<script src="app\sts\assets\js\custom.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

