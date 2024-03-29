<?php
include "config.php";
session_start();

include "cart.class.php";
$cart = new Cart();

if (isset($_POST["submit"])) {
	$item = [
		"id" => $_POST["pid"],
		"name" => $_POST["product"],
		"preco_produto" => $_POST["preco_produto"],
		"qty" => $_POST["qty"],
		"total" => ($_POST["qty"] * $_POST["preco_produto"]),
		"img" => $_POST["img"],
	];
	$cart->add_to_cart($item);
	header("location:view_carrinho.php");
}

$data = [];
$sql = "select * from produtos_carrinho where PID={$_GET["id"]}";
$res = $con->query($sql);
if ($res->num_rows > 0) {
	$data = $row = $res->fetch_assoc();
}
?>
<html>

<head>
	<title>Detalhes do produto</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/main.css?date= . <?php echo time(); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
	<?php include "navbar.php"; ?>
	<nav class="navbar1 navbar-light bg-light">
    <span class="navbar-brand mb-0 h1"> <b> DETALHES DO PRODUTO </b> </span>
</nav>
	<section>
		<div class='container mt-5'>
			<div class='row'>
				<div class='col-md-9 mx-auto'>
					<div class="box-detalhes bg-dark">
						<h2 class=' mb-4'>Detalhes do produto</h2>
						<hr>
						<div class='row mt-5'>
							<div class='col-md-4'>
								<img src="images/2.jpg<?php echo $data["IMAGE"]; ?>" class='img-thumbnail'>
							</div>
							<div class='col-md-8'>
								<h2><?php echo $data["PRODUCT"]; ?></h2>
								<p class="font-weight-bold">Preço R$ <?php echo $data["preco_produto"]; ?></p>
								<p><?php echo $data["DESCRIPTION"]; ?></p>

								<form method='post' action='<?php echo $_SERVER["REQUEST_URI"]; ?>'>
									<input type='hidden' name='pid' value='<?php echo $data["PID"]; ?>'>
									<input type='hidden' name='product' value='<?php echo $data["PRODUCT"]; ?>'>
									<input type='hidden' name='preco_produto' value='<?php echo $data["preco_produto"]; ?>'>
									<input type='hidden' name='img' value='<?php echo $data["IMAGE"]; ?>'>
									<p><input type='number' min='1' value='1' name='qty' required class='form-control col-md-5'></p>
									<input type='submit' name='submit' value='Adicionar ao Carrinho' class='btn btn-primary '>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			</section>
</footer>
<?php include "../includes/footer.php"; ?>
</footer>
</body>


</html>