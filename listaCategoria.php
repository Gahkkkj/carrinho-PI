<?php 

    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Categoria;
    use \App\Entity\Carrinho;

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

    $listaCategoria = Carrinho::getCarrinho();
    $categorias = Categoria::getCategoria($busca); 

    include "./carrinho/config.php";

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

    // echo "<pre>"; print_r ($_GET['categoria']); echo "</pre>"; exit; 

    // use App\includes\listagemEmpresa;
    // //BUSCA
    // if(isset($busca = $_GET['busca']); 
    // echo "<pre>"; print_r ($busca); echo "</pre>"; exit; 


    require __DIR__.'/includes/header.php';

    require __DIR__.'/includes/listagemCategoria.php';   

    require __DIR__.'/includes/footer.php';
