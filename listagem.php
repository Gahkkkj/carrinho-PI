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
    require __DIR__.'/vendor/autoload.php';

    use \App\entity\Noticia;

    $Noticia = Noticia::getNoticia();
    $obNoticia = new Noticia;
    // echo "<pre>"; print_r($vaga); echo "</pre>"; exit;
?>

<?php if ($mensagem != '') { ?>
    <section>
        <?php echo $mensagem; ?>
    </section>
<?php } ?>

<nav class="navbar1 navbar-light bg-light">
      <span class="navbar-brand mb-0 h1"> <b> LOJA! </b> </span>
    </nav>

<section>
    <a href="cadastrar">
        <button class="btn btn-success"> Cadastrar </button>
    </a>
    <a href="cadastrarCart.php">
        <button class="btn btn-success"> Cadastrar cart </button>
    </a>

    <?php if (count($Noticia) == 0) { ?>
        <div class="alert alert-secondary mt-3"> Nenhum produto Encontrado </div>

    <?php } else { ?>

        <section class="mb-5" style="margin-top: 2%;">
            <form method="get">
                <div class="row">
                    <div class="col">

                        <select class="form-control" name="filtro" id="filtragem" value="">
                            <option value="all">Todos</option>
                            <?php foreach ($listaNoticia as $key => $value) { ?>
                                <option value="<?php echo $value->id; ?>" <?php echo $obNoticia->id == $value->id ? "selected" : ''; ?>> <?php echo $value->id; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </form>
        </section>

        <div class='card-deck row' style="margin-top: 5%">
            <?php foreach ($Noticia as $key => $value) { ?>
                <div class="col-12 col-xl-3 item item-selecionado-<?php echo $value->id; ?>">
                    <div class='card mb-4 botoes'>
                        <img src='assets/image/naruto.jpg' class="card-img-top">
                        <div class='card-body'>
                            <h5 class='card-title'><?php echo $value->titulo; ?></h5>
                            <p class='card-text'><?php echo $value->id; ?></p>
                            <p class='card-text'><?php echo $value->descricao; ?></p>
                            <p class='card-text'><?php echo $value->autor; ?></p>
                            <p class='card-text'><?php echo ($value->status == 's' ? 'Ativo' : 'Inativo'); ?></p>
                            <?php echo $value->data ?></td>
                            <div class="row mt-3">
                                <div class="col-12 col-lg-5">
                                    <a href="editar.php?id=<?php echo $value->id; ?>">
                                        <button type='button' class='btn btn-success botoes'>Editar</button>
                                    </a>
                                </div>

                                <div class="col-12 col-lg-5">

                                    <a href="excluir.php?id=<?php echo $value->id; ?>">
                                        <button type='button' class='btn btn-danger botoes'>Excluir</button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>


    <?php } ?>

</section>