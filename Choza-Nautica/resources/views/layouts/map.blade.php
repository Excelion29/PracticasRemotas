


<link href='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css' rel='stylesheet'/>

<div class="map_area_wrapper">
    <div class="row">
        <div class="col-12">
          <h4>
              {{$empresa_provider->name}}
          </h4>
        </div>
    </div>
    <div class="col-sm-4 invoice-col">
        Empresa
        <address>
          <strong>{{$empresa_provider->name_formal}}</strong><br>
          {{$empresa_provider->direccion}}<br>
          {{$empresa_provider->descripcion}}<br>
          Contacto: {{$empresa_provider->telefono}}<br>
          Correo: {{$empresa_provider->correo}}
        </address>
    </div>
    <div class="container">
        <div id="mapa" style='position:relative; width: 1000px; height: 450px;' data-lat="{{$empresa_provider->latitud}}" data-lng="{{$empresa_provider->longitud}}" data-zoom="15" data-maptitle="{{$empresa_provider->name_formal}}" data-mapaddress="{{$empresa_provider->direccion}}">
            
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>
<script src="{{asset('js/mapbox.js')}}"></script>