<section>

    <head>
        <link rel="stylesheet" href="../assets/css/main.css?date= . <?php echo time(); ?>">
    </head>


    <div class='container mt-5'>
        <div class='row'>
            <div class=' col-md-12 mx-auto'>
                <div class="box-formulario bg-dark">
                    <a href="indexProdutos.php">
                        <button class="btn btn-success"> Voltar </button>
                    </a>
                    <form method="POST" class="form-send">
                        <div class="form-group">
                            <label> Nome </label>
                            <input type="text" required class="form-control" name="nome" value="<?php echo isset($obNoticia->nome) ? $obNoticia->nome : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label> Data Compra </label>
                            <input type="date" required class="form-control" name="data_compra" value="<?php echo isset($obNoticia->data_compra) ? date('Y-m-d', strtotime($obNoticia->data_compra)) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label> Nota Fiscal </label>
                            <textarea class="form-control" type="number" required name="nota_fiscal" rows="5"><?php echo isset($obNoticia->nota_fiscal) ? $obNoticia->nota_fiscal : ''; ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label> Preço </label>
                            <textarea class="form-control" type="number" required name="preco" rows="5"><?php echo isset($obNoticia->preco) ? $obNoticia->preco : ''; ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label> Quantidade </label>
                            <textarea class="form-control" type="number" required name="quantidade" rows="5"><?php echo isset($obNoticia->quantidade) ? $obNoticia->quantidade : ''; ?> </textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"> Enviar </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>