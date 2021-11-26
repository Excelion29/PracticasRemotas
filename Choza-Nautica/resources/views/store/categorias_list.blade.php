<input type="checkbox" id="btn-product-cat">

<div class="btn-product-cat">
    <label for="btn-product-cat" class=""><i class="fas fa-caret-right"></i></label>
</div>


<div class="product-cat">
        <label for="btn-product-cat" class=""><i class="fas fa-caret-left"></i></label>
    <div>
        <p class="dishes-title">Categorias</p>
        @foreach ($categorias_provider as $categoria_provider)
        <ul class="row-dishes">
            <li class="">
                <div class="content-cat">
                    <div class="dishes-img"><img src="{{asset('storage').'/'.$categoria_provider->foto}}"></div>
                    <div class="dishes-info-cat">
                        <a href="{{url('/products/'.$categoria_provider->id)}}">{{$categoria_provider->nombre}}</a>
                    </div>
                </div>
            </li>
        </ul>
        @endforeach
    </div>
    
</div> 