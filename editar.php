<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar Produto');

use \App\Entity\Carrinho;

//Validação do ID
if (!isset($_GET['id'])  || !is_numeric($_GET['id'])) {
    header('location: produtoscart.php?status=error');
    exit;
}

//Consulta Vaga
$obCarrinho = Carrinho::getCarrinhos($_GET['id']);
// echo "<pre>"; print_r($obCarrinho); echo "<pre>"; exit;

//Validação da Vaga
if (!$obCarrinho instanceof Carrinho) {
    header('location: produtoscart.php?status=error');
    exit;
}
//Validação do POST
if (isset($_POST['PID'], $_POST['PRODUCT'], $_POST['preco_produto'], $_POST['DESCRIPTION'])) {
    $obCarrinho->PID = $_POST['PID'];
    $obCarrinho->PRODUCT = $_POST['PRODUCT'];
    $obCarrinho->preco_produto = $_POST['preco_produto'];
    $obCarrinho->DESCRIPTION = $_POST['DESCRIPTION'];

    $obCarrinho->atualizarCarrinho();
    // echo "<pre>"; print_r($obCarrinho); echo "</pre>"; exit; 

    header('location: produtoscart.php?status=success');
    exit;
}
require __DIR__ . '/carrinho/index.php';

require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/INCLUDES/formularioCart.php';

require __DIR__ . '/INCLUDES/footer.php';