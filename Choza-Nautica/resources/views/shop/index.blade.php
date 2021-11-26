@extends('layouts.page')

@section('title', 'Orden' )
@section('content')
  <link rel="stylesheet" href="{{asset('css/compra.css')}}">
  <link rel="stylesheet" href="{{asset('css/tarjeta.css')}}">
  <div class="cont-p">
    <div class="cont-s1">
              <div class="cont-s1-1">
                  <div class="cont-compra">
                      <p>Carrito > Envíos > Compra</p>
                      <br>
                      <h4>Informacion del contacto</h4>
                      <br>
                      @isset(auth()->user()->id_rol)
                      <input type="text"  placeholder="Nombre" class="dates disabled" value="{{ Auth::user()->name }}" >
                      <input type="text"  placeholder="Apellidos" class="dates" value="{{ Auth::user()->apellidos }}">
                      <input type="email" placeholder="Celular" value="{{Auth::user()->cliente->celular}}" class="dates">
                      <input type="text"  placeholder="Correo" value="{{ Auth::user()->email }}" class="dates2">
                      
                      @endisset
                      <br>
                      <br>
                      <br>
                      <br>
                      {{--<h4>Tipo de compra</h4>
                      <br>
                      <div class="cont-typec">
                          <div class="cont-typec_row">
                              <div class="radius-input">
                                  <input type="checkbox" class="check">
                              </div>
                              <label class="radio-label" for="">
                                  <p><i class="fas fa-file-alt"></i>  Boleta</p>   
                              </label>
                          </div>
                          <div class="cont-typec_row1">
                              <div class="radius-input">
                                  <div class="radius-input">
                                      <input type="checkbox" class="check">
                                      
                                  </div>
                                  <label class="radio-label" for="">
                                      <p> <i class="fas fa-file-invoice"></i> Factura</p>   
                                  </label>
                              </div>
                          </div>
                      </div>
                      <br>
                      <input type="email" placeholder="RUC O DNI" class="dates"> --}}
                      <h4>Información de envio</h4>
                      <br>
                      <select name="Lugar de envio" style="display: block;" id="" required class="select_envio" >
                      <option selected disabled>Distritos:</option>                      
                        @foreach ($Costo_x_deliverys as $Costo_x_delivery)
                          <option value="{{$Costo_x_delivery->id}}">{{$Costo_x_delivery->Distrito}}</option>
                        @endforeach
                      </select>  
                      <input type="text"  placeholder="Dirección" required value="{{Auth::user()->cliente->direccion}}" class="dates2">
                      <input type="email" placeholder="Celular" required value="{{Auth::user()->cliente->celular}}" class="dates2">
                      <br>
                      
                      <br> 
                      <br>
        
                      <a href="{{ route('my_perfil') }}">Cambiar Información de usuario</a>
                  </div>
              </div>
          </div>
          @if($cart->validate_products())
          <div class="cont-s2">
              
              <div class="cont-s2-1">
            

                      <div class="product-info"> 
                        
                          @if ($cart->quantity_of_products() != 0)
                          @foreach ($cart->order_details as $order_detail)
                          @if($order_detail->id_producto!='')
                          <div class="product-info-conatiner">
                              <div class="imgprod">
                                  <div class="imgprod_w">
                                      <img src="{{asset('storage').'/'.$order_detail->product->foto}}" alt="" class="img_f">
                                  </div>
                                  <span class="product_quantity" aria-hidden="true">{{$order_detail->cantidad}}</span>
                              </div>
                              <div class="inf_prod">
                                  <div class="inf_prod_p"><p>{{$order_detail->product->nombre}}</p></div>
                                  <div class="inf_prod_ps"><p>S/. {{$order_detail->precio}}</p></div>     
                              </div>
                              
                      </div>
                              @elseif($order_detail->id_combo!='')
                              <div class="product-info-conatiner">
                                  <div class="imgprod">
                                      <div class="imgprod_w">
                                          <img src="{{asset('storage').'/'.$order_detail->combo->foto}}" alt="" class="img_f">
                                      </div>
                                      <span class="product_quantity" aria-hidden="true">{{$order_detail->cantidad}}</span>
                                  </div>
                                  <div class="inf_prod">
                                      <div class="inf_prod_p"><p>{{$order_detail->combo->nombre}}</p></div>
                                      <div class="inf_prod_ps"><p>S/.  {{$order_detail->precio}}</p></div>     
                                  </div>
                              </div>

                              @endif
                          @endforeach
                          @endif 
                  </div>
                  <br>
                  
                

                  <div class="product-cost"> 
                      <div class="product-cost-gen">
                          <div class="product-cost-container1">
                          <p> Subtotal </p> <p class="p">S/.  {{$cart->total_price()}} </p>
                          </div>
                          <div class="product-cost-container2">
                              
                              <p>Costo por envío</p> <p class="p">S/. 5</p>
                          </div>
                      
                      </div> 
                  </div>
                  <div class="product-total-container">
                      <p>TOTAL </p> <p class="p"> S/.  {{$cart->total_delivery()}} </p>
                      
                  </div>
                  <br>
                  <br>
                  <br>
                  <br>
                  <form action="{{route('pay')}}" id="paymentForm" method="post" class="payment">
                    @csrf
                    <table>
                      <thead>
                        <tr>
                          <th>Tipo de pago</td>
                        </tr>
                      </thead>
                      <tbody>          
                        @foreach ($Payments as $key=>$Payment)
                        <tr>            
                          <td>
                            <div>
                              <div class="custom-control custom-radio @if ($loop->first)  show @endif" />
                                <input type="radio" class="custom-control-input" value="{{$Payment->id}}" name="paymentmethod" id="cd{{$key}}" 
                                @if ($loop->first)
                                    checked                    
                                @endif                
                                required/> 
                                        
                                     
                                <label class="custom-control-label" for="{{$key}}">{{$Payment->name}}<br><img src="{{$Payment->img}}" width="45px" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></label>
                              </div>
                                @includeif('components.'.strtolower($Payment->name).'-collapse')
                              </div>
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
                      <button type="submit" class="btn-evios">Realizar Pago</button>
                  </form>
              </div>
              
          @endif
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/3.4.0/imask.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
          $("#cd2").change(function(){
              if($("#cd2").is(':checked')){
                  $(".conten-payment").show();
              }
          });
          $("#cd1").change(function(){
              if($("#cd1").is(':checked')){
                  $(".conten-payment").hide();
              }
          });
          $("#cd0").change(function(){
              if($("#cd0").is(':checked')){
                  $(".conten-payment").hide();
              }
          });
      </script>
      <script src="{{asset('js/tarjeta.js')}}"></script>
      
@endsection
