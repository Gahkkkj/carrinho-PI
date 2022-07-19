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

    <?php if(count($Categoria) == 0) { ?>
    <div class="alert alert-secondary mt-3"> Nenhuma Categoria Encontrado </div>

    <?php } else { ?>

        <table class="table bg-light mt-3" style="text-align: center;">
        <thead>
            <tr>
                <th>Pedido</th>
                <th>Preço</th>
                <th>Total</th>
            </tr>
        </thead>
 
        <tbody>
            <?php foreach ($Categoria as $key => $value) { ?>
                <tr>
                    <td><?php echo $value->nome; ?></td>
                    <td><?php echo $value->forncedor; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php } ?>

</section>