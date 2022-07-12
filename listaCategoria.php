<?php 

    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Categoria;

    $busca = '';

    if(isset( $_GET['categoria']) || isset( $_GET['busca'])) {
        if(isset( $_GET['categoria']) && $_GET['categoria'] != 0) {
            $busca = 'fk_id_categoria = ' . $_GET['categoria'];

            if(!empty($_GET['busca']) && count($_GET) > 1) {
                $busca .= ' AND ';
            }
        }

        if(!empty($_GET['busca'])) {
            $busca .= 'cnpj = ' . $_GET['busca'];
        }

        // echo $busca;
    }

    $listaCategoria = Carrinho::getCategoria();
    $categorias = Categoria::getCategoria($busca); 

    // echo "<pre>"; print_r ($_GET['categoria']); echo "</pre>"; exit; 

    // use App\includes\listagemEmpresa;
    // //BUSCA
    // if(isset($busca = $_GET['busca']); 
    // echo "<pre>"; print_r ($busca); echo "</pre>"; exit; 


    require __DIR__.'/includes/header.php';

    require __DIR__.'/includes/listagemEmpresa.php';   

    require __DIR__.'/includes/footer.php';
