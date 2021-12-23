<?php  
    if(!defined('R4F5CC')){ //limitando acesso ao diretorio
        header("Location: /");//redirecionar para a raiz
        die("Erro: Página não encontrada!");
    }
    #var_dump($path_page); #recebe o caminho
    
    #verificação de caminho 
    if(empty($path_page)){ //caminho esta vazio
        $path_page_seo = "home";
    }else{//caso contrario - seguir o caminho que o usuário digitou
        if(file_exists("app/int/view/".$path_page.".php")){
            $path_page_seo=$path_page;
        }else{
            $path_page_seo="404";
        }
    }
   
    #var_dump($path_page_seo);
    $query_seo_head = "SELECT title_page, descricao
        FROM sts_pages
        WHERE name_page = '$path_page_seo'
        LIMIT 1";

    $result_seo_head = mysqli_query($conn, $query_seo_head);
    $row_seo_head = mysqli_fetch_assoc($result_seo_head);
    #var_dump($row_seo_head);
?>
    <meta charset="UTF-8">
    <title><?php echo $row_seo_head['title_page'];?></title>
    <meta name="descricao" content="<?php echo $row_seo_head['descricao'];?>">
    <link rel='icon' href='app/sts/assets/images/icon/favicon.ico'>

     <!-- Adicionando Icones-->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Adicionando o Style Bootstrap-->
    <link rel="stylesheet" href="app/int/assets/css/custom_int.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">