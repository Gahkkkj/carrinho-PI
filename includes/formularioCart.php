<section>
    <a href="indexGerente.php">
        <button class="btn btn-success"> Voltar </button>
    </a>



    <div class='container mt-5'>
        <div class='row'>
            <div class=' col-md-6 mx-auto'>

                <a href="indexProdutos.php">
                    <button class="btn btn-success"> Voltar </button>
                </a>

                <form method="POST" class="form-send">
                    <h2 class="mt-3"><?php echo TITLE; ?> </h2>
                    <div class="form-group">
                        <label> Produto nome </label>
                        <textarea class="form-control" required name="PRODUCT" rows="5"><?php echo isset($obPedido->PRODUCT) ? $obPedido->PRODUCT : ''; ?> </textarea>
                    </div>

                    <div class="form-group">
                        <label> Preço produto </label>
                        <input class="form-control" type="number" required name="preco_produto" rows="5"><?php echo isset($obPedido->preco_produto) ? $obPedido->preco_produto : ''; ?>
                    </div>

                    <div class="form-group">
                        <label> Descrição </label>
                        <textarea class="form-control" type="number" required name="DESCRIPTION" rows="5"><?php echo isset($obPedido->DESCRIPTION) ? $obPedido->DESCRIPTION : ''; ?> </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"> Enviar </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>