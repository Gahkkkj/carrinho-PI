<section>
<head>
        <link rel="stylesheet" href="../assets/css/main.css?date= . <?php echo time(); ?>">
    </head>
    <div class='container mt-5'>
        <div class='row'>
            <div class=' col-md-12 mx-auto'>
                <div class="box-formulario bg-dark">
                    <a href="listaCategoria.php">
                        <button class="btn btn-success"> Voltar </button>
                    </a>

                    <h2 class="mt-3"><?php echo TITLE; ?> </h2>

                    <form method="POST" class="form-send">
                        <div class="form-group">
                            <label> Nome </label>
                            <input type="text" required class="form-control" name="nome" value="<?php echo isset($obCa$obCategoria->nome) ?$obCategoria->nome : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label> Descrição </label>
                            <input type="text" required class="form-control" name="descricao" value="<?php echo isset($obCa$obCategoria->descricao) ?$obCategoria->descricao : ''; ?>">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success"> Enviar </button>
                        </div>

                    </form>
</section>