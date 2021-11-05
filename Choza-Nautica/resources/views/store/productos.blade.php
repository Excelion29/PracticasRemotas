@extends('layouts.nav')
@section('title', 'Orden' )

@section('content')

<div class="header" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent), url(https://img.bekiacocina.com/articulos/portada/85000/85623.jpg) no-repeat center center; min-height: 60vh; background-attachment: fixed; ">
      <div class="center">
        <h1 class="alex-brush"></h1>
        <h2>Las mejores </h2>
        <span id="asterisk">*</span>
        <p>Productos para ti</p>
      </div>
    </div> 


    <div style="margin-left:45px;width:100%;">
        <div style="width:200px;">
            <form action="{{route('search_products')}}" id="form_search_products" method="GET">
                <input type="text" name="search_products" id="search_product" placeholder="Buscar Platos">
                <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
              </form>
        </div>
      </div>
<div class="row">
  
    
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>Categorias</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($categorias_provider as $categoria_provider)
                <tr>
                    <td scope="row"><a href="{{url('/products/'.$categoria_provider->id)}}">{{$categoria_provider->nombre}}</a></td>
                </tr>
                @endforeach
            </tbody>
    </table>
    @foreach ($productos as $producto)

    <div class="col l4 m8 s12 offset-m2">
        <div class="product-card">
            <div class="card ">
                <div class="card-image">
                    <a class="btn-floating btn-large price waves-effect waves-light " style="background-color: #e04b4b">S/.{{$producto->precio}}</a>
                    <img src="{{asset('storage').'/'.$producto->foto2}}" alt="product-img" style="height: 400px;">
                    <span class="card-title"><span>{{$producto->nombre}}</span></span>
                </div>
                <ul class="card-action-buttons">
                    <li><a id="buy" href="{{route('store_a_product',$producto)}}" class="btn-floating waves-effect waves-light blue"><i class="material-icons buy">add_shopping_cart</i></a>
                
                    </li>
                </ul>
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <p>
                                <strong>Descripcion:</strong> <br />
                                {{substr($producto->descripcion,0,80)}}...
                            </p>
                        </div>
                        
                    </div>
                    <div class="row">
                            <div style="width: 95%; margin: auto;">
                                <div class="chip"><a href="{{url('/products/'.$producto->categorias->id)}}">{{$producto->categoria}}</a></div>
                                <div class="chip cta"><a href="#">Mas detalles</a></div>
                            </div>
                            
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-container">
                    <div class="modals1 modal-close">
                        <p class="close">X</p>
                        <div class="modal-img">
                        
                        <div class="CSSgal">
                            <!-- Don't wrap targets in parent -->
                            <s id="s1"></s> 
                            <s id="s2"></s>
                            <s id="s3"></s>
                            

                            <div class="slider">
                            <div style="background: url({{asset('storage').'/'.$producto->foto}})no-repeat center center/cover" >
                            
                                    
                                </div>
                                <div style="background: url({{asset('storage').'/'.$producto->foto2}})no-repeat center center/cover" >
                                    <h2>Foto 2</h2>
                                </div>
                            <div style="background: url({{asset('storage').'/'.$producto->foto3}})no-repeat center center/cover" >
                                    <h2>Foto 3</h2>
                                </div>
                        
                            </div>

                            <div class="prevNext">
                            <div><a href="#s3"></a><a href="#s2"></a></div>
                            <div><a href="#s1"></a><a href="#s3"></a></div>
                            <div><a href="#s2"></a><a href="#s4"></a></div>
                            <div><a href="#s3"></a><a href="#s1"></a></div>
                            </div>

                            <div class="bullets">
                            <a href="#s1"></a>
                            <a href="#s2"></a>
                            <a href="#s3"></a>
                            
                            </div>

                            </div>
                        
                        </div>
                        <div class="modal-text">
                            <div class="modal-text-container">
                                <div class="Titulo">
                                    <h2>{{$producto->nombre}}</h2>
                                </div>
                                <div class="Precio">
                                    <h4>{{$producto->precio}}</h4>
                                </div>
                                <div class="descripcion">
                                    <p>{{($producto->descripcion)}}</p>
                                </div>                              
                                <div style="margin-top: -150px;" class="cantidad">
                                    {!! Form::open(['route'=>['order.store',$producto],'method'=>'POST']) !!}
                                        <input type="hidden" name="id_combo" value="{{$producto->id}}">    
                                        <div class="quantity">
                                            <input type="number" name="cantidad" min="1" step="1" value="1" max="{{$producto->cantidad}}">
                                        </div>       
                                        <button class="ag-carrito"> <span>Agregar al carrito </span></button>
                                    {!! Form::close() !!}  
                                    <button class="ca-ahora"> <span> Comprar ahora </span></button>
                                </div> 
                        </div>
                    </div>
                </div>      
                            
        </div>
  @endforeach
              

   
  <script src="{{asset('js/modal.js')}}"></script>
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="{{asset('js/typeahead.bundle.min.js')}}"></script>
    <script>
        var productos = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.whitespace,
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          prefetch:"{{route('productos.json')}}"
        });
        $('#search_product').typeahead({
          hint: true,
          highlight: true,
          minLength: 1
        },
        {
          name:'productos',
          source:productos
        }).on('typehead:selected',function(event,selection){
          $('#form_search_products').submit();
        });
    </script>
</div>
@endsection