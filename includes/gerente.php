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
    <span class="navbar-brand mb-0 h1"> <b> GERENTE </b> </span>
</nav>


<div class="gerente-controle ">

    <a href="cadastrarCart.php">
        <button class="btn btn-success"> Cadastrar Produto </button>
    </a>

    <a href="listaCategoria.php">
        <button class="btn btn-success"> Ver Categorias </button>
    </a>
    <a href="indexFornecedor.php">
        <button class="btn btn-success"> Ver Fornecedores </button>
    </a>
    <a href="pedidoindex.php">
        <button type="button" class="btn btn btn-success">Ver Pedidos </button>
    </a>

    <a href="indexUsuario.php">
        <button class="btn btn-success"> Usuários </button>
    </a>
</div>

<div class="container">
    <div class='row'>
        <?php foreach ($data as $row) : ?>
            <div class='col-md-3 mt-2'>
                <div class="card bg-dark text-light" style="margin-top: 15%;">
                    <img class="card-img-top" src="./carrinho/images/2.jpg<?php echo $row["IMAGE"]; ?>">
                    <div class="card-body" style="text-align: center;">
                        <h5 class="card-title"><?php echo $row["PRODUCT"]; ?></h5>
                        <p class="card-text">
                            Preço R$ <?php echo $row["preco_produto"]; ?>
                        </p>
                        <div class="mb-3">

                            <a href="./carrinho/view_details.php?id=<?php echo $row["PID"]; ?>">
                                <button type='button' class='btn btn-primary float-right' style="width: 47%">Carrinho</button>

                            </a>

                            <a href="./editar.php?id=<?php echo $row["PID"]; ?>">
                                <button type='button' class='btn btn-primary float-left' style="width: 45%">Editar</button>
                            </a>
                        </div>
<br>
<br>
                        <a href="./excluir.php?id=<?php echo $row["PID"]; ?>">
                            <button type='button' class='btn btn-excluir fas fa-trash-alt float-none' style="padding: 0.75rem 6rem; text-align: center;"></button>
                        </a>
                        <div style="margin-top: 5%; height: 10%;">
                            <a href="https://wa.me/5551995665319" style="margin-top: 25px;">
                                <button type="button" class="btn btn-success" style="padding: 0.6rem 5.9rem; text-align: center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                    </svg>

                                </button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>