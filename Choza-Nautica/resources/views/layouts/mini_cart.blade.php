
<div class="header-mini-cart">
{{-- <div class="header-mini-cart" style="position:absolute;"> --}}
    {{-- <div class="header-mini-cart" style="position:absolute;display:none;"> --}}
    <div class="mini-cart-btn">
        <i class="fa fa-shopping-cart"></i>
        @if ($cart->quantity_of_products() != 0)
        <span class="cart-notificacion">{{$cart->quantity_of_products()}}</span>
        @endif
    </div>
    <ul class="cart-list">
        @if ($cart->quantity_of_products() != 0)
        @foreach ($cart->order_details as $order_detail)
        <li>
            <div class="cart-img">
                <a href=""><img width="25%;" src="{{asset('storage').'/'.$order_detail->product->foto}}" alt="">
                {{$order_detail->product->nombre}}</a>
            </div>
            <div class="cart-info">
                <h4><a href="">{{$order_detail->cantidad}}</a></h4>
                <span>S/.{{$order_detail->precio}}</span>
            </div>
            <div class="del-icon">
                <i class="fa fa-times"></i>
            </div>
        </li>
        @endforeach
        @endif
        <li class="mini-cart-price">
            <span class="subtotal">subtotal:</span>
            <span class="subtotal-price">S/.{{$cart->total_price()}}</span>
        </li>
        @if ($cart->quantity_of_products() != 0)
        <li class="checkout-btn">
            <a href="#">mirar</a>
        </li>
        @endif
    </ul>
</div>