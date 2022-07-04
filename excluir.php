<?php 
    require __DIR__.'/vendor/autoload.php';
    use \App\entity\Carrinho;
    
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
    // ValIDação do ID
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('location: indexProdutos.php?status=error');
        exit;
    }
  
    // Consulta Vaga
    $obCarrinho = Carrinho::getCarrinhos($_GET['id']);

    // ValIDação da Vaga
    if(!$obCarrinho instanceof Carrinho) {
        header('location:  ./carrinho/index.php?status=error');
        exit;
    }

    // ValIDação do Post
    if(isset($_POST['excluirCarrinhos'])) {

        $obCarrinho->excluirCarrinhos();

        header('location:  ./carrinho/index.php?status=success');
        exit;
    }

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/confirmarExclusao.php';
    require __DIR__.'/includes/footer.php';
    
?>