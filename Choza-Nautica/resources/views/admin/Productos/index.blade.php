@extends('Admin.index')
@extends('layouts.js')
@section('template_title')
    Productos
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
<h1>Gestión de Productos</h1>
<a class="btn btn-success" href="{{url('dashboard/productos/create')}}">Registrar nuevo producto</a>
<br>
<br>

<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-striped table-bordered" style="width:100%">
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
                <td ><textarea name="summernote" id="summernote">{{$producto->descripcion}}</textarea></td>
                <script>
                $("#summernote").summernote({
                    height:120,
                    toolbar: false,
                    redonly:1,
                  });           
                </script>
                
                <td>{{$producto->precio}}</td>
                <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->foto}}"  width="100" alt=""></td>
                <td>{{$producto->categoria}}</td>
                <td>{{$producto->name}}</td>
                <th>{{$producto->created_at}}</th>
                <th>{{$producto->updated_at}}</th>
                <td>
                    <a class="btn btn-warning" href="{{url('dashboard/productos/'.$producto->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                    
                    <form class="d-inline"  action="{{ url('dashboard/productos/'.$producto->id)  }}" method="POST">
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
{!! $productos->links() !!}
</div>
@endsection