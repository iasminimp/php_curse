<?php
    //echo 'Bem vindo ao site ... ! <br><hr>';

    #CONEXÃO COM o bd - sts_homes_tops - i4smin #####################################################
    $query_home_top = "SELECT  title_top, description_top, link_btn_top, txt_btn_top, image_top
        FROM sts_homes_tops
        LIMIT 1";
    $result_home_top= mysqli_query($conn, $query_home_top);
    #lendo o resultado da variavel result
    $row_home_top=mysqli_fetch_assoc($result_home_top);
    #var_dump($row_home_top); #prova real; se esta chegando info do bd

    #para listar o que esta sendo impresso no banco de dados
    extract($row_home_top);
   /* echo $title_top."<br>";
    echo $description_top."<br>";
    echo $link_btn_top."<br>";
    echo $txt_btn_top."<br>";
    echo $image_top."<br><br><hr>";*/
?>

<div class='jumbotron descr-top'>
        <div class='container text-center'>
            <h1 class='display-4'> <?php echo $title_top; ?></h1>
            <p class='lead'> <?php echo $description_top; ?></p>
            <a class='btn btn-primary btn-lg' href="<?php echo $link_btn_top; ?>" role='button'><?php  echo $txt_btn_top; ?></a>
        </div>
</div>

<?php
    
    #fazendo a conexão com o banco de dados- i4smin  ##################################################
    $query_home_serv = "SELECT title_serv, description_serv, icone_um_serv, titulo_um_serv, description_um_serv, icone_dois_serv, titulo_dois_serv, description_dois_serv, icone_tres_serv, titulo_tres_serv, description_tres_serv
        FROM sts_homes_servs
        LIMIT 1";
    $result_home_serv = mysqli_query($conn, $query_home_serv);

    #ler o resultado de result
    $row_home_serv=mysqli_fetch_assoc($result_home_serv);
    #var_dump($row_home_serv);

    #para impressão/ LISTAR do que está no banco de dados - extract
    extract($row_home_serv);
    /*echo $title_serv."<br>";
    echo $description_serv."<br><br>";

    echo $icone_um_serv."<br>";
    echo $titulo_um_serv."<br>";
    echo $description_um_serv."<br><br>";

    echo $icone_dois_serv."<br>";
    echo $titulo_dois_serv."<br>";
    echo $description_dois_serv."<br><br>";

    echo $icone_tres_serv."<br>";
    echo $titulo_tres_serv."<br>";
    echo $description_tres_serv."<br><br><hr>";*/
?>

<div class='jumbotron descr-serv'>
        <div class='container text-center'>
            <h2 class='display-4'> <?php echo $title_serv;?></h2>
            <p class='lead pb-4'> <?php echo $description_serv;?></p>
            <div class="row">
                <div class="col-lg-4">
                    <div class="rounded-circle circulo centralizar border border-info shadow">
                        <li class='<?php echo $icone_um_serv; ?>'></li>
                    </div>
                    <h2 class="mt-4 mb-4"><?php echo $titulo_um_serv;?></h2>
                    <p><?php echo $description_um_serv; ?></p>
                </div>
                <div class="col-lg-4">
                    <div class="rounded-circle circulo centralizar border border-info shadow">
                        <li class='<?php echo $icone_dois_serv;?>'></li> <!--<li class='fas fa-map-marked-alt'></li> -->
                    </div>
                    <h2 class='mt-4 mb-4'><?php echo $titulo_dois_serv;?></h2>
                    <p><?php echo $description_dois_serv; ?></p>
                </div>
                <div class="col-lg-4">
                    <div class="rounded-circle circulo centralizar border border-info shadow">
                        <li class='<?php echo $icone_tres_serv; ?>'></li>
                    </div>
                    <h2 class='mt-4 mb-4'><?php echo $titulo_tres_serv;?></h2>
                    <p><?php echo $description_tres_serv;?></p>
                </div>
            </div>
        </div>
    </div>


