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

<header>
    

</header>

 <div class="container">

<section>
    
    <a href="cadastrarCategoria">
    <button type="botao_comeco"><span class="spano"></span>Cadastrar</button>
    </a>

</h5>
    <?php if(count($Categoria) == 0) {?>
        <div class="alert alert-secondary mt-3">Nenhuma Categoria encontrada</div>
    <?php } else {?>
        <table class="table bg-dark text-light mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($Categoria as $key => $value) { ?>
                <tr>
                <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->nome; ?></td>
                    <td><?php echo $value->descricao; ?></td>
                    <td>
                    <a class="neon-bt2" href="editarCategoria.php?id=<?php echo $value->id; ?>">

                            <span></span>

                            <span></span>

                            <span></span>

                            <span></span>

                            Editar

                            </a>

                        <a class="neon-bt" href="excluirCategoria.php?id=<?php echo $value->id; ?>">

                            <span></span>

                            <span></span>

                            <span></span>

                            <span></span>

                            Excluir

                            </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php }?>
  </div>

</section>

