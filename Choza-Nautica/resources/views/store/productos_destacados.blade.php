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
            <p>Platos destacados<p>
            @foreach ($ratings_Productos as $rating_Producto)
                <ul class="row-dishes">
                    <li class="rowcontent">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="{{asset('storage').'/'.$rating_Producto->foto}}" width="50px"  class="img-sm border"></div>
                            <figcaption class="info align-self-center">
                                <p class=""> <a href="{{url('/products_calificar/'.$rating_Producto->id)}}"> {{$rating_Producto->nombre}}</a></p> 
                                <div class="review-box">
                                    <div class="ratings">
                                        <input id="input_rating_{{$rating_Producto->id}}_SPL" value="{{round($rating_Producto->averageRating,1)}}" class="rating-loading">
                                        <script>
                                            $('#input_rating_{{$rating_Producto->id}}_SPL').rating({displayOnly: true,size:'xs', showCaption:false, theme:'krajee-fa', starCaptions:{1:'Muy malo',2:'Malo',3:'Está bien',4:'Bueno',5:'Muy Bueno'},step: 0.5,theme:'krajee-fas'});
                                        </script>
                                    </div>
                                </div>
                                @if($rating_Producto->has_promociones())
                                <span class="text-muted">S/. {{$rating_Producto->getDiscountAttribute()}} <span class="text-muted" style="text-decoration: line-through;">S/. {{$rating_Producto->precio}}</span></span>
                                @else 
                                <span class="text-muted">S/. {{$rating_Producto->precio}}</span>
                                @endif
                            </figcaption>
                        </figure>
                    </li>
                </ul>
                @endforeach
        </div>

        <div class="dishes-sold">
                <legend>Platos más vendidos</legend>
                @foreach ($sale_Productos as $sale_Producto)
                <ul class="row">
                    <li class="col-md-4">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="{{asset('storage').'/'.$sale_Producto->foto}}" width="50px"  class="img-sm border"></div>
                            <figcaption class="info align-self-center">
                                <p class=""> <a href="{{url('/products_calificar/'.$sale_Producto->id)}}"> {{$sale_Producto->nombre}}</a></p> 
                                @if($sale_Producto->has_promociones())
                                <span class="text-muted">S/. {{$sale_Producto->getDiscountAttribute()}} <span class="text-muted" style="text-decoration: line-through;">S/. {{$sale_Producto->precio}}</span></span>
                                @else 
                                <span class="text-muted">S/. {{$sale_Producto->precio}}</span>
                                @endif
                            </figcaption>
                        </figure>
                    </li>
                </ul>
                @endforeach
        </div>

        <div class="new-dishes">
                <legend>Nuevos platos</legend>
                @foreach ($productos_nuevos as $producto_nuevo)
                <ul class="row">
                    <li class="col-md-4">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="{{asset('storage').'/'.$producto_nuevo->foto}}" width="50px"  class="img-sm border"></div>
                            <figcaption class="info align-self-center">
                                <p class=""> <a href="{{url('/products_calificar/'.$producto_nuevo->id)}}"> {{$producto_nuevo->nombre}}</a></p> 
                                @if($producto_nuevo->has_promociones())
                                <span class="text-muted">S/. {{$producto_nuevo->getDiscountAttribute()}} <span class="text-muted" style="text-decoration: line-through;">S/. {{$producto_nuevo->precio}}</span></span>
                                @else 
                                <span class="text-muted">S/. {{$producto_nuevo->precio}}</span>
                                @endif
                            </figcaption>
                        </figure>
                    </li>
                </ul>
                @endforeach
        </div>
    </div>
</div>
    
</div>