@extends('Admin.index')

@section('template_title')
    Combos
@endsection

@section('content')
<h1>Gestión de Combos</h1>

<div class="alert alert-succes alert-dismissible" role="alert">
@if(Session::get('mensaje')){{
    Session::get('mensaje')
}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@else
@endif

<a class="btn btn-success" href="{{url('dashboard/combos/create')}}">Registrar nuevos combo</a>
<br>
<br>
<div class="container-fluid">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Combo</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Administrador</th>
                <th>Imagen</th>
                <th>Creación</th>
                <th>Actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($combos as $combo)
            <tr>
                <td>{{$combo->nombre}}</td>
                <td>{{$combo->descripcion}}</td>
                <td>{{$combo->precio}}</td>
                <td>{{$combo->name}}</td>
                <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$combo->foto}}"  width="100" alt=""></td>
                <th>{{$combo->created_at}}</th>
                <th>{{$combo->updated_at}}</th>
                <td>
                    <a class="btn btn-warning" href="{{url('dashboard/combos/'.$combo->id.'/edit')}}">Editar</a>
                    
                    <form class="d-inline"  action="{{ url('dashboard/combos/'.$combo->id)  }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Estas seguro de borrarlo?')" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
{!! $combos->links() !!}
</div>
@endsection