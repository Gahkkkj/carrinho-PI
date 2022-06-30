<?php 
	include "config.php";
	session_start();
	
	include "cart.class.php";
	$cart=new Cart();
	
	if(isset($_POST["submit"])){
		
		$name=mysqli_real_escape_string($con,$_POST["name"]);
		$email=mysqli_real_escape_string($con,$_POST["email"]);
		$contact=mysqli_real_escape_string($con,$_POST["contact"]);
		$address=mysqli_real_escape_string($con,$_POST["address"]);
		$city=mysqli_real_escape_string($con,$_POST["city"]);
		$pincode=mysqli_real_escape_string($con,$_POST["pincode"]);
		#insert User Details
		$sql="insert into users (NAME,EMAIL,CONTACT,ADDRESS,CITY,PINCODE) values ('{$name}','{$email}','{$contact}','{$address}','{$city}','{$pincode}')";
		if($con->query($sql)){
			$uid=$con->insert_id;

			#insert Order information
			$PEDIDO_NO=rand(10000,100000);
			$total_amt=$cart->get_cart_total();
			$sql="insert into orders (PEDIDO_NO,data_pedido,UID,TOTAL_AMT) values ('{$PEDIDO_NO}',NOW(),'{$uid}','{$total_amt}')";
			if($con->query($sql)){
				$oid=$con->insert_id;
				
				#insert Order Item Details
				$sql="insert into detalhes_pedido (OID,PID,PNAME,preco_produto,QTY,TOTAL) values ";
				$rows=[];
				foreach($cart->get_all_items() as $item){
					$rows[]="('{$oid}','{$item["id"]}','{$item["name"]}','{$item["preco_produto"]}','{$item["qty"]}','{$item["total"]}')";
				}
				$sql.=implode(",",$rows);
				if($con->query($sql)){
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
    </head>
    <body>
		<?php include "navbar.php"; ?>
        <div class='container mt-5'>
			<h2 class='text-muted mb-4'>Detalhes da compra</h2>
			<div class='row'>
				<div class='col-md-6 mx-auto'>
					<form method='post' action='<?php echo $_SERVER["REQUEST_URI"];?>' autocomplete="off">
						<div class='form-group'>
							<label>Nome</label>
							<input type='text' name='name' class='form-control' required placeholder='User Name'>
						</div>
						<div class='form-group'>
							<label>Email</label>
							<input type='email' name='email' class='form-control' required placeholder='User Name'>
						</div>
						<div class='form-group'>
							<label>Numero</label>
							<input type='text' name='contact' class='form-control' required placeholder='Contact No'>
						</div>
						<div class='form-group'>
							<label>Endereço</label>
							<textarea class='form-control' required name='address'></textarea>
						</div>
						<div class='form-group'>
							<label>Cidade</label>
							<input type='text' name='city' class='form-control' required placeholder='City'>
						</div>
						<div class='form-group'>
							<label>Senha</label>
							<input type='text' name='pincode' class='form-control' required placeholder='Pincode'>
						</div>
						<input type='submit' name='submit' value='Checkout' class='btn btn-primary'>
					</form>
				</div>
			</div>
		</div>
    </body>
</html> 