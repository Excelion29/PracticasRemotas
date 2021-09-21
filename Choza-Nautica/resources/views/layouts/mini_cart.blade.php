<div class="header-mini-cart" style="position: absolute; top: 280px;">
    <div class="mini-cart-btn">
        <i class="fa fa-shopping-cart"></i>
        @if ($cart->quantity_of_products() != 0)
        <span class="cart-notificacion">{{$cart->quantity_of_products()}}</span>
        @endif
    </div>
    <div class="cart-total-price">
        <span>total</span>
        S/.{{$cart->total_price()}}
    </div>
    @if ($cart->quantity_of_products() != 0)
    <ul class="cart-list">
        @foreach ($cart->order_details as $order_details)
        <li>
            <div class="cart-img">
                <a href=""><img src="{{asset('storage').'/'.$order_details->foto}}" alt="">
                {{$order_details->nombre}}</a>
            </div>
            <div class="cart-info">
                <h4><a href="">{{$order_details->nombre}}</a></h4>
                <span>S/.{{$order_details->precio}}</span>
            </div>
            <div class="del-icon">
                <i class="fa fa-times"></i>
            </div>
        </li>
        @endforeach
        <li class="mini-cart-price">
            <span class="subtotal">subtotal:</span>
            <span class="subtotal-price">S/.{{$cart->total_price()}}</span>
        </li>
        <li class="checkout-btn">
            <a href="#">checkout</a>
        </li>
    </ul>
    @endif
</div>