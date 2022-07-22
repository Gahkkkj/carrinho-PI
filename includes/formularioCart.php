<section>

    <head>
        <link rel="stylesheet" href="../assets/css/main.css?date= . <?php echo time(); ?>">
        <script scr="../assets/js/main.js"> </script>
    </head>
    <nav class="navbar1 navbar-light bg-light">
    <span class="navbar-brand mb-0 h1"> <b> CADASTRAR CARRINHO</b> </span>
</nav>
    <div class='container mt-5'>
        <div class='row'>
            <div class=' col-md-12 mx-auto'>
                <div class="box-formulario bg-dark">
                    <a href="indexgerente.php">
                        <button class="btn btn-success"> Voltar </button>
                    </a>
                    <h2 class="mt-3"><?php echo TITLE; ?> </h2>
                    <form method="POST" class="form-send">


                        <div class="form-group">
                            <label> Produto nome </label>
                            <textarea class="form-control" type="text" required name="PRODUCT"><?php echo isset($obCarrinho->PRODUCT) ? $obCarrinho->PRODUCT : ''; ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label> Data Compra </label>
                            <input type="date" required class="form-control" name="data_compra" value="<?php echo isset($obCarrinho->data_compra) ? date('Y-m-d', strtotime($obCarrinho->data_compra)) : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label> Preço produto </label>
                            <input class="form-control" type="number" required name="preco_produto"><?php echo isset($obCarrinho->preco_produto) ? $obCarrinho->preco_produto : ''; ?>
                        </div>

                        <div class="form-group">
                            <label> Descrição </label>
                            <textarea class="form-control" type="text" required name="DESCRIPTION"><?php echo isset($obCarrinho->DESCRIPTION) ? $obCarrinho->DESCRIPTION : ''; ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label> Quantidade </label>
                            <input class="form-control" type="number" required name="quantidade"><?php echo isset($obCarrinho->quantidade) ? $obCarrinho->quantidade : ''; ?> 
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