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
						<a href="menu.html">Contacto<span class="full-box"></span></a>
					</li>
					<li>
						<a href="menu.html">Mi Cuenta<span class="full-box"></span></a>
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


	<!-- Content -->
	<div class="banner">
		<div class="banner-body">
			<h1 class="text-uppercase">Bienvenido a Hamburguesas SRL</h1>
			<p>Los mejores platillos y la mejor calidad los encuentras en Hamburguesas SRL</p>
			<a href="menu.html" class="btn btn-warning"><i class="fas fa-hamburger fa-fw"></i> &nbsp; Ir al menu</a>
		</div>
	</div>

	<div class="container container-web-page">
		<h3 class="text-center text-uppercase poppins-regular font-weight-bold">Nuestros servicios</h3>
		<br>
		<div class="row">
			<div class="col-12 col-sm-6 col-md-4">
				<p class="text-center"><i class="fas fa-shipping-fast fa-5x"></i></p>
				<h5 class="text-center text-uppercase poppins-regular font-weight-bold">Envíos a domicilio</h5>
				<p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione ad possimus modi repellendus? Expedita, vitae rerum at aliquam eligendi soluta veniam ut dolor facere fugiat quod, maxime ad accusamus quisquam.</p>
			</div>
			<div class="col-12 col-sm-6 col-md-4">
				<p class="text-center"><i class="fas fa-utensils fa-5x"></i></p>
				<h5 class="text-center text-uppercase poppins-regular font-weight-bold">Ventas al por mayor</h5>
				<p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione ad possimus modi repellendus? Expedita, vitae rerum at aliquam eligendi soluta veniam ut dolor facere fugiat quod, maxime ad accusamus quisquam.</p>
			</div>
			<div class="col-12 col-sm-6 col-md-4">
				<p class="text-center"><i class="fas fa-store-alt fa-5x"></i></p>
				<h5 class="text-center text-uppercase poppins-regular font-weight-bold">Reservaciones de local</h5>
				<p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione ad possimus modi repellendus? Expedita, vitae rerum at aliquam eligendi soluta veniam ut dolor facere fugiat quod, maxime ad accusamus quisquam.</p>
			</div>
		</div>
	</div>

	<hr>



	<div class="container container-web-page">
	<h3 class="text-center text-uppercase poppins-regular font-weight-bold pb-3">Nuestras Sucursales</h3>
		<div class="row justify-content-md-center text-center">
			<table class="table align-center">
				<thead>
					<tr class="align-middle" >
						<th  class="font-weight-bold" scope="col">Sucursal</th>
						<th class="font-weight-bold" scope="col">Telefono</th>
						<th  class="font-weight-bold" scope="col">LinkMap</th>
					</tr>
				</thead>
				<tbody>

					@foreach($aSucursales as $sucursal)
					<tr>	

						<th class="font-weight-bold">{{$sucursal->nombre}}</th>
						<td>{{$sucursal->telefono}}</td>
						<td><a target="_blank" href="{{$sucursal->linkmap}}">{{$sucursal->linkmap}}</a></td>
					</tr>

					@endforeach


				</tbody>

			</table>



		</div>
	</div>

	<!-- Footer -->
	@extends("plantillausuario");
	@section('footer')



	<!-- MDBootstrap V5 -->
	<script src="web/js/mdb.min.js"></script>

	<!-- General scripts -->
	<script src="web/js/main.js"></script>
</body>

</html>