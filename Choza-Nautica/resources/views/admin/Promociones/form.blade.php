<div class="modal-header">
    <h1>{{$modo}} promocion</h1>
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
<input type="hidden" class="form-control" name="id" value="{{ isset($promocione->id)?$promocione->id:old('id')}}" id="id">

<div class="form-group">
    <label for="nombre">Nombre de la Promoción</label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($promocione->nombre)?$promocione->nombre:old('nombre')}}" id="nombre">
</div>   

<label for="descuento">Tipo de descuento</label>
<div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-check">
            <input class="form-check-input" id="descuento_por" onclick="mostrar_por()" type="radio" name="tipo" value="descuento" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">Descuento porcentaje
            </label>
        </div>
        <div class="form-group" id="desc_po" style="display: none">
            <input type="text" class="form-control" name="descuento" value="{{ isset($promocione->descuento)?$promocione->descuento:old('descuento')}}" id="descuento"> 
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="form-check">
            <input class="form-check-input"  id="descuento_fij"  onclick="mostrar_desc()" type="radio" name="tipo" value="descuento_fijo" name="tipo" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                Descuento fijo
            </label>
        </div>
        <div class="form-group" id="desc_fij" style="display: none">
            <input type="text" class="form-control" name="descuento_fijo" value="{{isset($promocione->descuento_fijo)?$promocione->descuento_fijo:old('descuento_fijo')}}" id="descuento_fijo">
        </div>
    </div>
</div>



<div class="form-row">
    <div class="form-group col-md-6">
        <label for="fecha_inicio">Inicio</label>
        <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ isset($promocione->fecha_inicio)?$promocione->fecha_inicio:old('fecha_inicio')}}">
    </div>
    <div class="form-group col-md-6">
        <label for="fecha_inicio">Final</label>
        <input type="text" class="form-control" name="fecha_final" id="fecha_final" value="{{ isset($promocione->fecha_final)?$promocione->fecha_final:old('precio')}}">
    </div>
</div>


<div class="form-group">
    <label for="">Productos de la promoción</label>
    
    <select name="productos[]" class="form-control" data-selected-text-format ="count > 4" title="Seleccione los productos que llevarán esta promoción" data-actions-box="true" data-size="5"  data-live-search="true" id="my-select" multiple>
            @foreach ($productos as $producto)
                <option value="{{$producto->id}}"{{collect(old('productos_id',$promocione->productos->pluck('id')))->contains($producto->id)?'selected':''}}>
                    {{$producto->nombre}}</option>
            @endforeach
    </select>
</div>

<div class="modal-footer">
    <input class="btn btn-success" type="submit" name="enviar" value="{{$modo}}"  id="enviar">
    <a class="btn btn-primary" href="{{url('dashboard/promociones')}}">Cancelar</a>
    <br>
</div>

@push('js')   
<script src="{{asset('bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js')}}"></script>
<script>
    $('#my-select').selectpicker();
</script>
<script>
    if (document.getElementById('descuento_fijo').value  != "") {
        mostrar_desc()
        document.getElementById('descuento_fij').checked = true;
    }
    if (document.getElementById('descuento').value != "") {
        mostrar_por()
        document.getElementById('descuento_por').checked = true;
    }
    function mostrar_por() {
        document.getElementById('desc_po').style.display = 'block';
        document.getElementById('desc_fij').style.display = 'none';
        if (document.getElementById('descuento_fijo').value  == "") {
            document.getElementById('descuento_fijo').value = "";
        }
        else{
            document.getElementById('descuento_fijo').value = "{{$promocione->descuento_fijo}}";
        }   
    }
    function mostrar_desc() {
        document.getElementById('desc_po').style.display = 'none';
        document.getElementById('desc_fij').style.display = 'block';
        if (document.getElementById('descuento').value == "") {
            document.getElementById('descuento').value = "";
        }
        else{
            document.getElementById('descuento').value = "{{$promocione->descuento}}";
        }
    }</script>
@endpush