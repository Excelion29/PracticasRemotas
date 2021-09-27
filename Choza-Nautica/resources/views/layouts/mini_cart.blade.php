
    <div class="header-mini-cart" style="display:none;"> 
    <div class="mini-cart-btn">
        <i class="fa fa-shopping-cart"></i>
        @if ($cart->quantity_of_products() != 0)
        <span class="cart-notificacion">{{$cart->quantity_of_products()}}</span>
        @endif
    </div>
    <ul class="cart-list">
        {!! Form::open(['route'=>'carrito.update','method'=>'PUT']) !!}

        @if ($cart->quantity_of_products() != 0)
        @foreach ($cart->order_details as $order_detail)
        <li>
            @if($order_detail->id_producto!='')
            <div class="cart-img">
                <img width="25%;" src="{{asset('storage').'/'.$order_detail->product->foto}}" alt="">
                <h4>{{$order_detail->product->nombre}}</h4>
            </div>

            <div class="cart-info">
                <h4>Precio unitario: S/.<input name="precio[]" type="text" value="{{$order_detail->product->precio}}">
                <h4 class="quantity">Cantidad:
                    <input name="cantidad[]" type="number" min="1" max="{{$order_detail->product->cantidad}}" step="1" value="{{$order_detail->cantidad}}">
                </h4>
                <h4>Precio total:<span>S/.{{$order_detail->precio}}</span></h4>
            </div>
            @elseif($order_detail->id_combo!='')
            <div class="cart-img">
                <img width="25%;" src="{{asset('storage').'/'.$order_detail->combo->foto}}" alt="">
                <h4>{{$order_detail->combo->nombre}}</h4>
            </div>

            <div class="cart-info">
                <h4>Precio unitario: S/.<input name="precio[]" type="text" value="{{$order_detail->combo->precio}}">
                <h4 class="quantity">Cantidad:
                    <input name="cantidad[]" type="number" min="1" max="{{$order_detail->combo->cantidad}}" step="1" value="{{$order_detail->cantidad}}">
                </h4>
                <h4>Precio total:<span>S/.{{$order_detail->precio}}</span></h4>
            </div>
            @endif

            <div class="del-icon">
                <a href="{{route('orders.destroy',$order_detail)}}"><i class="fa fa-times"></i></a>
            </div>
        </li>
        @endforeach
        <li class="checkout-btn">
            <button style="color: white; background:rgb(29, 199, 142);" type="submit" >Actualizar</button>
        </li>
        @endif
        </li>
        {!! Form::close() !!}
        <li class="mini-cart-price">
            Subtotal:<span class="subtotal-price">S/.{{$cart->total_price()}}</span>
        </li>
        @if ($cart->quantity_of_products() != 0)
        <li class="checkout-btn">
            <a href="{{route('shop.index')}}">Comprar</a>
        </li>
        @endif
    </ul>
</div>