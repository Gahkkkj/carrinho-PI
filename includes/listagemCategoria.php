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

<?php
require __DIR__ . '../../vendor/autoload.php';

use \App\entity\Categoria;

$Categoria = Categoria::getCategoria();
$obCategoria = new Categoria;
// echo "<pre>"; print_r($vaga); echo "</pre>"; exit;
?>

<?php if ($mensagem != '') { ?>
    <section>
        <?php echo $mensagem; ?>
    </section>
<?php } ?>




<section>

    <nav class="navbar1 navbar-light bg-light">
        <span class="navbar-brand mb-0 h1"> <b> CATEGORIA </b> </span>
    </nav>

    <a href="cadastrarCategoria">
    <button class="btn btn-primary"><span class="spano"></span>Cadastrar</button>
    </a>

    <div class="container" style="padding: 0px;">

        <?php if (count($Categoria) == 0) { ?>
            <div class="alert alert-secondary mt-3"> Nenhuma categoria encontrada! </div>

        <?php } else { ?>

            <table class="table bg-dark text-light mt-3" style="text-align: center;">
                <thead>
                    <tr>

                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Ações</th>

                        <!-- Para editar e excluir -->
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($Categoria as $key => $value) { ?>
                        <tr>

                            <td style="border: 1px solid #dee2e6;"><?php echo $value->nome; ?></td>
                            <td style="border: 1px solid #dee2e6;"><?php echo $value->descricao; ?></td>
                         
                            <td style="border: 1px solid #dee2e6;">

                                <a href="./editarCategoria.php?id=<?php echo $value->id; ?>">
                                    <button type="button" class="btn btn-primary" syle>Editar</button>
                                </a>

                                <a href="./excluirCategoria.php?id=<?php echo $value->id; ?>">
                                    <button type="button" class="btn btn-dabger fas fa-trash-alt float-none" style="padding: 0.6vw 2vw 0.6vw 2vw;"></button>
                                </a>

                            </td>
                     
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        <?php } ?>

</section>