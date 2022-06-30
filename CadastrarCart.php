<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Pedido');

use \App\entity\Pedido;

$obPedido = new Pedido;

if (isset($_POST['OID'], $_POST['PID'], $_POST['PNAME'], $_POST['preco_produto'], $_POST['QTY'], $_POST['TOTAL'])) {
    $obPedido->OID = $_POST['OID'];
    $obPedido->PID = $_POST['PID'];
    $obPedido->PNAME = $_POST['PNAME'];
    $obPedido->preco_produto = $_POST['preco_produto'];
    $obPedido->QTY = $_POST['QTY'];
    $obPedido->TOTAL = $_POST['TOTAL'];

    $obPedido->cadastrarPedido();

    header('location: indexProdutos.php?status=success');
    echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

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
