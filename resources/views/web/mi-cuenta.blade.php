@extends("plantillausuario")
@section("contenido")
<div class="container">
      <h3 class="font-weight-bold text-center my-4 pt-3">Mi Cuenta</h3>
      <p class="text-center">Aquí podrás verificar tus datos personales. Editalos de ser necesario.</p>
</div>

<div class="container " style="align-items: center; width:60%;">
            <form action="" method="POST" class="px-3 py-3 justify-content-center shadow m-3"  >
            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>

                  <div class="row">

                        <div class="col-md-6">
                              <!-- Name input -->
                              <div class="form-outline">
                                    <input type="text" id="txtNombre" name="txtNombre" class="form-control" value="{{$cliente->nombre}}" />
                                    <label class="form-label" for="txtNombre">Name</label>
                              </div>
                        </div>
                        <div class="col-md-6">

                              <div class="form-outline">
                                    <input type="text" id="txtApellido" name="txtApellido" class="form-control"  value="{{$cliente-> apellido}}"/>
                                    <label class="form-label" for="txtApellido">Apellido</label>
                              </div>
                        </div>

                  </div>

                  <hr />

                  <div class="row">
                        <div class="col">
                              <!-- Name input -->
                              <div class="form-outline">
                                    <input type="text" id="txtCelular" name="txtCelular" class="form-control" value="{{$cliente->celular}}"/>
                                    <label class="form-label" for="txtCelular">Celular</label>
                              </div>
                        </div>
                        <div class="col">
                              <!-- Name input -->
                              <div class="form-outline">
                                    <input type="email" id="txtCorreo" name="txtCorreo" class="form-control"  value="{{$cliente -> correo}}" />
                                    <label class="form-label" for="txtCorreo">Correo</label>
                              </div>
                        </div>
                        <div class="col">

                              <div class="form-outline">
                                    <input type="text" id="txtDni" name="txtDni" class="form-control" value="{{$cliente -> dni}}" />
                                    <label class="form-label" for="txtDni" >Cedula</label>
                              </div>
                        </div>

                        <div class="text-center">
                              <button class="btn btn-primary m-3 ">Guardar</button>
                        </div>
                  </div>
            </form>
 
</div>

@endsection