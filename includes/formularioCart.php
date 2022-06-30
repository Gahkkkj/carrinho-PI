<section>
    <a href="indexProdutos.php">
        <button class="btn btn-success"> Voltar </button>
    </a>

    <h2 class="mt-3"><?php echo TITLE;?> </h2>

    <form method="POST" class="form-send">
        <div class="form-group">
            <label> Objeto id </label>
            <input type="text" required class="form-control" name="OID" value="<?php echo isset($obPedido->OID) ? $obPedido->OID : ''; ?>">
        </div>

        <div class="form-group">
            <label> Produto id </label>
            <textarea class="form-control" required name="PID" rows="5"><?php echo isset($obPedido->PID) ? $obPedido->PID : ''; ?> </textarea>
        </div>

        <div class="form-group">
            <label> Nome Produto </label>
            <input type="text" required class="form-control" name="PNAME" value="<?php echo isset($obPedido->PNAME) ? $obPedido->PNAME : ''; ?>">      
        </div>
        <div class="form-group">
            <label> Preço produto </label>
            <textarea class="form-control" type="number" required name="preco_produto" rows="5"><?php echo isset($obPedido->preco_produto) ? $obPedido->preco_produto : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <label> Quantidade </label>
            <textarea class="form-control" type="number" required name="QTY" rows="5"><?php echo isset($obPedido->QTY) ? $obPedido->QTY : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <label> Total </label>
            <textarea class="form-control" type="number" required name="TOTAL" rows="5"><?php echo isset($obPedido->TOTAL) ? $obPedido->TOTAL : ''; ?> </textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"> Enviar </button>
        </div>

    </form>
</section>