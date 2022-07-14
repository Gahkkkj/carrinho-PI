<section class="mt-5">
    <a href="./pedidoindex.php">
        <button class="btn btn-success"> Voltar </button>
    </a>
    <h2 class="mt-3"> Excluir Pedidos </h2>

    <form method="post">
        <div class="form-group">
            <p> Você deseja realmente excluir o Pedidos? <strong><?php echo $obPedido->PNAME; ?> </strong></p>
        </div>

        <div class="form-group">
            <a href="./pedidoindex.php">
                <button type="button" class="btn btn-secondary"> Cancelar </button>
            </a>
            <button type="submit" name="excluirPedido" class="btn btn-danger"> Excluir </button>
        </div>
    </form>
</section>