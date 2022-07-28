<section>
<div style="text-align:center;  margin-top: 20%;"">

    <h2 class="mt-3"> EXCLUIR </h2>
    <form method="post">
        <div class="form-group">
            <p> Você deseja realmente excluir a categoria <strong><?php echo $obCategoria->nome; ?>?</strong></p>
        </div>

        <div class="form-group" style="margin-top: 5%; margin-bottom: 10%;">
            <a href="listaCategoria.php">
                <button type="button" class="btn btn-secondary"> Cancelar </button>
            </a>
            <button type="submit" name="excluir" class="btn btn-danger"> Excluir </button>
        </div>
    </form>
</div>
</section>

