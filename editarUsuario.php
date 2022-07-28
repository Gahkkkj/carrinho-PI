<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar usuário!');

use App\entity\Usuario;
include "./carrinho/config.php";
session_start();

include_once "./carrinho/cart.class.php";
$cart = new Cart();



//Validação do ID
if (!isset($_GET['UID'])  || !is_numeric($_GET['UID'])) {
    header('location: indexUsuario.php?status=error');
    exit;
}

//Consulta Vaga
$obUsuario = Usuario::getUsuarios($_GET['UID']);

//Validação da Vaga
if (!$obUsuario instanceof Usuario) {
    header('location: indexUsuario.php?status=error');
    exit;
}

//Validação do POST
if (isset($_POST['NAME'], $_POST['EMAIL'],  $_POST['CONTACT'], $_POST['ADDRESS'], $_POST['CITY'], $_POST['PINCODE'])) {
    $obUsuario->NAME = $_POST['NAME'];
    $obUsuario->EMAIL = $_POST['EMAIL'];
    $obUsuario->CONTACT = $_POST['CONTACT'];
    $obUsuario->ADDRESS = $_POST['ADDRESS'];
    $obUsuario->CITY = $_POST['CITY'];
    $obUsuario->PINCODE = $_POST['PINCODE'];
   
    
    
    $obUsuario->atualizarUsuario();

    header('location: indexUsuario.php?status=success');
    exit;
    
}

require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/includes/formularioUsuario.php';

require __DIR__ . '/INCLUDES/footer.php';