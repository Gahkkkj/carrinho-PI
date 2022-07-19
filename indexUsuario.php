<?php

require __DIR__ . '/vendor/autoload.php';

use App\entity\Usuario;

$grupos = Usuario::getUsuario();


include_once "./carrinho/config.php";



include_once "./carrinho/cart.class.php";
$cart = new Cart();

$data = [];
$sql = "select * from produtos_carrinho";
$res = $con->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $data[] = $row;
    }
}

require __DIR__ . '/includes/header.php';

require __DIR__ . '/includes/usuarios.php';

require __DIR__ . '/includes/footer.php';
