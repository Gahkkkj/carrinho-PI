</div>
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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>

	<?php include "navbar.php"; ?>
	<nav class="navbar1 navbar-light bg-light">
		<span class="navbar-brand mb-0 h1"> <b> CARRINHO </b> </span>
	</nav>
	<section>
		<div class="container">
			<div class="row">
				<div class="d-flex col-8">
					<div class="bg-dark p-4">
						<h2 class='mb-4 text-center justify-content-center' style="color:orange ">Itens no carrinho</h2>
						<?php if ($cart->get_cart_total() > 0) : ?>
							<table class='table flex-shrink-1  table-grid table-striped table-responsive-mb table-bordered table-hover table-dark'>
								<thead>
									<tr class="thead-light">
										<th colspan='2' class='text-center'>Produto</th>
										<th>preço</th>
										<th>Quantidade</th>
										<th>Total</th>
										<th>Ação</th>
									</tr>
								</thead>
								<tbody>
									<?php $items = $cart->get_all_items(); ?>
									<?php foreach ($items as $item) : ?>
										<tr>
											<td><img src='images/2.jpg<?php echo $item["img"]; ?>' style='height:120px;'></td>
											<td><?php echo $item["name"]; ?></td>
											<td> R$ <?php echo $item["preco_produto"]; ?></td>
											<td><input type='number' value='<?php echo $item["qty"]; ?>' class='qty' pid='<?php echo $item["id"]; ?>' min='1'></td>
											<td> R$ <span class='row_total'><?php echo $item["total"]; ?></span></td>
											<td>
												<a href='remove.php?id=<?php echo $item["id"]; ?>' onclick="return confirm('Certeza que quer remover')">
													<button type="button" class="btn-excluir fas fa-trash-alt"></button>
												</a>
											</td>


										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<a href='index.php'>
								<button type="button" href='index.php' class="btn-continue	fas fa-shopping-bag">Continue comprando</button>
							</a>
					</div>

					<div class="d-flex  col-5">
						<div class="cart-summary">
							<div style="font-weight: 900; ">
								<div class="text-center" style="font-size: 24px; color: rgb(0, 0, 0);">Total</div>
								<div class=" font-weight-bold text-center" style=" font-size: 20px;">Total: <span>R$<span id='total'><?php echo $cart->get_cart_total(); ?></span></div>
								<a href='checkout.php'>
									<button type="button" class='btn-Comprar'>Comprar <span>(<?php echo $cart->get_cart_count(); ?>)</span></button>
								</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	<?php else : ?>
		<div class="d-flex justify-content-center">
		<div class='alert alert-warning alert-dismissible fade show'>carrinho vazio...</div>
	<?php endif; ?>

	</section>





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
	</footer>
	<?php include "../includes/footer.php"; ?>
	</footer>
</body>

</html>