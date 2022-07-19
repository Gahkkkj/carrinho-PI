<?php
include "config.php";
session_start();

include "cart.class.php";
$cart = new Cart();

?>
<html>

<head>
	<title>Confirindo</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/main.css?date= . <?php echo time(); ?>">
</head>

<body>
	<?php include "navbar.php"; ?>
	<div class="container">
	<nav class="navbar1 navbar-light bg-light">
    <span class="navbar-brand mb-0 h1"> <b> PEDIDO CONCLUIDO </b> </span>
</nav>


			<div class='row'>
				<div class='col-md-12'>
					<div class='alert alert-success'>Seu pedido é #<?php echo $_GET["PEDIDO_NO"]; ?></div>
				</div>

			</div>
		</div>

	</div>

	</footer>
	<?php include "../includes/footer.php"; ?>
	</footer>
</body>

</html>