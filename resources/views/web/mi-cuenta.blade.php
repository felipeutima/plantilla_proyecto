@extends("plantillausuario")
@section("contenido")
<div class="container">
      <h3 class="font-weight-bold text-center my-4 pt-3">Mis Pedidos</h3>
      <p class="text-center">Aquí podrás verificar el estado de tus pedidos.</p>
      <div>
      <table class="table">
            <thead class="thead-dark">
                  <tr>
                        <th class="font-weight-bold" scope="col">ID Pedido</th>
                        <th class="font-weight-bold" scope="col">Sucursal</th>
                        <th class="font-weight-bold"scope="col">Fecha</th>
                        <th class="font-weight-bold"scope="col">Descripción</th>
                        <th class="font-weight-bold"scope="col">Total</th>
                        <th class="font-weight-bold"scope="col">Estado</th>
                  </tr>
            </thead>
            <tbody>
                  @foreach($aPedido as $pedido)
                  <tr>
                        <th scope="row">{{$pedido->idpedido}}</th>
                        <th scope="row">{{$pedido->sucursal}}</th>
                        <td>{{ date_format(date_create($pedido->fecha), "d/m/Y H:i") }}</td>
                        <td>{{$pedido->descripcion}}</td>
                        <td>{{$pedido->total}}</td>
                        <td>{{$pedido->estado}}</td>
                  </tr>
                  @endforeach
            </tbody>
      </table>
      </div>

     
</div>

<div class="container">
      <h3 class="font-weight-bold text-center my-4 pt-3">Mi Cuenta</h3>
      <p class="text-center">Aquí podrás verificar tus datos personales. Editalos de ser necesario.</p>
</div>

<div class="container " style="align-items: center; width:60%;">
      <form action="" method="POST" class="px-3 py-3 justify-content-center shadow m-3">
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
                              <input type="text" id="txtApellido" name="txtApellido" class="form-control" value="{{$cliente-> apellido}}" />
                              <label class="form-label" for="txtApellido">Apellido</label>
                        </div>
                  </div>

            </div>

            <hr />

            <div class="row">
                  <div class="col">
                        <!-- Name input -->
                        <div class="form-outline">
                              <input type="text" id="txtCelular" name="txtCelular" class="form-control" value="{{$cliente->celular}}" />
                              <label class="form-label" for="txtCelular">Celular</label>
                        </div>
                  </div>
                  <div class="col">
                        <!-- Name input -->
                        <div class="form-outline">
                              <input type="email" id="txtCorreo" name="txtCorreo" class="form-control" value="{{$cliente -> correo}}" />
                              <label class="form-label" for="txtCorreo">Correo</label>
                        </div>
                  </div>
                  <div class="col">

                        <div class="form-outline">
                              <input type="text" id="txtDni" name="txtDni" class="form-control" value="{{$cliente -> dni}}" />
                              <label class="form-label" for="txtDni">Cedula</label>
                        </div>
                  </div>

                  <div class="text-center">
                        <button class="btn btn-primary m-3 ">Actualizar</button>
                  </div>
            </div>
      </form>

</div>

@endsection