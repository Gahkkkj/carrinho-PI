<?php
include "config.php";
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else
    {
        session_destroy();
        session_start(); 
    }

include_once "cart.class.php";
$cart = new Cart();


$data = [];
$sql = "select * from produtos_carrinho";
$res = $con->query($sql);
if ($res->num_rows > 0) {
	while ($row = $res->fetch_assoc()) {
		$data[] = $row;
	}
}


?>
<html>

<head>
	<title>Produtos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/main.css?date= . <?php echo time();?>">
	

</head>

<body>
	<section>
		<?php include "navbar.php"; ?>
		<div class='container mt-5 pb-5'>
			<h2 class='text-muted mb-4 text-center'>Produtos</h2>
			<div class='row'>
				<?php foreach ($data as $row) : ?>
					<div class='col-md-3 mt-2'>
						<div class="card">
							<img class="card-img-top" src="images/<?php echo $row["IMAGE"]; ?>">
							<div class="card-body">
								<h5 class="card-title"><?php echo $row["PRODUCT"]; ?></h5>
								<p class="card-text">
									Preço R$ <?php echo $row["preco_produto"]; ?>
								</p>
								<a href="view_details.php?id=<?php echo $row["PID"]; ?>" class='btn btn-primary  float-right'>Comprar</a>
								<div class="col-6">
                                    <a href="../editar.php?id=<?php echo $row["PID"]; ?>">
                                        <button type='button' class='btn btn-success botoes'>Editar</button>
                                    </a>

									<a href="../excluir.php?id=<?php echo $row["PID"]; ?>">
                                        <button type='button' class='btn btn-danger botoes'>Excluir</button>
                                    </a>
                               
                                </div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		</section>


		</footer>
      </section class="fixe">
      <footer class="pt-4 pt-md-5 mt-5 border-top bg-dark" id="futer">
        <div class="row andrei">
          <div class="col-4">
            <h5 class="andreifooter"> MAIS </h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Algo legal</a></li>
              <li><a class="text-muted" href="#">Feature aleatória</a></li>
              <li><a class="text-muted" href="#">Recursos para times</a></li>
              <li><a class="text-muted" href="#">Coisas para desenvolvedores</a></li>
              <li><a class="text-muted" href="#">Outra coisa legal</a></li>
              <li><a class="text-muted" href="#">Último item</a></li>
            </ul>
          </div>
          <div class="col-4">
            <h5 class="andreifooter"> FONTES </h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Fonte</a></li>
              <li><a class="text-muted" href="#">Nome da fonte</a></li>
              <li><a class="text-muted" href="#">Outra fonte</a></li>
              <li><a class="text-muted" href="#">Fonte final</a></li>
            </ul>
          </div>
          <div class="col-4">
            <h5 class="andreifooter"> SOBRE </h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Equipe</a></li>
              <li><a class="text-muted" href="#">Locais</a></li>
              <li><a class="text-muted" href="#">Privacidade</a></li>
              <li><a class="text-muted" href="#">Termos</a></li>
            </ul>
          </div>
        </div>
      </footer>
</div>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="../assets/js/main.js"> </script>
</body>

</html>