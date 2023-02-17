@extends("plantillausuario")
@section("contenido")


<div class="container " style="width:60%">
      <h3 class="text-center text-uppercase poppins-regular font-weight-bold pt-4">RECUPERAR CONTRASEÑA</h3>
      @if(isset($clave) && $clave!=="")
      {{$clave}}
      @endif
      <form action="" method="POST" class="form border shadow m-4 p-4">
      <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>

            <div class="row">
                  <div class="mb-3 ">
                        <label for="txtCorreo" class="form-label font-weight-bold" >Correo</label>
                        <input type="text" class="form-control" name="txtCorreo" id="txtCorreo" placeholder="name@example.com" required>
                  </div>
                  <div class="text-center">
                  <button class="btn btn-primary" type="submit"  style="width: 40%;">Enviar</button>

                  </div>
    
            </div>
      </form>

</div>
@endsection