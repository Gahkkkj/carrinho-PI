<?php 
    require __DIR__.'/vendor/autoload.php';

use \App\entity\Fornecedor;


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

    // Validação do ID
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('location: listaFornecedor.php?status=error');
        exit;
    }

    // Consulta Vaga
    $obFornecedor = Fornecedor::getArFornecedor($_GET['id']);

    // Validação da Vaga
    if(!$obFornecedor instanceof Fornecedor) {
        header('location: listaFornecedor.php?status=error');
        exit;
    }

    // Validação do Post
    if(isset($_POST['excluirFornecedor'])) {

        $obFornecedor->excluirFornecedor();

        header('location: listagemFornecedor.php?status=success');
        exit;
    }

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/confirmarExclusaoFornecedor.php';
    require __DIR__.'/includes/footer.php';
    
?> 