<?php

    #fazendo a conexão com o bd- i4smin - sts_homes_actions #########################################
    $query_home_action = "SELECT title_action, subtitle_action, description_action, link_btn_action, txt_btn_action, image_action
        FROM sts_homes_actions
        LIMIT 1";
    $result_home_action = mysqli_query($conn, $query_home_action);
    $row_home_action=mysqli_fetch_assoc($result_home_action);
    #var_dump($row_home_action);

    extract($row_home_action);
    /*
    echo $title_action."<br>";
    echo $subtitle_action."<br>";
    echo $description_action."<br>";
    echo $link_btn_action."<br>";
    echo $txt_btn_action."<br>";
    echo $image_action."<br><br><hr>";*/

?>
<div class='jumbotron descr-action'>
    <div class='container text-center'>
        <h4 class="lead mb-4"><?php echo $subtitle_action;?></h4>
        <h2 class="display-4 mb-4"><?php echo $title_action;?></h2>
        <p class='lead mb-4'><?php echo $description_action;?></p>
        <a class='btn btn-primary btn-lg' href="<?php echo $link_btn_action?>" role='button'><?php echo $txt_btn_action;?></a>
    </div>
</div>

<?php
    #fazendo a conexão com o bd- i4smin - sts_homes_dets #########################################
    $query_home_det = "SELECT title_det, subtitle_det, description_det, image_dets
        FROM sts_homes_dets
        LIMIT 1";
    $result_home_det = mysqli_query($conn, $query_home_det);
    $row_home_det=mysqli_fetch_assoc($result_home_det);
    
    #var_dump($row_home_det);    
    extract($row_home_det);
    /*echo $title_det."<br>";
    echo $subtitle_det."<br>";
    echo $description_det."<br>";
    echo $image_dets."<br><br><hr>";*/

/*
    $query_footer_2 = "SELECT title_site, title_contact, phone, endereco_footer, endereco_url, cnpj_footer, cnpj_url, title_redes, 
        text_rede_um, link_rede_um, 
        text_rede_dois, link_rede_dois, 
        text_rede_tres, link_rede_tres, 
        text_rede_quatro, link_rede_quatro, 
        FROM sts_footer
        LIMIT 1";
    $result_footer_2 = mysqli_query($conn, $query_footer_2);
    $row_footer_2=mysqli_fetch_assoc($result_footer_2);
    var_dump($row_footer_2);


    $query_footer = "SELECT title_site, title_contact, phone, address_footer, url_adress, cnpj, url_cnpj, title_social_networks,
        txt_one_social_networks, link_one_social_networks,
        txt_two_social_networks, link_two_social_networks,
        txt_three_social_networks, link_three_social_networks,
        txt_four_social_networks, link_four_social_networks,
        FROM sts_footers
        LIMIT 1";
    $result_footer = mysqli_query($conn, $query_footer);
    $row_footer = mysqli_fetch_assoc($result_footer);
    var_dump($row_footer);


    #fazendo a conexão com o bd- i4smin - sts_homes_footers #########################################
  $query_footer = "SELECT title_site, title_contact, phone, address_footer, url_adress, cnpj, url_cnpj, title_social_networks, 
    txt_one_social_networks, link_one_social_networks, 
    txt_two_social_networks, link_two_social_networks, 
    txt_three_social_networks, link_three_social_networks,
    txt_four_social_networks, link_four_social_networks,
    
        FROM sts_footers
        LIMIT 1";
    $result_home_footer = mysqli_query($conn, $query_footer);
    $row_home_footer = mysqli_fetch_assoc($result_home_footer);
    var_dump($row_home_footer);*/


?>

<div class='jumbotron descr-det'>
    <div class='container'>
        <h2 class='display-4 text-center titulo'> <?php echo $title_det;?></h2>
        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading"><?php echo $subtitle_det;?></h2>
                <p class="lead"><?php echo $description_det;?></p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                    src="app/sts/assets/images/home/detalhes_servico.jpg" width="500" height="500" alt="Detalhes dos serviços...">
            </div>
        </div>
    </div>

</div>