<div style="float: right;width: 15%;">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
<link rel="stylesheet" href="{{asset('css/productstars.css')}}">

<div class="btn-product-des">
    <label for="btn-product-des" class=""><i class="fas fa-angle-double-left"></i></label>
</div>
<input type="checkbox" id="btn-product-des">

<div class="product-des">
    
    <div class="product-des-container">
    <label for="btn-product-des"><i class="fas fa-angle-double-right"></i></label>
        <div class="detached-dishes">
            <p class="dishes-title">Platos destacados<p>
            @foreach ($ratings_Productos as $rating_Producto)
                <ul class="row-dishes">
                    <li class="rowcontent">
                        <div class="row-dishes-container">
                            <div class="dishes-img">
                                <img src="{{asset('storage').'/'.$rating_Producto->foto}}"  class="">
                            </div>
                            <div class="dishes-info">
                                <p class=""> 
                                    <a href="{{url('/products_calificar/'.$rating_Producto->id)}}"> {{$rating_Producto->nombre}}</a>
                                </p> 
                                <div class="dishes-stars">
                                    <div class="">
                                        <input id="input_rating_{{$rating_Producto->id}}_SPL" value="{{round($rating_Producto->averageRating,1)}}" class="rating-loading">
                                        <script>
                                            $('#input_rating_{{$rating_Producto->id}}_SPL').rating({displayOnly: true,size:'xs', showCaption:false, theme:'krajee-fa', starCaptions:{1:'Muy malo',2:'Malo',3:'Está bien',4:'Bueno',5:'Muy Bueno'},step: 0.5,theme:'krajee-fa'});
                                        </script>
                                    </div>
                                </div>
                                <div class="dishespromotion">
                                    @if($rating_Producto->has_promociones())
                                        <span class="">S/. {{$rating_Producto->getDiscountAttribute()}} 
                                            <span class="text-muted" style="text-decoration: line-through;">
                                                S/. {{$rating_Producto->precio}}
                                            </span>
                                        </span>
                                    @else 
                                    <span class="">S/. {{$rating_Producto->precio}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                @endforeach
        </div>

        <div class="dishes-sold">
                <p class="dishes-title">Platos más vendidos</p>
                @foreach ($sale_Productos as $sale_Producto)
                <ul class="row-dishes">
                    <li class="rowcontent">
                        <div class="row-dishes-container">
                            <div class="dishes-img">
                                <img src="{{asset('storage').'/'.$sale_Producto->foto}}" >
                            </div>
                            <div class="dishes-info">
                                <p class=""> <a href="{{url('/products_calificar/'.$sale_Producto->id)}}"> {{$sale_Producto->nombre}}</a></p> 
                                @if($sale_Producto->has_promociones())
                                <span class="">S/. {{$sale_Producto->getDiscountAttribute()}} <span class="text-muted" style="text-decoration: line-through;">S/. {{$sale_Producto->precio}}</span></span>
                                @else 
                                <span class="">S/. {{$sale_Producto->precio}}</span>
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>
                @endforeach
        </div>

        <div class="new-dishes">
                <p class="dishes-title">Nuevos platos</p>
                @foreach ($productos_nuevos as $producto_nuevo)
                <ul class="row-dishes">
                    <li class="rowcontent">
                        <div class="row-dishes-container">
                            <div class="dishes-img">
                                <img src="{{asset('storage').'/'.$producto_nuevo->foto}}"   class="">
                            </div>

                            <div class="dishes-info">
                                <p class="">
                                     <a href="{{url('/products_calificar/'.$producto_nuevo->id)}}"> {{$producto_nuevo->nombre}}</a>
                                </p> 
                                @if($producto_nuevo->has_promociones())
                                <span class="">S/. {{$producto_nuevo->getDiscountAttribute()}} <span class="text-muted" style="text-decoration: line-through;">S/. {{$producto_nuevo->precio}}</span></span>
                                @else 
                                <span class="">S/. {{$producto_nuevo->precio}}</span>
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>
                @endforeach
        </div>
    </div>
</div>
    
</div>