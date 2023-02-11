@extends("plantillausuario")
@section("contenido")


<section class="vh-100">
      <div class="container-fluid">
            <div class="row">
                  <div class="col-sm-6 text-black ">
                        <div class="container m-4 align-items-center  ">

                        <h3 class="fw-normal mt-5 pt-5 text-center" style="letter-spacing: 1px;">Entrar a Mi cuenta</h3>

                        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-4 pt-4  justify-content-center">

                              <form style="width: 23rem;">

                                    <div class="form-outline mb-4">
                                          <input type="email" id="form2Example18" class="form-control form-control-lg" />
                                          <label class="form-label" for="form2Example18">Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                          <input type="password" id="form2Example28" class="form-control form-control-lg" />
                                          <label class="form-label" for="form2Example28">Contraseña</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                          <button class="btn btn-info btn-lg btn-block" type="button">Entrar</button>
                                    </div>

                                    <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Olvidaste tu contraseña?</a></p>
                                    <p>No tienes cuenta? <a href="/registrarse" class="link-info">Registrate aquí</a></p>

                              </form>

                        </div>
                        </div>

                  </div>
                  <div class="col-sm-6 px-0 d-none d-sm-block">
                        <img src="web/assets/img/logo.png" alt="logo" class="img-fluid w-100 vh-100">

                  </div>
            </div>
      </div>
</section>
@endsection