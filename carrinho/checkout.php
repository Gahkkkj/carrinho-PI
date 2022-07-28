<?php
require __DIR__ . '../../vendor/autoload.php';
use App\entity\Usuario;

include "config.php";


include "cart.class.php";
$cart = new Cart();

//Validação do POST
if (isset( $_POST['CONTACT'], $_POST['ADDRESS'], $_POST['CITY'])) {
  
	$contact = mysqli_real_escape_string($con, $_POST["CONTACT"]);
	$address = mysqli_real_escape_string($con, $_POST["ADDRESS"]);
	$city = mysqli_real_escape_string($con, $_POST["CITY"]);
   
    $obUsuario->atualizarEndereco();

    header('location: checkout.php?status=success');
    exit;
    
}

if (isset($_POST["submit"])) {



	#insert User Details
	$sql = "insert into Usuario (CONTACT,ADDRESS,CITY) values ('{$contact}','{$address}','{$city}')";
	if ($con->query($sql)) {
		$uid = $con->insert_id;

		#insert Order information
		$PEDIDO_NO = rand(10000, 100000);
		$total_amt = $cart->get_cart_total();
		$sql = "insert into orders (PEDIDO_NO,data_pedido,UID,TOTAL_AMT) values ('{$PEDIDO_NO}',NOW(),'{$uid}','{$total_amt}')";
		if ($con->query($sql)) {
			$oid = $con->insert_id;

			#insert Order Item Details
			$sql = "insert into detalhes_pedido (OID,PID,PNAME,preco_produto,QTY,TOTAL) values ";
			$rows = [];
			foreach ($cart->get_all_items() as $item) {
				$rows[] = "('{$oid}','{$item["id"]}','{$item["name"]}','{$item["preco_produto"]}','{$item["qty"]}','{$item["total"]}')";
			}
			$sql .= implode(",", $rows);
			if ($con->query($sql)) {
				$cart->destroy();
				header("location:complete.php?PEDIDO_NO={$PEDIDO_NO}");
			}
		}
	}
}
?>
<html>

<head>
	<title>checando</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<link rel="stylesheet" href="../assets/css/main.css?date= . <?php echo time(); ?>">
</head>

<body>

	<section>
		<?php include "navbar.php"; ?>
		<nav class="navbar1 navbar-light bg-light">
			<span class="navbar-brand mb-0 h1"> <b> CADASTRE-SE </b> </span>
		</nav>
		<div class='container mt-5'>


			<div class=' col-md-10 mx-auto'>
				<div class="box-formulario bg-dark">
					<a href="index.php">
						<button class="btn btn-success"> Voltar </button>
					</a>
					<span class="navbar-brand text-center d-flex"> <b>Informações adicionais</b> </span>
					<form method='post' action='<?php echo $_SERVER["REQUEST_URI"]; ?>' autocomplete="off">

						<div class='form-group'>
							<label>Numero</label>
							<input type='number' name='contact' class='form-control' required placeholder='Numero de Telefone'>
						</div>
						<div class='form-group'>
							<label>Endereço</label>
							<input type='text' name='address' class='form-control' required placeholder='Endereço'>

						</div>
						<div class='form-group'>
							<label>Cidade</label>
							<input type='text' name='city' class='form-control' required placeholder='Cidade'>
						</div>

						<input type='submit' name='submit' value='Enviar' class='btn btn-success'>
					</form>
				</div>
			</div>

	</section>
	</footer>
	<?php include "../includes/footer.php"; ?>
	</footer>

</body>

</html>