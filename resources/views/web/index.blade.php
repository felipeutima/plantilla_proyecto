@extends("plantillausuario")
@section("contenido")
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
		<div class="row justify-content-md-center text-center ">
			<table class="table align-center justify-content-center">
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
	@endsection

</html>