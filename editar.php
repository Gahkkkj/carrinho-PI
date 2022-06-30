<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar Produto');

use \App\Entity\Noticia;

//Validação do ID
if (!isset($_GET['id'])  || !is_numeric($_GET['id'])) {
    header('location: indexProdutos.php?status=error');
    exit;
}

//Consulta Vaga
$obNoticia = Noticia::getNoticias($_GET['id']);
// echo "<pre>"; print_r($obNoticia); echo "<pre>"; exit;

//Validação da Vaga
if (!$obNoticia instanceof Noticia) {
    header('location: indexProdutos.php?status=error');
    exit;
}
//Validação do POST
if (isset($_POST['nome'], $_POST['descricao'], $_POST['data_compra'], $_POST['nota_fiscal'], $_POST['preco'], $_POST['quantidade'])) {
    $obNoticia->nome = $_POST['nome'];
    $obNoticia->descricao = $_POST['descricao'];
    $obNoticia->data_compra = $_POST['data_compra'];
    $obNoticia->nota_fiscal = $_POST['nota_fiscal'];
    $obNoticia->preco = $_POST['preco'];
    $obNoticia->quantidade = $_POST['quantidade'];


    $obNoticia->atualizar();
    // echo "<pre>"; print_r($obNoticia); echo "</pre>"; exit; 

    header('location: indexProdutos.php?status=success');
    exit;
}

require __DIR__ . '/INCLUDES/header.php';

require __DIR__ . '/INCLUDES/formulario.php';

require __DIR__ . '/INCLUDES/footer.php';