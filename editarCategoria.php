<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar registro!');

use App\entity\Categoria;

//Validação do ID
if (!isset($_GET['id'])  || !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

//Consulta Categoria
$obCategoria = Categoria::getCategorias($_GET['id']);

//Validação da Categoria
if (!$obCategoria instanceof Categoria) {
    header('location: index.php?status=error');
    exit;
}

//Validação do POST
if (isset($_POST['nome'], $_POST['descricao'])) {
    $obCategoria->nome = $_POST['nome'];
    $obCategoria->descricao = $_POST['descricao'];

    $obCategoria->atualizar();
    // echo "<pre>"; print_r($obCategoria); echo "</pre>"; exit; 

    header('location: listaCategoria.php?status=success');
    exit;
    
}

require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/INCLUDES/formularioCategoria.php';

require __DIR__ . '/INCLUDES/footer.php';

