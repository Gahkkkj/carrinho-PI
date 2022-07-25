<?php 
    require __DIR__.'/vendor/autoload.php';

use \App\entity\Categoria;


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
        header('location: listaCategoria.php?status=error');
        exit;
    }

    // Consulta Vaga
    $obCategoria = Categoria::getCategoria($_GET['id']);

    // Validação da Vaga
    if(!$obCategoria instanceof Categoria) {
        header('location: listaCategoria.php?status=error');
        exit;
    }

    // Validação do Post
    if(isset($_POST['excluirCategoria'])) {

        $obCategoria->excluirCategoria();

        header('location: listaCategoria.php?status=success');
        exit;
    }

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/confirmarExclusaoCategoria.php';
    require __DIR__.'/includes/footer.php';
    
?> 