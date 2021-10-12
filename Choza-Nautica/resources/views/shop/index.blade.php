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
      @isset(auth()->user()->id_rol)
      <div class="form-group">
        <label class="form-control">{{ Auth::user()->name }}</label><br>
        <label class="form-control">{{ Auth::user()->apellidos }}</label><br>
        <label class="form-control">{{ Auth::user()->email }}</label>
      </div>
      @endisset
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
      <div class="col-md-12 col-lg-8">
        <div class="form-group">
            <label for="id_distrito">Distritos</label>
            <select style="display: block;" class="form-control" name="id_distrito" id="id_distrito">
              <option selected="true" disabled="disabled">Lista de Distritos</option>
              @foreach ($Costo_x_deliverys as $Costo_x_delivery)  
                <option value="{{$Costo_x_delivery->id}}">{{$Costo_x_delivery->Distrito}}</option>
              @endforeach
            </select>
          </div>
      </div>
      <input type="text" placeholder="Dirección">
      <div class="form-group">
        <label class="form-control">{{ Auth::user()->celular }}</label><br>
      </div>
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
      <form action="{{route('pay')}}" method="post">
        @csrf
      <table>
        <thead>
          <tr>
            <th>Tipo de pago</td>
          </tr>
        </thead>
        <tbody>          
          @foreach ($Payments as $Payment)
          <tr>            
            <td>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="{{$Payment->id}}" name="payment_platform" id="customCheck3.{{$Payment->name}}">
                <label class="custom-control-label" for="customCheck3.{{$Payment->name}}">{{$Payment->name}}</label>
              </div>
            <td>
          </tr>
          @endforeach
          <tr>            
            <td>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck4" required>
                <label class="custom-control-label" for="customCheck4"><a href="#">He leído y acepto los términos y condiciones del sitio web</a></label>
              </div>
            <td>
          </tr>
        </tbody>
      </table>
      <button type="submit" class="btn btn-primary">Realizar Pago</button>
      </form>
    <div>
  </div>
</div>
  </div>
</div>
@endsection