<section>
<div style="text-align:center;">

    <a href="indexProdutos.php">
        <button class="btn btn-success" style="margin-top: 8%; margin-bottom: 5%;"> Voltar </button>
    </a>
    <h2 class="mt-3"> EXCLUIR </h2>
    <form method="post">
        <div class="form-group">
            <p> Você deseja realmente excluir a noticia <strong><?php echo $obNoticia->nome; ?> </strong></p>
        </div>

        <div class="form-group" style="margin-top: 5%; margin-bottom: 10%;">
            <a href="indexProdutos.php">
                <button type="button" class="btn btn-secondary"> Cancelar </button>
            </a>
            <button type="submit" name="excluir" class="btn btn-danger"> Excluir </button>
        </div>
    </form>
</div>
</section>