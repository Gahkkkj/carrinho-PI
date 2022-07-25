<?php 

    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Categoria;
    $Categoria = Categoria::getCategoria();

    require __DIR__.'/includes/header.php';

    require __DIR__.'/includes/listagemCategoria.php';   

    require __DIR__.'/includes/footer.php';
?>
