@extends("plantillausuario")
@section("contenido")
<div class="container">
      <h3 class="font-weight-bold text-center my-4 pt-3">Mi Cuenta</h3>
      <p class="text-center">Aquí podrás verificar tus datos personales. Editalos de ser necesario</p>
</div>
<div class="container shadow m-3" style="width:60%;align-items: center;">
            <form action="POST" class="px-3 py-3 align-items-center">
                  <div class="row">

                        <div class="col-md-6">
                              <!-- Name input -->
                              <div class="form-outline">
                                    <input type="text" id="form8Example1" class="form-control" />
                                    <label class="form-label" for="form8Example1">Name</label>
                              </div>
                        </div>
                        <div class="col-md-6">
                              <!-- Email input -->
                              <div class="form-outline">
                                    <input type="email" id="form8Example2" class="form-control" />
                                    <label class="form-label" for="form8Example2">Email address</label>
                              </div>
                        </div>

                  </div>

                  <hr />

                  <div class="row">


                        <div class="col">
                              <!-- Name input -->
                              <div class="form-outline">
                                    <input type="text" id="form8Example3" class="form-control" />
                                    <label class="form-label" for="form8Example3">First name</label>
                              </div>
                        </div>
                        <div class="col">
                              <!-- Name input -->
                              <div class="form-outline">
                                    <input type="text" id="form8Example4" class="form-control" />
                                    <label class="form-label" for="form8Example4">Last name</label>
                              </div>
                        </div>
                        <div class="col">
                              <!-- Email input -->
                              <div class="form-outline">
                                    <input type="email" id="form8Example5" class="form-control" />
                                    <label class="form-label" for="form8Example5">Email address</label>
                              </div>
                        </div>
                  </div>
            </form>
 
</div>

@endsection