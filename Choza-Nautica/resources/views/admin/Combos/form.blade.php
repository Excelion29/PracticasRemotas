<h1>{{$modo}} combos</h1>

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
    <label for="nombre">Combo</label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($combos->nombre)?$combos->nombre:old('nombre')}}" id="nombre">
</div>

<div class="form-group">
    <label for="descripcion">Descripción</label>
    <textarea type="text" class="form-control" name="descripcion" id="descripcion">{{ isset($combos->descripcion)?$combos->descripcion:old('descripcion')}}</textarea>
</div>

<div class="form-group">
    <label for="precio">Precio</label>
    <input type="text" class="form-control" name="precio" value="{{ isset($combos->precio)?$combos->precio:old('precio')}}" id="precio">
</div>

<div class="form-group">
    @if(isset($combos->foto))
    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$combos->foto}}"  width="100" alt="" >
    <input type="file" class="form-control" name="foto" value='{{$combos->foto}}' id="foto">
    @else  
    <label for="foto">Imagen</label>
    <input type="file" class="form-control" name="foto" value='' id="foto">
    @endif
</div>


    <input class="btn btn-success" type="submit" name="enviar" value="{{$modo}}"  id="enviar">
    <a class="btn btn-primary" href="{{url('dashboard/combos')}}">Cancelar</a>
    <br>