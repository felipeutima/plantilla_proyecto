@extends('plantillausuario')
@section('contenido')
	<div class="container-fluid container-web-page">
		<h3 class="text-center text-uppercase poppins-regular font-weight-bold">Nuestros platillos </h3>
		<div class="container">
		<h4 class=" text-uppercase poppins-regular ms-4">Comidas Rapidas </h4>
			<div class="row">
			@foreach ($aProductos as $producto)
			@if($producto->fk_idcategoria==4)
			
				<div class="col-6">
					<div class="card m-3  shadow-1-strong  " style="max-width: 540px;">
						<div class="row g-0">
							<div class="col-md-4">
								<img src="files/{{$producto->imagen}}" class="img-fluid rounded-start" alt="...">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title font-weight-bold">{{$producto ->nombre}}</h5>
									<p class="card-text">{{$producto->descripcion}}</p>
									<p class="card-text font-weight-bold">$ {{$producto->precio}} COP</p>
									<label for="txtCantidad"></label>
									<input type="text" name="txtCantidad" id="txtCantidad" placeholder="Cantidad">
									<button class="btn btn-warning">Agregar</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			@endif
			@endforeach
			</div>
		</div>
		<div class="container">
		<h4 class=" text-uppercase poppins-regular ms-4">Entradas</h4>
			<div class="row">
			@foreach ($aProductos as $producto)
			@if($producto->fk_idcategoria==6)
			
				<div class="col-6">
					<div class="card m-3  shadow-1-strong  " style="max-width: 540px;">
						<div class="row g-0">
							<div class="col-md-4">
								<img src="files/{{$producto->imagen}}" class="img-fluid rounded-start" alt="...">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title font-weight-bold">{{$producto ->nombre}}</h5>
									<p class="card-text">{{$producto->descripcion}}</p>
									<p class="card-text font-weight-bold">$ {{$producto->precio}} COP</p>
									<label for="txtCantidad"></label>
									<input type="text" name="txtCantidad" id="txtCantidad" placeholder="Cantidad">
									<button class="btn btn-warning">Agregar</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			@endif
			@endforeach
			</div>
		</div>
		<div class="container">
		<h4 class=" text-uppercase poppins-regular ms-4">Bebidas</h4>
			<div class="row">
			@foreach ($aProductos as $producto)
			@if($producto->fk_idcategoria==5)
			
				<div class="col-6">
					<div class="card m-3  shadow-1-strong  " style="max-width: 540px;">
						<div class="row g-0">
							<div class="col-md-4">
								<img src="files/{{$producto->imagen}}" class="img-fluid rounded-start" alt="...">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title font-weight-bold">{{$producto ->nombre}}</h5>
									<p class="card-text">{{$producto->descripcion}}</p>
									<p class="card-text font-weight-bold">$ {{$producto->precio}} COP</p>
									<label for="txtCantidad"></label>
									<input type="text" name="txtCantidad" id="txtCantidad" placeholder="Cantidad">
									<button class="btn btn-warning">Agregar</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			@endif
			@endforeach
			</div>
		</div>
		@endsection


</html>