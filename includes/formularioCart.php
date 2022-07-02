<section>
    <a href="indexProdutos.php">
        <button class="btn btn-success"> Voltar </button>
    </a>

    <h2 class="mt-3"><?php echo TITLE; ?> </h2>

    <form method="POST" class="form-send">
 
        <div class="form-group">
            <label> Produto nome </label>
            <textarea class="form-control" required name="PRODUCT" rows="5"><?php echo isset($obPedido->PRODUCT) ? $obPedido->PRODUCT : ''; ?> </textarea>
        </div>

        <div class="form-group">
            <label> Preço produto </label>
            <textarea class="form-control" type="number" required name="preco_produto" rows="5"><?php echo isset($obPedido->preco_produto) ? $obPedido->preco_produto : ''; ?> </textarea>
        </div>
    
        <div class="form-group">
            <label> Descrição </label>
            <textarea class="form-control" type="number" required name="DESCRIPTION" rows="5"><?php echo isset($obPedido->DESCRIPTION) ? $obPedido->DESCRIPTION : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"> Enviar </button>
        </div>

    </form>
</section>