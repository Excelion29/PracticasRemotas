

@section('title', 'Orden' )


<link rel="stylesheet" href="{{asset('css/compra.css')}}">
<div class="cont-p">
        <div class="cont-s1">
            <div class="cont-s1-1">
                <div class="cont-compra">
                    <p>Carrito > Envíos > Compra</p>
                    <br>
                    <h4>Informacion del contacto</h4>
                    <br>
                    @isset(auth()->user()->id_rol)
                    <input type="text" placeholder="Nombre" class="dates disabled" value="{{ Auth::user()->name }}" >
                    <input type="text" placeholder="Apellidos" class="dates" value="{{ Auth::user()->apellidos }}">
                    <input type="email" placeholder="Correo" class="dates" value="{{ Auth::user()->email }}">
                    @endisset
                    <br>
                    <br>
                    <h4>Tipo de compra</h4>
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
                    <input type="email" placeholder="RUC O DNI" class="dates">
                    <br>
                    <br>
                    <h4>Información de envio</h4>
                    <br>
                    <input type="text" placeholder="Dirección" class="dates2">
                    <input type="text" placeholder="Distrito" class="dates2">
                    <input type="email" placeholder="Celular" class="dates2">
                    <br>
                    <input type="checkbox" class="check-box"> <p class="texrte">Guardar mi información y consultar más rápidamente la próxima vez</p>
                    <br> 
                    <br>
                    <br>
                    <br>
                    <form action="{{route('pay')}}" method="post">
                        @csrf
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
                        <button type="submit" class="btn-envios">Continuar con la compra</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="cont-s2">
            
            <div class="cont-s2-1">
           

                    <div class="product-info"> 
                        @if ($cart->quantity_of_products() != 0)
                        @foreach ($cart->order_details as $order_detail)
                        @if($order_detail->id_producto!='')
                        <div class="product-info-conatiner">
                            <div class="imgprod">
                                <div class="imgprod_w">
                                    <img src="" alt="" class="img_f">
                                </div>
                                <span class="product_quantity" aria-hidden="true">{{$order_detail->cantidad}}</span>
                            </div>
                            <div class="inf_prod">
                                <div class="inf_prod_p"><p>{{$order_detail->product->nombre}}</p></div>
                                <div class="inf_prod_ps"><p>{{$order_detail->product->precio}} PEN</p></div>     
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
                        <p> Subtotal </p> <p class="p">{{$cart->total_price()}}.00 PEN</p>
                        </div>
                        <div class="product-cost-container2">
                            
                            <p>Costo por envío</p> <p class="p">20.00 PEN</p>
                        </div>
                    
                    </div> 
                </div>
                <div class="product-total-container">
                    <p>TOTAL </p> <p class="p">00.00 PEN</p>
                    
                </div>
                <br>
                <br>
                <br>
                <br>
                 
            </div>
           
          </div>
         
    </div>
