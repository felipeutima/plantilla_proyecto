@extends('plantillausuario')
@section('contenido')
<div class="container-fluid container-web-page">
	<h3 class="text-center text-uppercase poppins-regular font-weight-bold">Nuestros platillos </h3>
	<div class="container">
		@if(isset($mensaje))
		{{$mensaje}}
		@endif
		@foreach ($aCategoria as $categoria)
		<h4 class=" text-uppercase poppins-regular ms-4">{{$categoria->nombre}} </h4>

		

		<div class="row">
			
			@foreach ($aProductos as $producto)
			@if($producto->fk_idcategoria==$categoria->idcategoria)

			<div class="col-6">
				<div class="card m-3  shadow-1-strong  " style="max-width: 540px;">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="files/{{$producto->imagen}}" class="img-fluid " alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">

								<h5 class="card-title font-weight-bold">{{$producto ->nombre}}</h5>
								<form action="" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
									<input type="hidden" name="txtProducto" value="{{$producto->idproducto }}"></input>
									<p class="card-text">{{$producto->descripcion}}</p>
									<p class="card-text font-weight-bold">$ {{number_format($producto->precio, 0, ',', '.');}} COP</p>
									<label for="txtCantidad"></label>
									<input type="number" name="txtCantidad" id="txtCantidad" placeholder="Cantidad">
									<button type="submit" class="btn btn-warning">Agregar</button>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
			@endif
			@endforeach
		</div>
		@endforeach

		

	</div>

</div>

@endsection


</html>