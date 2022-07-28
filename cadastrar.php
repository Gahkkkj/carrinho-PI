<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar noticia');

use \App\entity\Noticia;

$obNoticia = new Noticia;

if (isset($_POST['nome'], $_POST['descricao'], $_POST['data_compra'], $_POST['nota_fiscal'], $_POST['preco'], $_POST['quantidade'])) {
    $obNoticia->nome = $_POST['nome'];
    $obNoticia->descricao = $_POST['descricao'];
    $obNoticia->data_compra = $_POST['data_compra'];
    $obNoticia->nota_fiscal = $_POST['nota_fiscal'];
    $obNoticia->preco = $_POST['preco'];
    $obNoticia->quantidade = $_POST['quantidade'];

    $obNoticia->cadastrar();

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
require __DIR__ . '/includes/formulario.php';
require __DIR__ . '/includes/footer.php';
