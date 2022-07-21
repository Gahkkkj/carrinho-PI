<?php 
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Fornecedor;

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
    $obFornecedor = new Fornecedor;
    $Fornecedor = $obFornecedor::getFornecedor();

    $busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

    $filtroStatus = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);
    $filtroStatus = in_array($filtroStatus,['s','n']) ? $filtroStatus : '';

    $condicoes = [
        strlen($busca) ? 'nome LIKE "%' .str_replace(' ','%',$busca).'%"' : null,
        strlen($filtroStatus) ? 'status = "'.$filtroStatus.'"' : null 
    ];

    $condicoes = array_filter($condicoes);

    $where = implode(' AND ',$condicoes);

    $Fornecedor = Fornecedor::getFornecedor($where);
    // echo "<pre>"; print_r($vaga); echo "</pre>"; exit;

    require __DIR__.'/includes/header.php';
    require __DIR__.'/includes/gerente.php';
    require __DIR__.'/includes/footer.php';
    
 