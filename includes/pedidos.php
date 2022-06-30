<?php
    $mensagem = '';
    if(isset($_GET['status'])) {
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

<?php if($mensagem != '') { ?>
<section>
    <?php echo $mensagem; ?>
</section>
<?php } ?>

<section>

    <?php if(count($Pedido) == 0) { ?>
    <div class="alert alert-secondary mt-3"> Nenhum Pedido Encontrado </div>

    <?php } else { ?>

        <table class="table bg-light mt-3">
        <thead>
            <tr>
                <th>Pedido</th>
                <th>Preço</th>
                <th>Total</th>
            </tr>
        </thead>
 
        <tbody>
            <?php foreach ($Pedido as $key => $value) { ?>
                <tr>
                    <td><?php echo $value->PNAME; ?></td>
                    <td><?php echo $value->preco_produto; ?></td>
                    <td><?php echo $value->TOTAL; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php } ?>

</section>