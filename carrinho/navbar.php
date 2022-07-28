<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/main.css?date= . <?php echo time(); ?>">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <title> Gabriel </title>

</head>

<body class="text-dark" style="background-color: #C7A4A4;">


  </div>
  <header>
    <div class="d-flex align-items-center bg-dark Padraofooter" style=" font-family: naruto; ">
      <?php
      echo "Usuario: " . $_SESSION['usuarioNome'];
      ?>
      <br>
    </div>
      <div class="d-flex justify-content-around align-items-center bg-dark Padraofooter" style=" font-family: naruto; ">
        <h1 class="row">
       
          <a class="navbar-brand btn btn-dark " style="color: orange;" href="../index.php">Menu</a>
          <a class="navbar-brand btn btn-dark " style="color: orange;" href="../login/sair.php">Sair</a>
        </h1>

        <h2 class="display-4" style="color: orange;"> MAXEL
          <p class="lead " style="color: orange;"> Busque do melhor! </p>
        </h2>
        <h3 class="row">
          <a class="nav-item nav-link btn btn-dark" style="color: orange;" href="index.php" role="button">Produtos</a>
          <a class="nav-item nav-link btn btn-dark" style="color: orange;" href="view_carrinho.php">Carrinho (<?php echo $cart->get_cart_count(); ?>)</a>
        </h3>
      </div>
    </div>

  </header>

  <div class="container">