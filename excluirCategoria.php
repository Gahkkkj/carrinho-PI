<?php 
    require __DIR__.'/vendor/autoload.php';

use \App\entity\Categoria;

    // Validação do ID
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('location: listaCategoria.php?status=error');
        exit;
    }

    // Consulta Vaga
    $obCategoria = Categoria::getCategorias($_GET['id']);

    // Validação da Vaga
    if(!$obCategoria instanceof Categoria) {
        header('location: listaCategoria.php?status=error');
        exit;
    }

    // Validação do Post
    if(isset($_POST['excluir'])) {

        $obCategoria->excluir();

        header('location: listaCategoria.php?status=success');
        exit;
    }

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/confirmarExclusaoCategoria.php';
    require __DIR__.'/includes/footer.php';
?>