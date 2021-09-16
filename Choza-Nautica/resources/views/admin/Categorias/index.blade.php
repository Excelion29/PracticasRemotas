@extends('Admin.index')

@section('template_title')
    Categorias
@endsection

@section('content')
<div class="alert alert-succes alert-dismissible" role="alert">
    @if(Session::get('mensaje')){{
        Session::get('mensaje')
    }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @endif
</div>

<h1>Gestión de Categorias</h1>
<a class="btn btn-success" href="{{url('dashboard/categorias/create')}}">Registrar nueva categoría</a>
<br>
<br>

<div class="card">
    <div class="card-body">
        <table id="example1"  class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead class="thead-dark">
            <tr>
                <th>Categorias</th>
                <th>Descripción</th>
                <th>Administrador</th>
                <th>Imagen</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr>
                <td>{{$categoria->nombre}}</td>
                <td>{{$categoria->descripcion}}</td>
                <td>{{$categoria->name}}</td>
                <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$categoria->foto}}"  width="100" alt=""></td>
                <th>{{$categoria->created_at}}</th>
                <th>{{$categoria->updated_at}}</th>
                <td>
                    <a class="btn btn-warning" href="{{url('dashboard/categorias/'.$categoria->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                    
                    <form class="d-inline"  action="{{ url('dashboard/categorias/'.$categoria->id)}}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estas seguro de borrarlo?')"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
{!! $categorias->links() !!}
@endsection

