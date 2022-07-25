<div class="container" >
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
</section>