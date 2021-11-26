


<link href='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css' rel='stylesheet'/>

<div class="area-mapa">
    <div class="row">
        <div class="col-12">
          <h4>
              {{$empresa_provider->name}}
          </h4>
        </div>
    </div>
    
    <div class="container">
        <div id="mapa" style='position:relative; width: 1000px; height: 450px;' data-lat="{{$empresa_provider->latitud}}" data-lng="{{$empresa_provider->longitud}}" data-zoom="15" data-maptitle="{{$empresa_provider->name_formal}}" data-mapaddress="{{$empresa_provider->direccion}}">
            
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">






<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>
<script src="{{asset('js/mapbox.js')}}"></script>