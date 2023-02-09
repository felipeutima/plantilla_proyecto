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
	<script src="web/js/sweetalert2.js" ></script>

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
	        <nav class="header-navbar full-box poppins-regular font-weight-bold" >
	            <ul class="list-unstyled full-box">
	                <li>
	                    <a href="/">Inicio<span class="full-box" ></span></a>
	                </li>
	                <li>
	                    <a href="/takeaway" >TakeAway<span class="full-box" ></span></a>
	                </li>
	                <li>
	                    <a href="menu.html" >Nosotros<span class="full-box" ></span></a>
	                </li>
	                <li>
	                    <a href="/contacto" >Contacto<span class="full-box" ></span></a>
	                </li>
	                <li>
	                    <a href="/micuenta" >Mi Cuenta<span class="full-box" ></span></a>
	                </li>
	                <li>
			    <a href="menu.html" class="btn btn-warning"><i class=""></i> &nbsp; Iniciar Sesion</a>
	                </li>
	                <li>
			    <a href="menu.html" class="btn btn-warning"><i class="fas fa-hamburger fa-fw"></i> &nbsp; Recuperar Clave</a>
	                </li>
	            </ul>
	        </nav>
	        
	        <a href="bag.html" class="header-button full-box text-center" data-mdb-toggle="tooltip" data-mdb-placement="bottom" title="Carrito" >
	            <i class="fas fa-shopping-bag"></i>
	            <span class="badge bg-warning rounded-pill bag-count" >2</span>
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
	    <h3 class="text-center text-uppercase poppins-regular font-weight-bold">Trabaja con nosotros </h3>
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

	

	<hr>

	<div class="container container-web-page">
	    <div class="row justify-content-md-center">
	        <div class="col-12 col-md-6">
	            <figure class="full-box">
	                <img src="./assets/img/registration.png" alt="registration" class="img-fluid">
	            </figure>
	        </div>
	        <div class="w-100"></div>
	        <div class="col-12 col-md-6">
	            <h3 class="text-center text-uppercase poppins-regular font-weight-bold">Crea tu cuenta</h3>
	            <p class="text-justify">
	                Crea tu cuenta para poder realizar pedidos de platillos hasta la puesta de tu casa, es muy fácil y rápido.
	            </p>
	            <p class="text-center">
	                <a href="registration.html" class="btn btn-primary" >Crear cuenta</a>
	            </p>
	        </div>
	    </div>
	</div>

	<!-- Footer -->
	<footer class="footer">
	    <div class="container">
	        <div class="row">
	            <div class="col-12 col-md-4">
	                <ul class="list-unstyled" >
	                    <li><h5 class="font-weight-bold" ><i class="far fa-copyright"></i> Carlos Alfaro 2021</h5></li>
	                    <li> Todos los derechos reservados </li>
	                </ul>
	            </div>
	            <div class="col-12 col-md-4">
	                <ul class="list-unstyled" >
	                    <li><h5 class="font-weight-bold" >El Salvador</h5></li>
	                    <li><i class="fas fa-map-marker-alt fa-fw"></i> San Salvador, El Salvador, Centro América</li>
	                </ul>
	            </div>
	            <div class="col-12 col-md-4">
	                <ul class="list-unstyled" >
	                    <li><h5 class="font-weight-bold" >Siguenos en:</h5> </li>
	                    <li>
	                        <a href="" class="footer-link" target="_blank" >
	                            <i class="fab fa-facebook fa-fw"></i> Facebook
	                        </a>
	                    </li>

	                    <li>
	                        <a href="" class="footer-link" target="_blank" >
	                            <i class="fab fa-instagram fa-fw"></i>
	                                Instagram
	                        </a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>
	</footer>


	<!-- MDBootstrap V5 -->
	<script src="./js/mdb.min.js" ></script>

	<!-- General scripts -->
	<script src="./js/main.js" ></script>
</body>
</html>