<?php 
    require __DIR__.'../../vendor/autoload.php';

    use \App\entity\Usuario;

    $Usuario = Usuario::getUsuario();
    $obUsuario = new Usuario;
    // echo "<pre>"; print_r($vaga); echo "</pre>"; exit;
?>

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

    <?php if(count($Usuario) == 0) { ?>
    <div class="alert alert-secondary mt-3"> Nenhum Usuario Encontrado </div>

    <?php } else { ?>

        <table class="table bg-light mt-3" style="text-align: center;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Email</th>
            </tr>
        </thead>
 
        <tbody>
            <?php foreach ($Usuario as $key => $value) { ?>
                <tr>
                    <td><?php echo $value->NAME; ?></td>
                    <td><?php echo $value->ADDRESS; ?></td>
                    <td><?php echo $value->EMAIL; ?></td>
                    <td>
                                <a href="editarUsuario.php?UID=<?php echo $value->UID; ?>">
                                    <button type="button" class="btn btn-primary">Editar</button>
                                </a>

                                <a href="excluirUsuario.php?UID=<?php echo $value->UID; ?>">
                                    <button type="button" class="btn btn-danger">Excluir</button>
                                </a>
                            </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php } ?>

</section>