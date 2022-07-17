<section class="formulario">
    <div class='container mt-5'>
        <div class='row'>
            <div class=' col-md-6 mx-auto'>
                <a href="pedidoindex.php">
                    <button class="btn btn-success"> Voltar </button>
                </a>

                <h2 class="mt-3"><?php echo TITLE; ?> </h2>

                <form method="POST" class="form-send">

                    <div class="form-group">
                        <label> OID </label>
                        <input type="text" required class="form-control" name="OID" value="<?php echo isset($obPedido->OID) ? $obPedido->OID : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label> PID </label>
                        <input type="text" required class="form-control" name="PID" value="<?php echo isset($obPedido->PID) ? $obPedido->PID : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label> Produto </label>
                        <input type="number" required class="form-control" name="PNAME" value="<?php echo isset($obPedido->PNAME) ? $obPedido->PNAME : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label> Preço </label>
                        <input type="text" required class="form-control" name="preco_produto" value="<?php echo isset($obPedido->preco_produto) ? $obPedido->preco_produto : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label> Quantidade</label>
                        <input type="text" required class="form-control" name="QTY" value="<?php echo isset($obPedido->QTY) ? $obPedido->QTY : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label> Total </label>
                        <input type="text" required class="form-control" name="TOTAL" value="<?php echo isset($obPedido->TOTAL) ? $obPedido->TOTAL : ''; ?>">
                    </div>




                    <div>
                        <button type="submit" class="btn btn-success"> Enviar </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>