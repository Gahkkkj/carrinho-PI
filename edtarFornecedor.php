<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar registro!');

use App\entity\fornecedor;


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
    header('location: index.php?status=error');
    exit;
}

//Consulta Vaga
$obFornecedor = Fornecedor::getArFornecedor($_GET['id']);

//Validação da Vaga
if (!$obFornecedor instanceof Fornecedor) {
    header('location: index.php?status=error');
    exit;
}

//Validação do POST
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


    $obFornecedor->atualizarFornecedor();

    header('location: listagemFornecedor.php?status=success');
    exit;
    
}

require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/INCLUDES/formularioFornecedor.php';

require __DIR__ . '/INCLUDES/footer.php';