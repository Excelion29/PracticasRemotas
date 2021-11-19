@extends('Admin.index')

@section('template_title')
    Ordenes Detalles
@endsection

@section('content')
@push('css')
<link href='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css' rel='stylesheet'/>
<style>
    .modal{            
        height: 100vh;
        background-color: rgba(44, 40, 40, 0.425);
        /*IMPORTANTE*/
        justify-content: center;
        align-items: center;   
        display: none;
    }
    .modalcrear{
        background: white;
        border-radius: 5px;
        margin-top: 5%; /* Buscamos el centro horizontal (relativo) del navegador */
        width: 50%; /* Definimos el ancho del objeto a centrar */
        margin-right: auto; /* Restamos la mitad de la altura del objeto con un margin-top */
        margin-left: auto; /* Restamos la mitad de la anchura del objeto con un margin-left */
    }
</style>
@endpush
<div class="alert alert-succes alert-dismissible" role="alert">
    @if(Session::get('mensaje')){{
        Session::get('mensaje')
    }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @endif
</div>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Detalles de la empresa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Detalles de la empresa</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <a class="btn btn-success" onclick="mostrarregistro()">Modificar Datos</a>
    </div><!-- /.container-fluid -->
  </div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i>{{$empresa_provider->name}}
                  <small class="float-right">{{$empresa_provider->created_at}}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <address>
                    <strong>Nombres</strong><br>
                    {{$empresa_provider->name}}<br>
                    {{$empresa_provider->name_formal}}<br><br>
                    <strong>Descripción</strong><br>
                    {{$empresa_provider->descripcion}}<br><br>
                </address>                
              </div>
              <div class="col-sm-4 invoice-col">
                <address>
                    <strong>Método de contacto</strong><br>                    
                    Correo: {{$empresa_provider->correo}}<br>                    
                    Nro Telefónico: {{$empresa_provider->telefono}}<br>
                    RUC:{{$empresa_provider->ruc}}<br><br>
                    <strong>Dirección</strong><br>
                    {{$empresa_provider->direccion}}<br>
                    Google Maps: <a href="{{$empresa_provider->google_maps_link}}">{{$empresa_provider->google_maps_link}}</a><br><br>
                    <strong>Horarios de atención</strong><br>
                    {{$empresa_provider->horarios}}<br><br>
                  </address>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="content">    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <div class="container">
                        <div id="mapa" style='width: 100%; height: 450px;' data-lat="{{$empresa_provider->latitud}}" data-lng="{{$empresa_provider->longitud}}" data-zoom="15" data-maptitle="{{$empresa_provider->name_formal}}" data-mapaddress="{{$empresa_provider->direccion}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal" id="modal">
    <div class="modalcrear" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;" >
        <div class="container" id="container">
            <div class="modal-header">
                <h5 class="modal-title">Detalles de la empresa</h5>
                <button type="button" onclick="ocultarrregistro()" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <br>
              <form action="{{url('dashboard/empresa/'.$empresa_provider->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                    @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li> {{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{ isset($empresa_provider->name)?$empresa_provider->name:old('name')}}" id="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Nombre Formal</label>
                            <input type="text" class="form-control" name="name_formal" value="{{ isset($empresa_provider->name_formal)?$empresa_provider->name_formal:old('name_formal')}}" id="name_formal" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefono">Nro Celular</label>
                            <input type="text" class="form-control" name="telefono" value="{{ isset($empresa_provider->telefono)?$empresa_provider->telefono:old('telefono')}}" id="telefono" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="horarios">Horarios de atención</label>
                            <input type="text" class="form-control" name="horarios" value="{{ isset($empresa_provider->horarios)?$empresa_provider->horarios:old('horarios')}}" id="horarios" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="correo">Correo</label>
                            <input type="text" class="form-control" name="correo" value="{{ isset($empresa_provider->correo)?$empresa_provider->correo:old('correo')}}" id="correo" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ruc">RUC</label>
                            <input type="text" class="form-control" name="ruc" value="{{ isset($empresa_provider->ruc)?$empresa_provider->ruc:old('ruc')}}" id="ruc" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" value="{{ isset($empresa_provider->direccion)?$empresa_provider->direccion:old('direccion')}}" id="direccion" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="google_maps_link">Link</label>
                            <input type="text" class="form-control" name="google_maps_link" value="{{ isset($empresa_provider->google_maps_link)?$empresa_provider->google_maps_link:old('google_maps_link')}}" id="google_maps_link" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="latitud">Latitud</label>
                            <input type="text" class="form-control" name="latitud" value="{{ isset($empresa_provider->latitud)?$empresa_provider->latitud:old('latitud')}}" id="latitud" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="longitud">Longitud</label>
                            <input type="text" class="form-control" name="longitud" value="{{ isset($empresa_provider->longitud)?$empresa_provider->longitud:old('longitud')}}" id="longitud" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ isset($empresa_provider->descripcion)?$empresa_provider->descripcion:old('descripcion')}}</textarea>
                    </div>

                    {{-- latitud
                    longitud  
                    <br>
                    <label for="descripcion">Mapa</label>
                    <div class="">
                        <div id="mapaModify" style='width: 100%; height: 450px;' data-lat="{{$empresa_provider->latitud}}" data-lng="{{$empresa_provider->longitud}}" data-zoom="15" data-maptitle="{{$empresa_provider->name_formal}}" data-mapaddress="{{$empresa_provider->direccion}}">
                        </div>
                    </div> --}}
                    
                    <div class="modal-footer">
                        <input class="btn btn-success" type="submit" name="actualizar" value="Actualizar"  id="enviar">
                        <a class="btn btn-primary" id="close" onclick="ocultarrregistro()">Cancelar</a>
                    </div>
                    <br>
            </form>
        </div>
    </div>
</div>


@endsection
@push('js')
<script type="text/javascript">
    function mostrarregistro() {
        document.getElementById('modal').style.display = 'block';
    }
    function ocultarrregistro() {
        document.getElementById('modal').style.display = 'none';
    }
</script>
<script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>
<script src="{{asset('js/mapbox.js')}}"></script>
@endpush

