<section class="mt-5">
    <a href="../indexUsuario.php">
        <button class="btn btn-success"> Voltar </button>
    </a>
    <h2 class="mt-3"> Excluir Registro </h2>

    <form method="post">
        <div class="form-group">
            <p> Você deseja realmente excluir o registro? <strong><?php echo $obUsuario->NAME; ?> </strong></p>
        </div>

        <div class="form-group">
            <a href="./indexUsuario.php">
                <button type="button" class="btn btn-secondary"> Cancelar </button>
            </a>
            <button type="submit" name="excluirUsuario" class="btn btn-danger"> Excluir </button>
        </div>
    </form>
</section>