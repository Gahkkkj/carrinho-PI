<?php
include "config.php";


include "cart.class.php";
$cart = new Cart();

if (isset($_POST["submit"])) {

	$name = mysqli_real_escape_string($con, $_POST["name"]);
	$email = mysqli_real_escape_string($con, $_POST["email"]);
	$contact = mysqli_real_escape_string($con, $_POST["contact"]);
	$address = mysqli_real_escape_string($con, $_POST["address"]);
	$city = mysqli_real_escape_string($con, $_POST["city"]);
	$pincode = mysqli_real_escape_string($con, $_POST["pincode"]);
	#insert User Details
	$sql = "insert into Usuario (NAME,EMAIL,CONTACT,ADDRESS,CITY,PINCODE) values ('{$name}','{$email}','{$contact}','{$address}','{$city}','{$pincode}')";
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
				<form method='post' action='<?php echo $_SERVER["REQUEST_URI"]; ?>' autocomplete="off">
					<div class='form-group'>
						<label>Nome</label>
						<input type='text' name='name' class='form-control' required placeholder='Usuario'>
					</div>
					<div class='form-group'>
						<label>Email</label>
						<input type='email' name='email' class='form-control' required placeholder='Email'>
					</div>
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
					<div class='form-group'>
						<label>Senha</label>
						<input type='text' name='pincode' class='form-control' required placeholder='Senha'>
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