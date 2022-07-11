<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Categoria!');

use App\entity\Categoria;
use App\entity\Empresa;
use App\entity\Grupo;

$Categoria = Categoria::getCategoria();

$obCategoria = new Categoria();

// echo "<pre>"; print_r($_POST); echo "<pre>"; exit;
if (isset($_POST['nome'], $_POST['fornecedor'], $_POST['estoque_id'], $_POST['descricao'], $_POST['numero_end'], $_POST['rua_end'], $_POST['bairro_end'], $_POST['cidade_end'], $_POST['estado_end'], $_POST['ordem'], $_POST['status'], $_POST['fk_id_grupo'])) {
    $obCategoria->nome = $_POST['nome'];
    $obCategoria->fornecedor = $_POST['fornecedor'];
    $obCategoria->estoque_id = $_POST['estoque_id'];

// echo "<pre>"; print_r($obCategoria); echo "<pre>"; exit;


    $obCategoria->cadastrarCategoria();

    header('location: listaCategoria$obCategoria.php?status=success');
    // echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    exit;
}


require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/formularioEmpresa.php';
require __DIR__ . '/includes/footer.php';
