@extends('layouts.nav')

@section('title', 'Orden' )

@section('content')

<div class="contenedor-p">
  <style>
    .contenedor-p{
      margin-right: auto;
      margin-left: auto;
      background: wheat;
      height: auto;
      width: 90%;
      display: flex;
    }
  </style>
  <br>
  <br>
  <br>
  <div class="right">
    <style>
      .right{
        margin-top: 80px;
        background: white;
        width: 48%;
        height: 100%;
        border-radius: 45px;
        margin-left: 15px;
        margin-right: 15px;
      }
    </style>

    <div>
      <br>
      <img src="https://expansionfranquicia.com/wp-content/uploads/2017/10/image006-1.png" style="width: 25%;">
      <hr style="width:90%; border-color: #5e5c5c83; background:none;">
      <br>
      <input type="text" placeholder="Nombre">
      <input type="text" placeholder="Apellidos">
      <input type="email" placeholder="Correo">
      <table>
        <thead>
          <tr>
            <th>Tipo de compra</td>
          </tr>
        </thead>
        <tbody>          
          <tr>            
            <td>
              <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customChecka">
              <label class="custom-control-label" for="customChecka">Boleta</label>
              <input type="text" placeholder="DNI">
            </div>
            <td>
          </tr>
          <tr>            
            <td>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheckf">
                <label class="custom-control-label" for="customCheckf">Factura</label>
                <input type="text" placeholder="RUC">
              </div>
            <td>
          </tr>
        </tbody>
      </table>
      <input type="text" name="example" placeholder="Distrito" list="exampleList">
        <datalist id="exampleList">
          <option value="A">  
          <option value="B">
        </datalist>
      <input type="text" placeholder="Dirección">
      <input type="text" placeholder="Celular">
    </div>
  </div>
  
  <div class="left">
    <style>
      .left{
        margin-top: 80px;
        background: white;
        width: 48%;
        height: 100%;
        border-radius: 45px;        
      }
    </style>
    <div>
      <br>
      <span>Detalle de la compra</span>
      <hr style="width:90%; border-color: #5e5c5c83; background:none;">
      <br>
      <table class="table">
        <thead>
          <tr>
            <th>Pedidos</th>
            <th>Precio unitario</th>
            <th>Cantidad</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @if ($cart->quantity_of_products() != 0)
          @foreach ($cart->order_details as $order_detail)
            @if($order_detail->id_producto!='')
              <tr>
                <td>{{$order_detail->product->nombre}}</td>
                <td>S/.{{$order_detail->product->precio}}</td>
                <td>{{$order_detail->cantidad}}</td>
                <td>S/.{{$order_detail->precio}}</td>
              </tr>
            @elseif($order_detail->id_combo!='')
              <tr>
                <td>{{$order_detail->combo->nombre}}</td>
                <td>S/.{{$order_detail->combo->precio}}</td>
                <td>{{$order_detail->cantidad}}</td>
                <td>S/.{{$order_detail->precio}}</td>
              </tr>
              @endif
        @endforeach
        @endif
        </tbody>
        <thead>
          <td>Subtotal:</td>
          <td>S/.{{$cart->total_price()}}</td>
        </thead>
        <thead>
          <td>Costo por envio:</td>
          <td>S/.---------</td>
        </thead>
        <thead>
          <td>Total:</td>
          <td>S/.{{$cart->total_price()}}</td>
        </thead>
      </table>
      <table>
        <thead>
          <tr>
            <th>Tipo de pago</td>
          </tr>
        </thead>
        <tbody>          
          <tr>            
            <td>
              <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck2">
              <label class="custom-control-label" for="customCheck2">Pagar al momento de la entrega </label>
            </div>
            <td>
          </tr>
          <tr>            
            <td>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck3">
                <label class="custom-control-label" for="customCheck3">Transferencia interbancaria</label>
              </div>
            <td>
          </tr>
          <tr>            
            <td>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck5">
                <label class="custom-control-label" for="customCheck5">Paypal</label>
              </div>
            <td>
          </tr>
          <tr>            
            <td>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck4">
                <label class="custom-control-label" for="customCheck4"> <a href="#">He leído y acepto los términos y condiciones del sitio web</a></label>
              </div>
            <td>
          </tr>
        </tbody>
      </table>
      <button type="button" class="btn btn-primary">Realizar Pago</button>
    <div>
  </div>
</div>
@endsection