@extends("plantillausuario")
@section("contenido")

<div class="banner-nosotros">
	<div class="banner-nosotros-body">
		<h1 class="text-uppercase">SOBRE NOSOTROS</h1>
		<p>Somos un restaurante de comida rápida con un ambiente familiar y cálido, <br> desde el año 2000 ofrecemos servicio de restaurante, servicio rápido y servicio a domicilio.</p>

	</div>

</div>
<div class="container container-web-page">
	<h3 class="text-center text-uppercase poppins-regular font-weight-bold">TRABAJA CON NOSOTROS</h3>
	<br>
	<div class="container shadow border rounded p-4">
		<form action="" id="form1" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
			<div class="row">
				<div class="mb-3 col-md-6">
					<label for="txtNombre" class="form-label font-weight-bold">Nombre</label>
					<input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Digita tu Nombre">
				</div>
				<div class="mb-3 col-md-6">
					<label for="txtApellido" class="form-label font-weight-bold">Apellido</label>
					<input type="text" class="form-control" id="txtApellido" name="txtApellido" placeholder="Digita tu Apellido">
				</div>
				<div class="mb-3 col-md-6">
					<label for="txtCelular" class="form-label font-weight-bold">Celular</label>
					<input type="text" class="form-control" id="txtCelular" name="txtCelular" placeholder="Celular">
				</div>
				<div class="mb-3 col-md-6">
					<label for="txtCorreo" class="form-label font-weight-bold">Correo</label>
					<input type="email" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="name@example.com">
				</div>
				<div class="mb-3 col-md-6">
					<label for="archivo" class="form-label font-weight-bold">Hoja de Vida</label>
					<input type="file" name="archivo" id="archivo" accept=".docx, .pdf, .txt">
					<small class="d-block">Archivos admitidos: .docx, .pdf, .txt</small>
				</div>
				<button style="width: 20%; height:50% " class="btn btn-primary mt-3" name="btnGuardar" id="btnGuardar" type="submit" >ENVIAR</button>
			</div>

		</form>
	</div>
</div>



<hr>


@endsection