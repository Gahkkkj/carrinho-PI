<section>
<head>
        <link rel="stylesheet" href="../assets/css/main.css?date= . <?php echo time(); ?>">
    </head>
    <div class='container mt-5'>
        <div class='row'>
            <div class=' col-md-12 mx-auto'>
                <div class="box-formulario bg-dark">
                    <a href="indexGerente.php">
                        <button class="btn btn-success"> Voltar </button>
                    </a>

                    <h2 class="mt-3"><?php echo TITLE; ?> </h2>

                    <form method="POST" class="form-send">
                        <div class="form-group">
                            <label> Nome </label>
                            <input type="text" required class="form-control" name="nome" value="<?php echo isset($obFornecedor->nome) ? $obFornecedor->nome : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label> Cnpj </label>
                            <input type="number" required class="form-control" name="cnpj" value="<?php echo isset($obFornecedor->cnpj) ? $obFornecedor->cnpj : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label> Descrição </label>
                            <input type="text" required class="form-control" name="descricao" value="<?php echo isset($obFornecedor->descricao) ? $obFornecedor->descricao : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label> Numero de endereço </label>
                            <input type="number" required class="form-control" name="numero_end" value="<?php echo isset($obFornecedor->numero_end) ? $obFornecedor->numero_end : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label> Rua </label>
                            <input type="text" required class="form-control" name="rua_end" value="<?php echo isset($obFornecedor->rua_end) ? $obFornecedor->rua_end : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label> Bairro </label>
                            <input type="text" required class="form-control" name="bairro_end" value="<?php echo isset($obFornecedor->bairro_end) ? $obFornecedor->bairro_end : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label> Cidade </label>
                            <input type="text" required class="form-control" name="cidade_end" value="<?php echo isset($obFornecedor->cidade_end) ? $obFornecedor->cidade_end : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label> Estado </label>
                            <input type="text" required class="form-control" name="estado_end" value="<?php echo isset($obFornecedor->estado_end) ? $obFornecedor->estado_end : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label> Ordem </label>
                            <input type="number" required class="form-control" name="ordem" value="<?php echo isset($obFornecedor->ordem) ? $obFornecedor->ordem : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label> Status </label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <label>
                                        <input type="radio" required name="status" value="s" <?php echo isset($obFornecedor->status) && $obFornecedor->status == 's' ? 'checked' : ''; ?>> Ativo </input>
                                    </label>

                                    <label class="ml-3">
                                        <input type="radio" required name="status" value="n" <?php echo isset($obFornecedor->status) && $obFornecedor->status == 'n' ? 'checked' : ''; ?>> Inativo </input>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success"> Enviar </button>
                        </div>

                    </form>
</section>