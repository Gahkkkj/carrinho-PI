<section>
    <a href="listaCategoria.php">
        <button class="btn btn-success"> Voltar </button>
    </a>
    <h2 class="mt-3"> Excluir Registro </h2>

    <form method="post">
        <div class="form-group">
            <p> Você deseja realmente excluir o registro? <strong><?php echo $obCategoria->nome; ?> </strong></p>
        </div>

        <div class="form-group">
            <a href="listaCategoria.php">
                <button type="button" class="btn btn-secondary"> Cancelar </button>
            </a>
            <button type="submit" name="excluir" class="btn btn-danger"> Excluir </button>
        </div>
    </form>
</section>