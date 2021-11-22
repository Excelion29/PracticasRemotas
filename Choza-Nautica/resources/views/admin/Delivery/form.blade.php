
<div class="modal-header">
    <h1>{{$modo}} delivery por distrito</h1>
</div>
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
    <label for="Distrito">Distrito</label>
    <input type="text" class="form-control" name="Distrito" value="{{ isset($delivery->Distrito)?$delivery->Distrito:old('Distrito')}}" id="Distrito">
</div>
<div class="form-group">
    <label for="precio">Precio</label>
    <input type="number" class="form-control" name="precio" value="{{ isset($delivery->precio)?$delivery->precio:old('precio')}}" id="precio">
</div>


<div class="modal-footer">
    <input class="btn btn-success" type="submit" name="enviar" value="{{$modo}}"  id="enviar">
    <a class="btn btn-primary" href="{{url('dashboard/Delivery')}}">Cancelar</a>
    <br>
</div>