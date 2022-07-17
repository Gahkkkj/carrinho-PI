<section>
<<<<<<< Updated upstream
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
            <input class="form-control" type="number" required name="preco_produto" rows="5"><?php echo isset($obPedido->preco_produto) ? $obPedido->preco_produto : ''; ?>
        </div>
    
        <div class="form-group">
            <label> Descrição </label>
            <textarea class="form-control" type="number" required name="DESCRIPTION" rows="5"><?php echo isset($obPedido->DESCRIPTION) ? $obPedido->DESCRIPTION : ''; ?> </textarea>
=======
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
                <h2 class="mt-3"><?php echo TITLE; ?> </h2>
                <form method="POST" class="form-send">
                   

                    <div class="form-group">
                        <label> Produto nome </label>
                        <textarea class="form-control"type="text" required name="PRODUCT"><?php echo isset($obPedido->PRODUCT) ? $obPedido->PRODUCT : ''; ?> </textarea>
                    </div>

                    <div class="form-group">
                        <label> Preço produto </label>
                        <input class="form-control" type="number" required name="preco_produto"><?php echo isset($obPedido->preco_produto) ? $obPedido->preco_produto : ''; ?>
                    </div>

                    <div class="form-group">
                        <label> Descrição </label>
                        <textarea class="form-control" type="text" required name="DESCRIPTION"><?php echo isset($obPedido->DESCRIPTION) ? $obPedido->DESCRIPTION : ''; ?> </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"> Enviar </button>
                    </div>

                </form>
            </div>
>>>>>>> Stashed changes
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"> Enviar </button>
        </div>

    </form>
</section>