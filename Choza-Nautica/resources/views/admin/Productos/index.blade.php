@extends('Admin.index')

@section('template_title')
    Productos
@endsection

@section('content')
<h1>Gestión de Productos</h1>
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
{{-- <a class="btn btn-success" href="{{url('dashboard/categorias/create')}}">Registrar nueva categoría</a> --}}
<br>
<br>
<div class="container-fluid">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Categoría</th>
                <th>Administrador</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio}}</td>
                <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->foto}}"  width="100" alt=""></td>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->name}}</td>
                <th>{{$producto->created_at}}</th>
                <th>{{$producto->updated_at}}</th>
                <td>
                    {{-- <a class="btn btn-warning" href="{{url('dashboard/categorias/'.$categoria->id.'/edit')}}">Editar</a>
                    
                    <form class="d-inline"  action="{{ url('dashboard/categorias/'.$categoria->id)  }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Estas seguro de borrarlo?')" value="Borrar">
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
{!! $productos->links() !!}
</div>
@endsection