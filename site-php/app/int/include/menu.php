<?php
   
if(!defined('R4F5CC')){ //limitando acesso ao diretorio
    header("Location: /");//redirecionar para a raiz
    die("Erro: Página não encontrada!");
}
?>

<!-- fixed-top : para fixar o menu no top, na pagina toda (scroll) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top" aria-label="Eighth navbar example">
        <div class="container">
            <a class="navbar-brand" href="<?php echo URLSITE; ?>">Iasmin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07"
                aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo URLSITE; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLSITE.'/sobre'; ?>">Sobre Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLSITE.'/contato'; ?>">Contato</a>
                    </li>
                </ul>

            </div>
        </div>
</nav>

<?php  /*
    echo "<a href='".URLSITE."'>Home</a><br>";
    echo "<a href='".URLSITE."/sobre'>Sobre</a><br>";
    echo "<a href='".URLSITE."/contato'>Contato</a><br><hr>";
*/
?>
    
