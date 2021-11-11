<link href='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css' rel='stylesheet' />
<div class="map_area_wrapper">
    <div class="container">
        <div id="mapa" style='position:relative; width: 1000px; height: 450px;' data-lat="{{$empresa_provider->latitud}}" data-lng="{{$empresa_provider->longitud}}" data-zoom="15" data-maptitle="{{$empresa_provider->name_formal}}" data-mapaddress="{{$empresa_provider->direccion}}">
            
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>



<script src="{{asset('js/mapbox.js')}}"></script>