
<div class="modal-header">
    <h1>{{$modo}} productos</h1>
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
        <label for="nombre">Nombre del plato</label>
        <input type="text" class="form-control" name="nombre" value="{{ isset($producto->nombre)?$producto->nombre:old('nombre')}}" id="nombre">
    </div>
    <div class="form-group col-md-6">
        <label for="id_categoria">Categoría</label>
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

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="cantidad">Cantidad</label>
        <input type="number" class="form-control" name="cantidad" value="{{ isset($producto->cantidad)?$producto->cantidad:old('cantidad')}}" id="nombre">
        <label for="precio">Precio</label>
        <input type="number" class="form-control" name="precio" id="precio" value="{{ isset($producto->precio)?$producto->precio:old('precio')}}">
    </div>
    <div class="form-group col-md-6">
        <label for="descripcion">Descripción</label>
        <textarea type="text" style="height: 80%;" class="form-control" name="descripcion" id="descripcion">{{ isset($producto->descripcion)?$producto->descripcion:old('descripcion')}}</textarea>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="detalles">Detalles</label>
        <textarea type="text" class="form-control" name="detalles" id="detalles">{{ isset($producto->detalles)?$producto->detalles:old('detalles')}}</textarea>
    </div>
    <script>
        $('#detalles').summernote({
          height: 245,
          lang: "es-ES", 
          toolbar: [
              [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
              [ 'para', [ 'ol', 'ul']],
              [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
          ],
        });
      </script>
    <div class="form-group col-md-6">
        @if(isset($producto->foto))
        <label>Galería</label><br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="foto">Imagen Principal</label><br>
                    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->foto}}"  width="100" alt="" >
                    <input type="file" class="form-control" name="foto" value='{{$producto->foto}}' id="foto">
                </div>
                <div class="form-group col-md-6">
                    <label for="foto2">Imagen 02</label><br>
                    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->foto2}}"  width="100" alt="" >
                    <input type="file" class="form-control" name="foto2" value='{{$producto->foto2}}' id="foto2">
                </div>
                <div class="form-group col-md-6">
                    <label for="foto3">Imagen 03</label><br>
                    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->foto3}}"  width="100" alt="" >
                    <input type="file" class="form-control" name="foto3" value='{{$producto->foto3}}' id="foto3">
                </div>
            </div>
            @else  
            <label>Galería</label><br>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="foto">Imagen Principal</label>
                    <input type="file" class="form-control" name="foto" value='' id="foto">
                </div>
                <div class="form-group col-md-6">
                    <label for="foto2">Imagen 02</label>
                    <input type="file" class="form-control" name="foto2" value='' id="foto2">
                </div>
                <div class="form-group col-md-6">
                    <label for="foto3">Imagen 03</label>
                    <input type="file" class="form-control" name="foto3" value='' id="foto3">
                </div>
            </div>
            @endif
    </div>
</div>



<div class="modal-footer">
    <input class="btn btn-success" type="submit" name="enviar" value="{{$modo}}"  id="enviar">
    <a class="btn btn-primary" href="{{url('dashboard/productos')}}">Cancelar</a>
</div> 
