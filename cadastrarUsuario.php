<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar registro!');

use App\entity\Usuario;

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
$obUsuario = new Usuario();

// echo "<pre>"; print_r($_POST); echo "<pre>"; exit;
if (isset($_POST['NAME'], $_POST['EMAIL'],  $_POST['CONTACT'], $_POST['ADDRESS'], $_POST['CITY'], $_POST['PINCODE'],$_POST['niveis_acesso_id'])) {
    $obUsuario->NAME = $_POST['NAME'];
    $obUsuario->EMAIL = $_POST['EMAIL'];
    $obUsuario->CONTACT = $_POST['CONTACT'];
    $obUsuario->ADDRESS = $_POST['ADDRESS'];
    $obUsuario->CITY = $_POST['CITY'];
    $obUsuario->PINCODE = $_POST['PINCODE'];
    $obUsuario->niveis_acesso_id = $_POST['niveis_acesso_id'];



// echo "<pre>"; print_r($obGrupo); echo "<pre>"; exit;


    $obUsuario->cadastrarUsuario();

    header('location: listaUsuario.php?status=success');
    // echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    exit;
}


require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/formularioUsuario.php';
require __DIR__ . '/includes/footer.php';
