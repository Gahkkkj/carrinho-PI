<!-- <div class="container" >
<section>
    <a href="listaCategoria">
        <button class="btn btn-light"> Voltar </button>
    </a>

    <h2 class="mt-3"><?php echo TITLE;?> </h2>
<br>
    <form method="POST" class="form-send">
        <div class="form-group">
            <label> Nome </label>
            <input type="text" id="estiloInput" required class="form-control" name="nome" value="<?php echo isset($obCategoria->nome) ? $obCategoria->nome : ''; ?>">
        </div>

        <div class="form-group">
            <label> Descrição </label>
            <textarea class="form-control" id="estiloInput" required name="descricao" rows="5"><?php echo isset($obCategoria->descricao) ? $obCategoria->descricao : ''; ?> </textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-light"> Enviar </button>
        </div>

    </form>
</section> -->

<section>

    <head>
        <link rel="stylesheet" href="../assets/css/main.css?date= . <?php echo time(); ?>">
        <script scr="../assets/js/main.js"> </script>
    </head>
    <nav class="navbar1 navbar-light bg-light">
    <span class="navbar-brand mb-0 h1"> <b> CADASTRAR CATEGORIA</b> </span>
</nav>
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
                            <textarea class="form-control" type="text" required name="nome"><?php echo isset($obCategoria->nome) ? $obCategoria->nome : ''; ?> </textarea>
                        </div>

                        <div class="form-group">
                            <label> Descrição </label>
                            <textarea class="form-control" type="text" required name="descricao"><?php echo isset($obCategoria->descricao) ? $obCategoria->descricao : ''; ?> </textarea>
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