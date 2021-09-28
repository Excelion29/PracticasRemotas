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

{{-- diseño para no mostrar tooblar air --}}
<style>
    .note-popover .popover-content, .panel-heading.note-toolbar {
        display:none;
    }
</style>

<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Detalles</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Cantidad</th>
                <th>Categoría</th>
                <th>Administrador</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $id=>$producto)
            <tr>
                <td>{{$id}}</td>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->descripcion}}</td>
                <td><p name="detalles" id="detalles" class="detalles"></p></td>
                <td>{{$producto->precio}}</td>
                <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->foto}}"  width="100" alt=""></td>
                <td>{{$producto->cantidad}}</td>
                <td>{{$producto->categoria}}</td>
                <td>{{$producto->name}}</td>
                <td>{{$producto->created_at}}</td>
                <td>{{$producto->updated_at}}</td>
                <td>
                    @if ($producto->estado == 1)
                        <a class="btn btn-success" href="{{route('change.status.productos',$producto)}}">Activa</a>
                        @else
                        <a class="btn btn-danger" href="{{route('change.status.productos',$producto)}}">Inactiva</a>
                    @endif
                </td>
                <td>
                    <a class="btn btn-warning" href="{{url('dashboard/productos/'.$producto->id.'/edit')}}"><i class="fas fa-edit"></i></a>

                    <form class="d-inline"  action="{{ url('dashboard/productos/'.$producto->id)  }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estas seguro de borrarlo?')"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            <script>
                $('#detalles').summernote({
                //sacar el toolbar(barra de tareas)
                airMode :true,
                lang: "es-ES",
                });
                $('#detalles').summernote('disable');
                $('#detalles').summernote('code', {!! json_encode($producto->descripcion) !!});
            </script>
            @endforeach
        </tbody>
    </table>
</div>
{!! $productos->links() !!}
</div>

@endsection