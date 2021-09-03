@extends('Admin.index')

@section('template_title')
    Categorias
@endsection

@section('content')
<h1>Gestión de Categorias</h1>

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

<a class="btn btn-success" href="{{url('dashboard/categorias/create')}}">Registrar nueva categoría</a>
<br>
<br>
<div class="container-fluid">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Categorias</th>
                <th>Descripción</th>
                <th>Imagen</th>

                <th>Acciones</th>
                <th>Productos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr>
                <td>{{$categoria->nombre}}</td>
                <td>{{$categoria->descripcion}}</td>
                <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$categoria->foto}}"  width="100" alt=""></td>
                <td>
                    <a class="btn btn-warning" href="{{url('dashboard/categorias/'.$categoria->id.'/edit')}}">Editar</a>
                    
                    <form class="d-inline"  action="{{ url('dashboard/categorias/'.$categoria->id)  }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Estas seguro de borrarlo?')" value="Borrar">
                    </form>
                </td>
                <td>
                    <a class="btn btn-info" href="#">Productos</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
{!! $categorias->links() !!}
</div>
@endsection