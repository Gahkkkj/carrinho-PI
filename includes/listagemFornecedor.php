

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

use \App\entity\Fornecedor;

$Fornecedor = Fornecedor::getFornecedor();
$obFornecedor = new Fornecedor;
// echo "<pre>"; print_r($vaga); echo "</pre>"; exit;
?>

<?php if ($mensagem != '') { ?>
    <section>
        <?php echo $mensagem; ?>
    </section>
<?php } ?>


<section>

    <nav class="navbar1 navbar-light bg-light">
        <span class="navbar-brand mb-0 h1"> <b> FORNECEDOR </b> </span>
    </nav>

    <a href="cadastrarFornecedor">
    <button class="gerente-controle-2"><span class="spano"></span>Cadastrar</button>
    </a>

    <div class="container" style="padding: 0px;">

        <?php if (count($Fornecedor) == 0) { ?>
            <div class="alert alert-secondary mt-3"> Nenhum fornecedor encontrada! </div>

        <?php } else { ?>

            <table class="table bg-dark text-light mt-3" style="text-align: center;">
            <thead>
                    <tr>

                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Descrição</th>
                        <th>Num. Endereço</th>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Ordem</th>
                        <th>Status</th>
                        <th>Ações</th>

                        <!-- Para editar e excluir -->
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($Fornecedor as $key => $value) { ?>
                        <tr>

                            <td><?php echo $value->nome; ?></td>
                            <td><?php echo $value->cnpj; ?></td>
                            <td><?php echo $value->descricao; ?></td>
                            <td><?php echo $value->numero_end; ?></td>
                            <td><?php echo $value->rua_end; ?></td>
                            <td><?php echo $value->bairro_end; ?></td>
                            <td><?php echo $value->cidade_end; ?></td>
                            <td><?php echo $value->estado_end; ?></td>
                            <td><?php echo $value->ordem; ?></td>
                            <td><?php echo ($value->status == 's' ? 'Ativo' : 'Inativo'); ?></td>
                         
                            <td>

                            <a href="./editarFornecedor.php?id=<?php echo $value->id; ?>">
                                    <button type="button" class="btn btn-primary" syle>Editar</button>
                                </a>

                                <a href="./excluirFornecedor.php?id=<?php echo $value->id; ?>">
                                    <button type="button" class="btn btn-excluir fas fa-trash-alt float-none" style="padding: 0.6vw 2vw 0.6vw 2vw;"></button>
                                </a>

                            </td>
                     
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        <?php } ?>

</section>
