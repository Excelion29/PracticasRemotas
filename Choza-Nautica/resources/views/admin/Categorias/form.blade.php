<div class="modal-header">
    <h1>{{$modo}} categorias</h1>
</div>
@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
        
    @foreach ($errors->all() as $error)
    <li> {{$error}}</li>
    @endforeach

</ul>

</div>
@endif

<input type="hidden" class="form-control" name="id_administrador" value="{{auth()->id()}}" id="id_administrador">



<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nombre">Categoría</label>
        <input type="text" class="form-control" name="nombre" value="{{ isset($categoria->nombre)?$categoria->nombre:old('nombre')}}" id="nombre">
    </div>
    <div class="form-group col-md-6">
        @if(isset($categoria->foto))
        <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$categoria->foto}}"  width="100" alt="" >
        <input type="file" class="form-control" name="foto" value='{{$categoria->foto}}' id="foto">
        @else  
        <label for="foto">Imagen </label>
        <input type="file" class="form-control" name="foto" value='' id="foto">
        @endif
    </div>
</div>

<div class="form-row">
    <label for="descripcion">Descripción</label>
    <textarea type="text" class="form-control" name="descripcion" id="descripcion">{{ isset($categoria->descripcion)?$categoria->descripcion:old('descripcion')}}</textarea>
</div>


<div class="modal-footer">
    <input class="btn btn-success" type="submit" name="enviar" value="{{$modo}}"  id="enviar">
    <a class="btn btn-primary" href="{{url('dashboard/categorias')}}">Cancelar</a>
    <br>
</div>