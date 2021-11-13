<div style="float: right;width: 15%;">
    <fieldset>
        <legend>Platos destacados</legend>
        @foreach ($ratings_Productos as $rating_Producto)
        <ul class="row">
            <li class="col-md-4">
                <figure class="itemside mb-3">
                    <div class="aside"><img src="{{asset('storage').'/'.$rating_Producto->foto}}" width="50px"  class="img-sm border"></div>
                    <figcaption class="info align-self-center">
                        <p class=""> <a href="{{url('/products_calificar/'.$rating_Producto->id)}}"> {{$rating_Producto->nombre}}</a></p> 
                        <div class="review-box">
                            <div class="ratings">
                                <input id="input_rating_{{$rating_Producto->id}}_SPL" value="{{round($rating_Producto->averageRating,1)}}" class="rating-loading">
                                <script>
                                    $('#input_rating_{{$rating_Producto->id}}_SPL').rating({displayOnly: true,size:'xs', showCaption:false, theme:'krajee-fa', starCaptions:{1:'Muy malo',2:'Malo',3:'Está bien',4:'Bueno',5:'Muy Bueno'},step: 0.5,theme:'krajee-fa'});
                                </script>
                            </div>
                        </div>
                        <span class="text-muted">S/. {{$rating_Producto->precio}}</span>
                    
                    </figcaption>
                </figure>
            </li>
        </ul>
        @endforeach
    </fieldset>
    <fieldset>
        <legend>Platos más vendidos</legend>
        @foreach ($sale_Productos as $sale_Producto)
        <ul class="row">
            <li class="col-md-4">
                <figure class="itemside mb-3">
                    <div class="aside"><img src="{{asset('storage').'/'.$sale_Producto->foto}}" width="50px"  class="img-sm border"></div>
                    <figcaption class="info align-self-center">
                        <p class=""> <a href="{{url('/products_calificar/'.$sale_Producto->id)}}"> {{$sale_Producto->nombre}}</a></p> 
                         <span class="text-muted">S/. {{$sale_Producto->precio}}</span>
                    </figcaption>
                </figure>
            </li>
        </ul>
        @endforeach
    </fieldset>
    <fieldset>
        <legend>Nuevos platos</legend>
        @foreach ($productos_nuevos as $producto_nuevo)
        <ul class="row">
            <li class="col-md-4">
                <figure class="itemside mb-3">
                    <div class="aside"><img src="{{asset('storage').'/'.$producto_nuevo->foto}}" width="50px"  class="img-sm border"></div>
                    <figcaption class="info align-self-center">
                        <p class=""> <a href="{{url('/products_calificar/'.$producto_nuevo->id)}}"> {{$producto_nuevo->nombre}}</a></p> 
                        <span class="text-muted">S/. {{$producto_nuevo->precio}}</span>
                    </figcaption>
                </figure>
            </li>
        </ul>
        @endforeach
    </fieldset>
</div>