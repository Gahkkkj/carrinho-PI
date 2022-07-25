<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar registro!');

use App\entity\Categoria;


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
    header('location: indexFornecedor.php?status=error');
    exit;
}

//Consulta Vaga
$obCategoria = Categoria::getCategoria($_GET['id']);

//Validação da Vaga
if (!$obCategoria instanceof Categoria) {
    header('location: listaCategoria.php?status=error');
    exit;
}

//Validação do POST
if (isset($_POST['nome'], $_POST['descricao'])) {
    $obCategoria->nome = $_POST['nome'];
    $obCategoria->cnpj = $_POST['descricao'];

    $obCategoria->atualizarCategoria();

    header('location: ./listaCategoria.php?status=success');
    exit;
    
}

require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/INCLUDES/formularioCategoria.php';

require __DIR__ . '/INCLUDES/footer.php';