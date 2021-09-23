<h1>{{$modo}} productos</h1>
@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
        
    @foreach ($errors->all() as $error)
    <li> {{$error}}</li>
    @endforeach

</ul>

@endif
</div>

<div class="col-md-12 col-lg-8">
    <div class="form-group">
        <label for="id_administrador">Admin</label>
        <input type="text" class="form-control" name="id_administrador" value="{{auth()->id()}}" id="id_administrador">
    </div>
</div>

<div class="col-md-12 col-lg-8">
    <div class="form-group">
        <label for="nombre">Productos</label>
        <input type="text" class="form-control" name="nombre" value="{{ isset($producto->nombre)?$producto->nombre:old('nombre')}}" id="nombre">
    </div>
</div>
<div class="col-md-12 col-lg-8">
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea type="text" class="form-control" name="descripcion" id="descripcion">{{ isset($producto->descripcion)?$producto->descripcion:old('descripcion')}}</textarea>
    </div>
</div>
<div class="col-md-12 col-lg-8">
    <div class="form-group">
        <label for="detalles">Descripción</label>
        <textarea type="text" class="form-control" name="detalles" id="detalles">{{ isset($producto->detalles)?$producto->detalles:old('detalles')}}</textarea>
    </div>
</div>
<script>
  $('#detalles').summernote({
    height: 300,
    lang: "es-ES", 
    toolbar: [
        [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        [ 'para', [ 'ol', 'ul']],
        [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
    ],
  });
</script>

<div class="col-md-12 col-lg-8">
    <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input type="text" class="form-control" name="cantidad" value="{{ isset($producto->cantidad)?$producto->cantidad:old('cantidad')}}" id="nombre">
    </div>
</div>

<div class="col-md-12 col-lg-8">
    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" class="form-control" name="precio" id="precio" value="{{ isset($producto->precio)?$producto->precio:old('precio')}}">
    </div>
</div>

<div class="col-md-12 col-lg-8">
    <div class="form-group">
        <label for="id_categoria ">Categoría</label>
        <select  class="form-control" name="id_categoria" id="id_categoria">
        @if(@isset($producto->id_categoria))
            <option value="{{$producto->id_categoria}}">Actual: {{$producto->categorianame}}</option>
            @foreach ($categorias as $categoria=>$value)
            <option value="{{$categoria}}">{{$value}}</option>
            @endforeach
        @else
            @foreach ($categorias as $categoria=>$value)
            <option value="{{$categoria}}">{{$value}}</option>
            @endforeach
        @endif
        </select>
    </div>
</div>

<div class="col-md-12 col-lg-8">
    <div class="form-group">
        @if(isset($producto->foto))
        <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->foto}}"  width="100" alt="" >
        <input type="file" class="form-control" name="foto" value='{{$producto->foto}}' id="foto">
        @else  
        <label for="foto">Imagen</label>
        <input type="file" class="form-control" name="foto" value='' id="foto">
        @endif
    </div>
</div>

<div class="col-md-12 col-lg-8">
    <input class="btn btn-success" type="submit" name="enviar" value="{{$modo}}"  id="enviar">
    <a class="btn btn-primary" href="{{url('dashboard/productos')}}">Cancelar</a>
    <br>
</div>