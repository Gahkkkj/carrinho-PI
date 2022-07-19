<?php 
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Noticia;
    
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

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/pedidos.php';
    require __DIR__.'/includes/footer.php';
    
  
?>