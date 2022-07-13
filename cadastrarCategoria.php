<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Categoria');

use \App\entity\Categoria;

$obCategoria = new Categoria;

if (isset($_POST['nome'], $_POST['descricao'], $_POST['data_compra'])) {
    $obCategoria->nome = $_POST['nome'];
    $obCategoria->descricao = $_POST['descricao'];
    $obCategoria->data_compra = $_POST['data_compra'];

    $obCategoria->cadastrar();

    header('location: listaCategoria.php?status=success');
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
require __DIR__ . '/includes/formulario.php';
require __DIR__ . '/includes/footer.php';
