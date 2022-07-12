<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar registro!');

use App\entity\Fornecedor;

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

$obFornecedor = new Fornecedor();

// echo "<pre>"; print_r($_POST); echo "<pre>"; exit;
if (isset($_POST['nome'], $_POST['cnpj'], $_POST['descricao'], $_POST['numero_end'], $_POST['rua_end'], $_POST['bairro_end'], $_POST['cidade_end'], $_POST['estado_end'], $_POST['ordem'], $_POST['status'])) {
    $obFornecedor->nome = $_POST['nome'];
    $obFornecedor->cnpj = $_POST['cnpj'];
    $obFornecedor->descricao = $_POST['descricao'];
    $obFornecedor->numero_end = $_POST['numero_end'];
    $obFornecedor->rua_end = $_POST['rua_end'];
    $obFornecedor->bairro_end = $_POST['bairro_end'];
    $obFornecedor->cidade_end = $_POST['cidade_end'];
    $obFornecedor->estado_end = $_POST['estado_end'];
    $obFornecedor->ordem = $_POST['ordem'];
    $obFornecedor->status = $_POST['status'];

    // echo "<pre>"; print_r($_POST); echo "<pre>"; exit;


// echo "<pre>"; print_r($obGrupo); echo "<pre>"; exit;


    $obFornecedor->cadastrarFornecedor();

    header('location: listaFornecedor.php?status=success');
    // echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    exit;
}

    


require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/formularioFornecedor.php';
require __DIR__ . '/includes/footer.php';
