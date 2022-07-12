<?php 
    require __DIR__.'/vendor/autoload.php';

use \App\entity\Usuario;

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
    if(!isset($_GET['UID']) || !is_numeric($_GET['UID'])) {
        header('location: /listaUsuario.php?status=error');
        exit;
    }

    // Consulta Vaga
    $obUsuario = Usuario::getUsuarios($_GET['UID']);

    // Validação da Vaga
    if(!$obUsuario instanceof Usuario) {
        header('location: /listaUsuario.php?status=error');
        exit;
    }

    // Validação do Post
    if(isset($_POST['excluirUsuario'])) {

        $obUsuario->excluirUsuario();

        header('location: ./listaUsuario.php?status=success');
        exit;
    }

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/formularioUsuario.php';
    require __DIR__.'/includes/footer.php';
    
?> 