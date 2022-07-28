<?php
	session_start();

?>
<?php 
    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Categoria;
    use \App\Entity\Carrinho;  
    
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

    require __DIR__.'/includes/header.php';
   	require __DIR__.'/includes/home.php';
    require __DIR__.'/includes/footer.php';
