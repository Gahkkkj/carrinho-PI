<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar registro!');

use App\entity\Pedido;
include "./carrinho/config.php";
session_start();

include_once "./carrinho/cart.class.php";
$cart = new Cart();



//Validação do ID
if (!isset($_GET['ID'])  || !is_numeric($_GET['ID'])) {
    header('location: pedidoindex.php?status=error');
    exit;
}

//Consulta Vaga
$obPedido = Pedido::getPedidos($_GET['ID']);

//Validação da Vaga
if (!$obPedido instanceof Pedido) {
    header('location: pedidoindex.php?status=error');
    exit;
}

//Validação do POST
if (isset($_POST['OID'], $_POST['PID'],  $_POST['PNAME'], $_POST['preco_produto'], $_POST['QTY'], $_POST['TOTAL'])) {
    $obPedido->OID = $_POST['OID'];
    $obPedido->PID = $_POST['PID'];
    $obPedido->PNAME = $_POST['PNAME'];
    $obPedido->preco_produto = $_POST['preco_produto'];
    $obPedido->QTY = $_POST['QTY'];
    $obPedido->TOTAL = $_POST['TOTAL'];
   
       
    
    $obPedido->atualizarPedido();

    header('location: pedidoindex.php?status=success');
    exit;
    
}

require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/includes/formularioPedido.php';

require __DIR__ . '/INCLUDES/footer.php';