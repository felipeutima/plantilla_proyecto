@extends("plantillausuario")
@section("contenido")
<div class="container border rounded  shadow my-3" style="width:50%">
      <h3 class="text-center font-weight-bold m-4">Registrate</h3>
      <form action="" method="POST" class="px-5 align-items-center  ">
      <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>

            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                  <div class="col">
                        <div class="form-outline">
                              <input type="text" id="txtNombre" name="txtNombre" class="form-control" />
                              <label class="form-label" for="txtNombre">Nombre</label>
                        </div>
                  </div>
                  <div class="col">
                        <div class="form-outline">
                              <input type="text" id="txtApellido" name="txtApellido" class="form-control" />
                              <label class="form-label" for="txtApellido">Apellido</label>
                        </div>
                  </div>

            </div>
            <div class="row mb-4">
                  <div class="col">
                        <div class="form-outline">
                              <input type="text" id="txtDni" name="txtDni" class="form-control" />
                              <label class="form-label" for="txtDni">Cedula</label>
                        </div>
                  </div>
                  <div class="col">
                        <div class="form-outline">
                              <input type="text" id="txtCelular" name="txtCelular" class="form-control" />
                              <label class="form-label" for="txtCelular">Celular</label>
                        </div>
                  </div>

            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                  <input type="email" id="txtCorreo" name="txtCorreo" class="form-control" />
                  <label class="form-label" for="txtCorreo">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                  <input type="password" id="txtClave" name="txtClave" class="form-control" />
                  <label class="form-label" for="txtClave">Password</label>
            </div>
            
            <div class=" row justify-content-center align-items-center ">
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary mb-4" style="width:20%">Registrarse</button>
            </div>

      </form>
</div>
@endsection