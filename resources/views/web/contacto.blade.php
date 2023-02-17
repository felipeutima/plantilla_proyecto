@extends("plantillausuario")
@section("contenido")

<!--Google map-->
<div class="container">
      <div class="ratio ratio-16x9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96714.68291250926!2d-74.05953969406828!3d40.75468158321536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2588f046ee661%3A0xa0b3281fcecc08c!2sManhattan%2C%20Nowy%20Jork%2C%20Stany%20Zjednoczone!5e0!3m2!1spl!2spl!4v1672242259543!5m2!1spl!2spl" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <hr>
</div>
@if(isset($mensaje))

{{$mensaje}}

@endif
<div class="container " style="width:70%">
      <h3 class="text-center text-uppercase poppins-regular font-weight-bold pt-4">CONTACTO</h3>
      <p class="text-center">Dejanos tu mensaje, te escribimos en cuanto podamos.</p>
      <form action="" method="POST" class="form border shadow m-4 p-4">
      <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>

            <div class="row">

                  <div class="mb-3 col-md-6">
                        <label for="txtNombre" class="form-label font-weight-bold">Nombre</label>
                        <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="name@example.com">
                  </div>
                  <div class="mb-3 col-md-6 ">
                        <label for="txtCorreo" class="form-label font-weight-bold">Email de Contacto</label>
                        <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="name@example.com">
                  </div>
                  <div class="mb-3 col-md-12 ">
                        <label for="txtCelular" class="form-label font-weight-bold">Celular</label>
                        <input type="text" class="form-control" id="txtCelular"  name="txtCelular" placeholder="+57123456789">
                  </div>
                  <div class="mb-3 col-md-12">
                        <label for="txtMensaje" class="form-label font-weight-bold">Mensaje</label>
                        <textarea class="form-control" id="txtMensaje" name="txtMensaje" rows="3"></textarea>
                  </div>
                  <div class="row justify-content-center">
                        <button class="btn btn-primary mb-3" type="submit" style="width:20%">Envíar Mensaje</button>
                  </div>
            </div>
      </form>

</div>
@endsection