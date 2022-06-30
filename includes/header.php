<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css?date= . <?php echo time();?>">

  <title> FREITASXANDREI </title>

</head>

<body class="text-dark" style="background-color: #C7A4A4;">

  <header>
    <div class="d-flex justify-content-around align-items-center bg-dark andreifooter">
      <a class="navbar-brand btn btn-dark " style="color: orange;" href="index.php">Menu</a>
       <h1 class="display-4" style="color: orange;"> MAXEL
        <p class="lead " style="color: orange;"> Busque do melhor! </p>
      </h1>
      <h2 class="row">
         <a class="nav-item nav-link btn btn-dark" style="color: orange;" href="./carrinho/index.php" role="button">Produtos</a>
        <a class="nav-item nav-link btn btn-dark" style="color: orange;" href="./carrinho/view_carrinho.php">Carrinho (<?php echo $cart->get_cart_count(); ?>)</a>
      </h2>
    </div>
    </div>

  </header>

    <div class="container"> 