<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Restaurant</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="web/css/normalize.css">

	<!-- MDBootstrap V5 -->
	<link rel="stylesheet" href="web/css/mdb.min.css">

	<!-- Font Awesome V5.15.1 -->
	<link rel="stylesheet" href="web/css/all.css">

	<!-- Sweet Alert V10.13.0 -->
	<script src="web/js/sweetalert2.js"></script>

	<!-- General Styles -->
	<link rel="stylesheet" href="web/css/style.css">

</head>

<body>

	<!-- Header -->
	<header class="header full-box">
		<div class="header-brand text-center full-box">
			<a href="index.html">
				<img src="web/assets/img/logo.png" alt="logo" class="img-fluid">
			</a>
		</div>

		<div class="header-options full-box">
			<nav class="header-navbar full-box poppins-regular font-weight-bold">
				<ul class="list-unstyled full-box">
					<li>
						<a href="/">Inicio<span class="full-box"></span></a>
					</li>
					<li>
						<a href="/takeaway">TakeAway<span class="full-box"></span></a>
					</li>
					<li>
						<a href="/nosotros">Nosotros<span class="full-box"></span></a>
					</li>
					<li>
						<a href="/contacto">Contacto<span class="full-box"></span></a>
					</li>
					<li>
						<a href="/micuenta">Mi Cuenta<span class="full-box"></span></a>
					</li>
					<li>
						<a href="menu.html" class="btn btn-warning"><i class=""></i> &nbsp; Iniciar Sesion</a>
					</li>
					<li>
						<a href="menu.html" class="btn btn-warning"><i class="fas fa-hamburger fa-fw"></i> &nbsp; Recuperar Clave</a>
					</li>
				</ul>
			</nav>

			<a href="bag.html" class="header-button full-box text-center" data-mdb-toggle="tooltip" data-mdb-placement="bottom" title="Carrito">
				<i class="fas fa-shopping-bag"></i>
				<span class="badge bg-warning rounded-pill bag-count">2</span>
			</a>
		</div>
	</header>



	<div class="container-fluid container-web-page">
		<h3 class="text-center text-uppercase poppins-regular font-weight-bold">Nuestros platillos </h3>
		<div class="container">
			<div class="row">
				<div class="col-6">

					<div class="card m-3  shadow-1-strong  " style="max-width: 540px;">
						<div class="row g-0">
							<div class="col-md-4">
								<img src="web/assets/platillos/platillo.jpg" class="img-fluid rounded-start" alt="...">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title">Nombre o titulo del platillo</h5>
									<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
									<label for="txtCantidad"></label>
									<input type="text" name="txtCantidad" id="txtCantidad" placeholder="Cantidad">
									<button class="btn btn-warning">Agregar</button>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col-6">

					<div class="card m-3  shadow-1-strong  " style="max-width: 540px;">
						<div class="row g-0">
							<div class="col-md-4">
								<img src="web/assets/platillos/platillo.jpg" class="img-fluid rounded-start" alt="...">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title">Nombre o titulo del platillo</h5>
									<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
									<label for="txtCantidad">Cantidad</label>
									<input type="text" name="txtCantidad" id="txtCantidad">
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>




		<!-- MDBootstrap V5 -->
		<script src="web/js/mdb.min.js"></script>

		<!-- General scripts -->
		<script src="web/js/main.js"></script>
</body>

</html>