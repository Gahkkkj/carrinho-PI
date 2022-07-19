<?php 
    require __DIR__.'/vendor/autoload.php';

use \App\entity\Pedido;

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
    if(!isset($_GET['ID']) || !is_numeric($_GET['ID'])) {
        header('location: pedidoindex.php?status=error');
        exit;
    }

    // Consulta Vaga
    $obPedido = Pedido::getPedidos($_GET['ID']);

    // Validação da Vaga
    if(!$obPedido instanceof Pedido) {
        header('location:pedidoindex.php?status=error');
        exit;
    }

    // Validação do Post
    if(isset($_POST['excluirPedido'])) {

        $obPedido->excluirPedido();

        header('location: pedidoindex.php?status=success');
        exit;
    }

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/confirmarExclusaoPedido.php';
    require __DIR__.'/includes/footer.php';
    
?> 