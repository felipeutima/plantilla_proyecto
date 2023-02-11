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
<body>	<!-- Header -->
	<header class="header full-box">
	    <div class="header-brand text-center full-box">
	        <a href="/">
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
	                    <a href="/nosotros" >Nosotros<span class="full-box" ></span></a>
	                </li>
	                <li>
	                    <a href="/contacto" >Contacto<span class="full-box" ></span></a>
	                </li>
	                <li>
	                    <a href="/mi-cuenta" >Mi Cuenta<span class="full-box" ></span></a>
	                </li>
	                <li>
			    <a href="/iniciar-sesion"  style="height: 80%" class="bg-warning text-dark"><i></i> &nbsp; Iniciar Sesion</a>
	                </li>
	                <li>
			    <a href="/recuperar-clave"  style="height: 80%"><i class="fas fa-hamburger fa-fw"></i> &nbsp; Recuperar Clave</a>
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
	@yield("contenido")
	
	

	<!-- Footer -->
	<footer class="footer">
	    <div class="container">
	        <div class="row">

	            <div class="col-12 col-md-6">
	                <ul class="list-unstyled" >
	                    <li><h5 class="font-weight-bold" >Colombia</h5></li>
	                    <li><i class="fas fa-map-marker-alt fa-fw"></i> Bogotá D.C, Colombia</li>
	                </ul>
	            </div>
	            <div class="col-12 col-md-6">
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
	<script src="web/js/mdb.min.js" ></script>

	<!-- General scripts -->
	<script src="web/js/main.js" ></script>
</body>
