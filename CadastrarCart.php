<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Carrinho');

use \App\entity\Carrinho;

$obCarrinho = new Carrinho;

if (isset( $_POST['PRODUCT'], $_POST['preco_produto'], $_POST['DESCRIPTION'])) {
   
    $obCarrinho->PRODUCT = $_POST['PRODUCT'];
    $obCarrinho->preco_produto = $_POST['preco_produto'];
    $obCarrinho->DESCRIPTION = $_POST['DESCRIPTION'];

    $obCarrinho->cadastrarCarrinho();

    header('location: indexGerente.php?status=success');
    // echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
 
    exit;
}
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
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/formularioCart.php';
require __DIR__ . '/includes/footer.php';
