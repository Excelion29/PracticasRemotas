<div class="modal-header">
    <h1>{{$modo}} combo</h1>
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

<link rel="stylesheet" href="{{asset('bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css')}}">


<input type="hidden" class="form-control" name="id_administrador" value="{{auth()->id()}}" id="id_administrador">


<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nombre">Combo</label>
        <input type="text" class="form-control" name="nombre" value="{{ isset($combo->nombre)?$combo->nombre:old('nombre')}}" id="nombre">
    </div> 
    <div class="form-group col-md-6">
        <label for="precio">Precio</label>
        <input type="number" class="form-control" name="precio" value="{{ isset($combo->precio)?$combo->precio:old('precio')}}" id="precio">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="descripcion">Descripción</label>
        <textarea type="text" class="form-control" name="descripcion" id="descripcion">{{ isset($combo->descripcion)?$combo->descripcion:old('descripcion')}}</textarea>
    </div>
    <div class="form-group col-md-6">
        @if(isset($combo->foto))
            <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$combo->foto}}"  width="100" alt="" >
            <input type="file" class="form-control" name="foto" value='{{$combo->foto}}' id="foto">
        @else  
            <label for="foto">Imagen</label>
            <input type="file" class="form-control" name="foto" value='' id="foto">
        @endif
    </div>
</div>

<div class="form-group">
    <label for="">Productos para el combo</label>
    <select name="productos[]" class="form-control" data-selected-text-format ="count > 4" title="Seleccione los productos que llevarán esta promoción" data-actions-box="true" data-size="5"  data-live-search="true" id="my-select" multiple>
            @foreach ($productos as $producto)
                <option value="{{$producto->id}}"{{collect(old('productos_id',$combo->productos->pluck('id')))->contains($producto->id)?'selected':''}}>
                    {{$producto->nombre}}</option>
            @endforeach
    </select>
</div>

<div class="modal-footer">
    <input class="btn btn-success" type="submit" name="enviar" value="{{$modo}}"  id="enviar">
    <a class="btn btn-primary" href="{{url('dashboard/combos')}}">Cancelar</a>
    <br>
</div>

@push('js')
<script src="{{asset('bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js')}}"></script>
<script>
    $('#my-select').selectpicker();
</script>
@endpush