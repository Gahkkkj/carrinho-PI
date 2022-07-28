<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Gabriel - Login</title>

  <link href="css/bootstrap.css" rel="stylesheet">

  <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <link href="css/signin.css" rel="stylesheet">
  <script src="js/ie-emulation-modes-warning.js"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>

<body>

  <div class="container">
    <div class="box">
      <form class="form-signin" method="POST" action="valida.php">
        <h2 class="box-1 form-signin-heading">Login</h2>
        <label for="inputEMAIL" class="sr-only">EMAIL</label>
        <input type="EMAIL" name="EMAIL" id="inputEMAIL" class="form-control" placeholder="email" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="PINCODE" id="inputPassword" class="form-control" placeholder="senha" required>
        <button class="btn btn-lg btn-danger btn-block" type="submit">Acessar</button>
        <a href="cadastrar.php">Não é cadastrado ainda?Cadastre-se</a>
      </form>
    </div>
    <p class="text-center text-danger">
      <?php if (isset($_SESSION['loginErro'])) {
        echo $_SESSION['loginErro'];
        unset($_SESSION['loginErro']);
      } ?>
    </p>
    <p class="text-center text-success">
      <?php
      if (isset($_SESSION['logindeslogado'])) {
        echo $_SESSION['logindeslogado'];
        unset($_SESSION['logindeslogado']);
      }
      ?>
    </p>
  </div> <!-- /container -->
</body>

</html>