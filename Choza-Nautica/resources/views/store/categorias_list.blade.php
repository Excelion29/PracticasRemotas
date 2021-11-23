<div  style="float: left;width: 15%; height:1800px;">
    <fieldset>
        <legend>Categorias</legend>
        @foreach ($categorias_provider as $categoria_provider)
        <ul class="row">
            <li class="col-md-4">
                <figure class="itemside mb-3">
                    <div class="aside"><img src="{{asset('storage').'/'.$categoria_provider->foto}}" width="50px"  class="img-sm border"></div>
                    <figcaption class="info align-self-center">
                        <a href="{{url('/products/'.$categoria_provider->id)}}">{{$categoria_provider->nombre}}</a>
                    </figcaption>
                </figure>
            </li>
        </ul>
        @endforeach
    </fieldset>
</div> 