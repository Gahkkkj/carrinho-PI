<?php
include "config.php";
session_start();

include "cart.class.php";
$cart = new Cart();
?>
<html>

<head>
	<title>Cart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="../assets/css/main.css?date= . <?php echo time(); ?>">
</head>

<body>
	<?php include "navbar.php"; ?>
	<nav class="navbar1 navbar-light bg-light">
		<span class="navbar-brand mb-0 h1"> <b> CARRINHO </b> </span>
	</nav>
	<section>
		<div class='container mt-3'>
			<div class='row'>
				<div class='col-md-12'>
					<div class="box-carrinho bg-dark">
						<h2 class='mb-4'>itens no carrinho</h2>
						<?php if ($cart->get_cart_total() > 0) : ?>
							<table class='table table-striped table-responsive-mb table-bordered table-hover table-dark'>
								<thead>
									<tr>
										<th colspan='2' class='text-center'>Produtos</th>
										<th>preço do produto</th>
										<th>Quantidade</th>
										<th>Total</th>
										<th>Ação</th>
									</tr>
								</thead>
								<tbody>
									<?php $items = $cart->get_all_items(); ?>
									<?php foreach ($items as $item) : ?>
										<tr>
											<td><img src='images/2.jpg<?php echo $item["img"]; ?>' style='height:80px;'></td>
											<td><?php echo $item["name"]; ?></td>
											<td> R$ <?php echo $item["preco_produto"]; ?></td>
											<td><input type='number' value='<?php echo $item["qty"]; ?>' class='qty' pid='<?php echo $item["id"]; ?>' min='1'></td>
											<td> R$ <span class='row_total'><?php echo $item["total"]; ?></span></td>
											<td><a href='remove.php?id=<?php echo $item["id"]; ?>' onclick="return confirm('Certeza que quer remover')">Remover</a></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan='3'><a href='index.php' class="btn btn-success">Continue comprando</a></td>
										<th>Total</th>
										<th> R$ <span id='total'><?php echo $cart->get_cart_total(); ?></span></th>
										<td><a href='checkout.php' class='btn btn-success'>Cadastre-se</a></td>
									</tr>
								</tfoot>
							</table>
							<?php else : ?>
					<div class='alert alert-warning alert-dismissible fade show'>carrinho vazio...</div>
				<?php endif; ?>
					</div>
				</div>
			</div>

	
<script>
	$(document).ready(function() {
		$(".qty").change(function() {
			update_cart($(this));
		});
		$(".qty").keyup(function() {
			update_cart($(this));
		});

		function update_cart(cls) {
			var pid = $(cls).attr("pid");
			var q = $(cls).val();

			$.ajax({
				url: "ajax_update_cart.php",
				type: "post",
				data: {
					id: pid,
					qty: q
				},
				success: function(res) {
					console.log(res);

					var a = JSON.parse(res);
					$("#total").text(a.total);
					$(cls).closest("tr").find(".row_total").text(a.row_total);
				}
			});
		}
	});
</script>

</section>
</footer>
<?php include "../includes/footer.php"; ?>
</footer>
</body>

</html>