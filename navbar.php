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

  <header class="jumbotron bg-dark andreifooter" style="text-align: center;">
    <h1 class="display-4" style="color: orange;"> MAXEL </h1>
    <p class="lead " style="color: orange;"> Busque do melhor! </p>
  </header>

  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-info ">
      <div class='container'>
        <a class="navbar-brand" href="index.php">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="index.php">Produtos</a>
            <a class="nav-item nav-link" href="view_carrinho.php">Carrinho (<?php echo $cart->get_cart_count(); ?>)</a>
          </div>
        </div>
      </div>
    </nav>