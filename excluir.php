<?php 
    require __DIR__.'/vendor/autoload.php';
    use \App\entity\Noticia;

    // Validação do ID
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('location: indexProdutos.php?status=error');
        exit;
    }

    // Consulta Vaga
    $obNoticia = Noticia::getNoticias($_GET['id']);

    // Validação da Vaga
    if(!$obNoticia instanceof Noticia) {
        header('location: indexProdutos.php?status=error');
        exit;
    }

    // Validação do Post
    if(isset($_POST['excluir'])) {

        $obNoticia->excluir();

        header('location: indexProdutos.php?status=success');
        exit;
    }

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/confirmarExclusao.php';
    require __DIR__.'/includes/footer.php';
?>