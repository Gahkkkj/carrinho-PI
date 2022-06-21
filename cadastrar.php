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

    header('location: indexProdutos.php?status=success');
    echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    exit;
}

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/formulario.php';
require __DIR__ . '/includes/footer.php';
