<section>
    <a href="indexUsuario.php">
        <button class="btn btn-success"> Voltar </button>
    </a>

    <h2 class="mt-3"><?php echo TITLE;?> </h2>

    <form method="POST" class="form-send">
        <div class="form-group">
            <label> Nome </label>
            <input type="text" required class="form-control" name="NAME" value="<?php echo isset($obUsuario->NAME) ? $obUsuario->NAME : ''; ?>">
        </div>
        <div class="form-group">
            <label> EMAIL </label>
            <input type="text" required class="form-control" name="EMAIL" value="<?php echo isset($obUsuario->EMAIL) ? $obUsuario->EMAIL : ''; ?>">
        </div>

        <div class="form-group">
            <label> Numero </label>
            <input type="number" required class="form-control" name="CONTACT" value="<?php echo isset($obUsuario->CONTACT) ? $obUsuario->CONTACT : ''; ?>">
        </div>
        <div class="form-group">
            <label> Endereço </label>
            <input type="text" required class="form-control" name="ADDRESS" value="<?php echo isset($obUsuario->ADDRESS) ? $obUsuario->ADDRESS : ''; ?>">
        </div>
        <div class="form-group">
            <label> Cidade</label>
            <input type="text" required class="form-control" name="CITY" value="<?php echo isset($obUsuario->CITY) ? $obUsuario->CITY : ''; ?>">
        </div>
        <div class="form-group">
            <label> Senha </label>
            <input type="text" required class="form-control" name="PINCODE" value="<?php echo isset($obUsuario->PINCODE) ? $obUsuario->PINCODE : ''; ?>">
        </div>
  
            </div>
        </div>
     
        <div class="funciona">
            <button type="submit" class="btn btn-success"> Enviar </button>
        </div>


    </form>

</section>