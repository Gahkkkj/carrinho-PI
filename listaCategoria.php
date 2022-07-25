<?php 
    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\categoria;
    use \App\Entity\Carrinho;     
      
    $fk_id_categoria = new Categoria;

    $listaCategoria = $fk_id_categoria::getCategoria();

    use App\entity\Carrinho;
    $Carrinho = Carrinho::getCarrinho();
    // echo "<pre>"; print_r($vaga); echo "</pre>"; exit;

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/banner.php';
    require __DIR__.'/includes/footer.php';
?>