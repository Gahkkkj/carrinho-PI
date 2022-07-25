<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar registro!');

use App\entity\Categoria;

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

$obCategoria = new Categoria;

if (isset($_POST['nome'], $_POST['descricao'])) {
    $obCategoria->nome = $_POST['nome'];
    $obCategoria->descricao = $_POST['descricao'];

// echo "<pre>"; print_r($obCategoria); echo "<pre>"; exit;

    $obCategoria->cadastrar();

    header('location: listaCategoria.php?status=success');
    // echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    exit;
}

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/formularioCategoria.php';
require __DIR__ . '/includes/footer.php';
