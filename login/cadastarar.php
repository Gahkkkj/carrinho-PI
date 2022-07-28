<?php
require __DIR__ . '../../vendor/autoload.php';

define('TITLE', 'Cadastrar registro!');

use App\entity\Usuario;

$obUsuario = new Usuario();

// echo "<pre>"; print_r($_POST); echo "<pre>"; exit;
if (isset($_POST['NAME'], $_POST['EMAIL'],  $_POST['PINCODE'])) {
    $obUsuario->NAME = $_POST['NAME'];
    $obUsuario->EMAIL = $_POST['EMAIL'];

    $obUsuario->PINCODE = $_POST['PINCODE'];




// echo "<pre>"; print_r($obGrupo); echo "<pre>"; exit;


    $obUsuario->cadastrarUsuario();

    header('location: Login.php?status=success');
    // echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    exit;
}

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
        <h2 class="box-1 form-signin-heading">Cadastrar</h2>
        <form method="POST" class="form-send">

                        <div class="form-group">
               
                            <input type="text" required class="form-control" name="NAME"placeholder="Nome" value="<?php echo isset($obUsuario->NAME) ? $obUsuario->NAME : ''; ?>">
                        </div>
                        <div class="form-group">
                 
                            <input type="text" required class="form-control" name="EMAIL" placeholder="Email"value="<?php echo isset($obUsuario->EMAIL) ? $obUsuario->EMAIL : ''; ?>">
</div>
                        <div class="form-group">
              
                            <input type="text" required class="form-control" name="PINCODE"placeholder="Senha" value="<?php echo isset($obUsuario->PINCODE) ? $obUsuario->PINCODE : ''; ?>">
                        </div>
                        <div>
                        <button class="btn btn-lg btn-danger btn-block" type="submit">Acessar</button>
                    </div>
                    </form>
              
                 
                </div>

            </div>
        
        </div>

  </div> <!-- /container -->

  
</body>

</html>