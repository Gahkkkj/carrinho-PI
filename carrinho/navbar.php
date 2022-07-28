<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/main.css?date= . <?php echo time(); ?>">

  <title> Gabriel </title>

</head>

<body class="text-dark" style="background-color: #C7A4A4;">

  <header>
    <div class="d-flex justify-content-around align-items-center bg-dark footerPadrao" style=" font-family: naruto; ">
      <a class="navbar-brand btn btn-dark " style="color: orange;" href="../index.php">Menu</a>
       <h1 class="display-4" style="color: orange; margin-left: 3%;"> MAXEL
        <p class="lead " style="color: orange; margin-left: 6%;"> Busque do melhor! </p>
      </h1>
      <h2 class="row">
         <a class="nav-item nav-link btn btn-dark" style="color: orange;" href="index.php" role="button">Produtos</a>
        <a class="nav-item nav-link btn btn-dark" style="color: orange;" href="view_carrinho.php">Carrinho (<?php echo $cart->get_cart_count(); ?>)</a>
      </h2>
    </div>
    </div>

  </header>

  <div class="container"> 