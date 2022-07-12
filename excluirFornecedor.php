<?php 
    require __DIR__.'/vendor/autoload.php';

use \App\entity\Fornecedor;


    // Validação do ID
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('location: listaFornecedor.php?status=error');
        exit;
    }

    // Consulta Vaga
    $obFornecdor = Fornecedor::getArFornecedor($_GET['id']);

    // Validação da Vaga
    if(!$obFornecdor instanceof Fornecedor) {
        header('location: listaFornecedor.php?status=error');
        exit;
    }

    // Validação do Post
    if(isset($_POST['excluirFornecedor'])) {

        $obFornecdor->excluirFornecedor();

        header('location: listaFornecedor.php?status=success');
        exit;
    }

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/confirmarExclusaoFornecedor.php';
    require __DIR__.'/includes/footer.php';
    
?> 