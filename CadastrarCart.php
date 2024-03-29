<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Produto');

use \App\entity\Carrinho;
use \App\entity\Categoria;


$obCarrinho = new Carrinho;

$Categoria = Categoria::getCategoria();


if (isset( $_POST['PRODUCT'], $_POST['data_compra'], $_POST['preco_produto'], $_POST['DESCRIPTION'],$_POST['quantidade'], $_POST['fk_id_categoria'])) {
   
    $obCarrinho->PRODUCT = $_POST['PRODUCT'];
    $obCarrinho->data_compra = $_POST['data_compra'];
    $obCarrinho->preco_produto = $_POST['preco_produto'];
    $obCarrinho->DESCRIPTION = $_POST['DESCRIPTION'];
    $obCarrinho->quantidade = $_POST['quantidade'];
    $obCarrinho->fk_id_categoria = $_POST['fk_id_categoria'];

    $obCarrinho->cadastrarCarrinho();

    header('location: indexGerente.php?status=success');
    // echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
 
    exit;
}
include "./carrinho/config.php";

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
