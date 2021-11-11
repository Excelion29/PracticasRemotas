<article style="float: right;">
    @foreach ($productos_destacados as $producto_destacado)
    <ul class="row">
        <li class="col-md-4">
            <figure class="itemside mb-3">
                <div class="aside"><img src="{{asset('storage').'/'.$producto_destacado->foto}}" width="50px"  class="img-sm border"></div>
                <figcaption class="info align-self-center">
                    <p class="title">{{$producto_destacado->nombre}}</p> <span class="text-muted">S/. {{$producto_destacado->precio}}</span>
                </figcaption>
            </figure>
        </li>
    </ul>
    @endforeach
    {!! $productos_destacados->links() !!}
</article>