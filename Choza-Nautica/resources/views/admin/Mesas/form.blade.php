<h1>{{$modo}} mesas</h1>

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
        
    @foreach ($errors->all() as $error)
    <li> {{$error}}</li>
    @endforeach

</ul>

@endif
</div>
<div class="form-group">
    <label for="id_administrador">Admin</label>
    <input type="text" class="form-control" name="id_administrador" value="{{auth()->id()}}" id="id_administrador">
</div>

<div class="form-group">
    <label for="nombre">Nro Mesa</label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($mesa->nombre)?$mesa->nombre:old('nombre')}}" id="nombre">
</div>

<div class="form-group">
    <label for="capacidad">Capacidad</label>
    <input type="number" class="form-control" name="capacidad" value="{{ isset($mesa->capacidad)?$mesa->capacidad:old('capacidad')}}" id="capacidad">
</div>

<div class="form-group">
    <label for="precio">Precio</label>
    <input type="number" class="form-control" name="precio" value="{{ isset($mesa->precio)?$mesa->precio:old('precio')}}" id="precio">
</div>

<div class="form-group">
    @if(isset($mesa->foto))
    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$mesa->foto}}"  width="100" alt="" >
    <input type="file" class="form-control" name="foto" value='{{$mesa->foto}}' id="foto">
    @else  
    <label for="foto">Imagen</label>
    <input type="file" class="form-control" name="foto" value='' id="foto">
    @endif
</div>


    <input class="btn btn-success" type="submit" name="enviar" value="{{$modo}}"  id="enviar">
    <a class="btn btn-primary" href="{{url('dashboard/mesas')}}">Cancelar</a>
    <br>