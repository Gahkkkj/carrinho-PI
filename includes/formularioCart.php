<section>

    <head>
        <link rel="stylesheet" href="../assets/css/main.css?date= . <?php echo time(); ?>">
        <script scr="../assets/js/main.js"> </script>
    </head>
    <nav class="navbar1 navbar-light bg-light">
    <span class="navbar-brand mb-0 h1"> <b> CADASTRAR PRODUTO</b> </span>
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
                            <label> Nome </label>
                            <textarea class="form-control" type="text" required name="PRODUCT"><?php echo isset($obCarrinho->PRODUCT) ? $obCarrinho->PRODUCT : ''; ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label> Data de validade </label>
                            <input type="date" required class="form-control" name="data_compra" value="<?php echo isset($obCarrinho->data_compra) ? date('Y-m-d', strtotime($obCarrinho->data_compra)) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label> Preço </label>
                            <input type="number" required class="form-control" name="preco_produto" value="<?php echo isset($obFornecedor->preco_produto) ? $obFornecedor->preco_produto : ''; ?>">
                        </div>
                    
                        <div class="form-group">
                            <label> Descrição </label>
                            <textarea class="form-control" type="text" required name="DESCRIPTION"><?php echo isset($obCarrinho->DESCRIPTION) ? $obCarrinho->DESCRIPTION : ''; ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label> Quantidade </label>
                            <input type="number" required class="form-control" name="quantidade" value="<?php echo isset($obFornecedor->quantidade) ? $obFornecedor->quantidade : ''; ?>">
                        </div>
                   
                        <div class="form-group">
                            <label for="">Categoria</label>
                                <select class="form-control"  id="estiloSelect"name="fk_id_categoria">
                                    <option value="">Selecione uma categoria!</option>
                                        <?php foreach ($Categoria as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?> " <?php echo $obCarrinho->fk_id_categoria == $value->id ? 'selected' : ''; ?>> <?php echo $value->nome; ?> </option>
                                        <?php } ?>
                                </select>
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