@extends("plantillausuario")
@section("contenido")
<div class="container">
      <h3 class="font-weight-bold text-center my-4 pt-3">Carrito de compras</h3>
      <p class="text-center">Estos son los productos que tienes cargado en tu carrito de compras</p>
</div>
<div class="container justify-content-center" style="align-items: center; width:40%;">

      

      <div class="card shadow-1-strong m-4 p-4 ">
      <form action="" method="POST" >
      <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
            <div class="row text-center">
                  <i class="fa fa-shopping-cart my-2" aria-hidden="true" style="color: orange;"></i>

            </div>
            <div class="row mt-4">
                  <div class="col-md-3 font-weight-bold">
                        <p>Producto</p>
                  </div>
                  <div class="col-md-3 font-weight-bold">
                        <p class="text-center">precio Unitario</p>
                  </div>
                  <div class="col-md-3 font-weight-bold">
                        <p class="text-center">Cantidad</p>
                  </div>
                  <div class="col-md-3 font-weight-bold">
                        <p class="text-center">Subtotal</p>
                  </div>

            </div>
            <?php $total=0 ; $subtotal=0 ?>
            @foreach($aCarrito as $carrito)
            <div class="row ">
                  <div class="col-md-3">
                        <p>{{$carrito->nombre}}</p>
                  </div>
                  <div class="col-md-3 ">
                        <p class="text-center">${{$carrito->precio}} COP</p>
                  </div>
                  <div class="col-md-3">
                        <p class="text-center">{{$carrito->cantidad}}</p>
                  </div>
                  <?php $subtotal=$carrito->precio*$carrito->cantidad;?>
                  <div class="col-md-3">
                        <p class="text-center">$<?php echo($subtotal);?> COP</p>
                  </div>

                  <?php $total+=$subtotal?>
                  <?php $subtotal=0 ?>
            </div>
            @endforeach
            <input type="hidden" name="txtTotal" value="<?php echo $total?>"></input>
            <hr>
            <div class="row mt-2">
                  <div class="col-md-6 font-weight-bold">
                        <p>Total:</p>
                  </div>
                  <div class="col-md-6">
                        <p>$ <?php echo($total);?> COP</p>
                  </div>
            </div>
            <hr>
            <div class="row mt-2">
                  <label for="lstPago" class="font-weight-bold ">Metodo de pago:</label>
                  <div>
                  <select name="lstPago" id="lstPago" class="form-control">
                        <option value="" selected disabled>Seleccionar</option>

                        <option value="1">Pagar en tienda</option>

                        <option value="2">Pagar en línea</option>

                  </select>
                  </div>
            </div>
            <div class="row mt-1">
                  <label for="lstSucursal" class="font-weight-bold">Sucursal a retirar:</label>
                  <div>
                  <select name="lstSucursal" id="lstSucursal" class="form-control">
                        <option value="" selected disabled>Seleccionar</option>

                        @foreach($aSucursales as $sucursal)
                        <option value="{{$sucursal->idsucursal}}">{{$sucursal->nombre}}</option>
                        @endforeach

                  </select>
                  </div>
            </div>
            <div class="row mt-1">
                  <label for="txtDescripcion" class="font-weight-bold">Descripcion:</label>
                  <div>
                  <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" rows="5" placeholder="Añadir Comentarios..."></textarea >
                  </div>
            </div>
            <div class="text-center my-3">
                  <button type="submit" class="btn btn-warning text-dark font-weight-bold "> Finalizar Pedido</button>
            </div>
            </form>
      </div>
</div>


@endsection