<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar Produto');

use \App\Entity\Carrinho;

include "./carrinho/config.php";
session_start();


include "./carrinho/cart.class.php";
$cart = new Cart();

$data = [];
$sql = "select * from produtos_carrinho";
$res = $con->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $data[] = $row;

    }
}


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
    header('location:./carrinho/index.php?status=error');
    exit;
}
//Validação do POST
if (isset( $_POST['PRODUCT'], $_POST['preco_produto'], $_POST['DESCRIPTION'])) {
   
    $obCarrinho->PRODUCT = $_POST['PRODUCT'];
    $obCarrinho->preco_produto = $_POST['preco_produto'];
    $obCarrinho->DESCRIPTION = $_POST['DESCRIPTION'];

    $obCarrinho->atualizarCarrinho();
    // echo "<pre>"; print_r($obCarrinho); echo "</pre>"; exit; 

    header('location: ./carrinho/index.php?status=success');
    exit;
}


require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/INCLUDES/formularioCart.php';

require __DIR__ . '/INCLUDES/footer.php';