<section class="mt-5">
    <div style="text-align:center;  margin-top: 20%;">

        <h2 class="mt-3"> Excluir fornecedor! </h2>

        <form method="post">
            <div class="form-group">
                <p> Você deseja realmente excluir o registro <strong><?php echo $obFornecedor->nome; ?>? </strong></p>
            </div>

            <div class="form-group">
                <a href="indexFornecedor.php">
                    <button type="button" class="btn btn-secondary"> Cancelar </button>
                </a>
                <button type="submit" name="excluirFornecedor" class="btn btn-danger"> Excluir </button>
            </div>
        </form>
</section>