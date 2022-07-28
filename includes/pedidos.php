<?php
require __DIR__ . '../../vendor/autoload.php';

use \App\entity\Pedido;

$Pedido = Pedido::getPedido();
$obPedido = new Pedido;
// echo "<pre>"; print_r($vaga); echo "</pre>"; exit;
?>

<?php
$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
            break;
        default:
            # code...
            break;
    }
}
?>

<?php if ($mensagem != '') { ?>
    <section>
        <?php echo $mensagem; ?>
    </section>
<?php } ?>

<nav class="navbar1 navbar-light bg-light">
    <span class="navbar-brand mb-0 h1"> <b> PEDIDOS! </b> </span>
</nav>

<section>

    <?php if (count($Pedido) == 0) { ?>
        <div class="alert alert-secondary mt-3"> Nenhum pedido encontrado! </div>

    <?php } else { ?>
        <div class="box-pedidos">
         <table class="table table-striped table-responsive-mb table-bordered table-hover table-dark mt-3" style="text-align: center;">
            <thead>
                <tr>
                    <th>Pedido</th>
                    <th>Preço Produto</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($Pedido as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value->PNAME; ?></td>
                        <td><?php echo $value->preco_produto; ?></td>
                        <td><?php echo $value->TOTAL; ?></td>
                        <td>
                            <a href="editarPedidos.php?ID=<?php echo $value->ID; ?>">
                                <button type="button" class="btn btn-primary">Editar</button>
                            </a>

                            <a href="excluirPedidos.php?ID=<?php echo $value->ID; ?>">
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                        </td>



                        
                    </tr>
                <?php } ?>
            </tbody>
            </table>
        <?php } ?>
        </div>
</section>