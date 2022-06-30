<?php
require __DIR__ . '/vendor/autoload.php';

use \App\entity\Noticia;


include "./carrinho/config.php";
session_start();

include "./App/entity/cart.php";
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

require __DIR__ . '/carrinho/cart.class.php';

require __DIR__ . '/carrinho/indexCart.php';

require __DIR__ . '/includes/footer.php';
