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
    <span class="navbar-brand mb-0 h1"> <b> LOJA! </b> </span>
</nav>

<section>
    <a href="cadastrar">
        <button class="btn btn-success"> Cadastrar </button>
    </a>

    <?php if (count($Noticia) == 0) { ?>
        <div class="alert alert-secondary mt-3"> Nenhuma Vaga Encontrada </div>

    <?php } else { ?>

        <form method="get">

            <div class="row my-4">


                <div class="col">

                    <input type="text" placeholder="Buscar por nome!" name="busca" class="form-control" value="<?= $busca ?>">

                </div>

                <div class="col d-flex align-itens-end">

                    <button type="submit" class="btn btn-primary"> Filtrar </button>

                </div>

            </div>

        </form>


        <div class='card-deck row' style="margin-top: 5%">
            <?php foreach ($Noticia as $key => $value) { ?>
                <div class="col-12 col-xl-3 item item-selecionado-<?php echo $value->id; ?>">
                    <div class='card mb-4 botoes'>
                        <img src='assets/image/adoleta.webp' class="card-img-top">
                        <div class='card-body' style="text-align: center;">
                            <h5 class='card-title'><?php echo $value->nome; ?></h5>
                            <p class='card-text'><?php echo $value->descricao; ?></p>
                            <p class='card-text'><?php echo $value->preco; ?></p>
                            <div class="row mt-3" style="margin-right: 0px">
                                <div class="col-6">
                                    <a href="editar.php?id=<?php echo $value->id; ?>">
                                        <button type='button' class='btn btn-success botoes' style="padding: 0.375rem 1.1rem; text-align: center;">Editar</button>
                                    </a>
                                </div>

                                <div class="col-5">

                                    <a href="excluir.php?id=<?php echo $value->id; ?>">
                                        <button type='button' class='btn btn-danger botoes' style="padding: 0.375rem 1.1rem; text-align: center;">Excluir</button>
                                    </a>
                                </div>

                            </div>
                            <div style="text-align: center; margin-top: 7%;">

                                <a href="https://wa.me/5551995665319">
                                    <button type="button" class="btn btn-success" style="padding: 0.375rem 5rem; text-align: center;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                        </svg>

                                    </button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    <?php } ?>

</section>