@extends('Admin.index')
@section('template_title')
Productos
@endsection
@section('content')
@extends('layouts.js')
<div class="alert alert-succes alert-dismissible" role="alert">
    @if(Session::get('mensaje')){{
        Session::get('mensaje')
    }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @endif
</div>

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Gestión de productos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Productos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <a class="btn btn-success" href="{{url('dashboard/productos/create')}}">Registrar nuevo producto</a>
    </div><!-- /.container-fluid -->
  </div>

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
                <td>{{substr($producto->descripcion,0,80)}}......</td>
                <td><p name="detalles" id="detalles_{{$id}}_DESC" class="detalles"></p></td>
                <script>
                    $('#detalles_{{$id}}_DESC').summernote({
                    //sacar el toolbar(barra de tareas)
                    airMode :true,
                    lang: "es-ES",
                    });
                    $('#detalles_{{$id}}_DESC').summernote('disable');
                    $('#detalles_{{$id}}_DESC').summernote('code', {!! json_encode($producto->descripcion) !!});
                </script>
                <td>S/.{{$producto->precio}}</td>
                <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$producto->foto}}"  width="100" alt=""></td>
                <td>
                    <div class="form-group" id="cant_{{$id}}">
                        {{$producto->cantidad}}
                        <a style="float:right;" href="#" id="add_{{$id}}"><i class="fas fa-plus"></i>
                        </a>
                    </div>
                    <div class="form-group form_add" id="form_{{$id}}">
                        <form action="{{route('productos.add_stock',$producto)}}" method="POST" >
                            @csrf    
                            <label for="cantidad">Añadir al carrito</label>
                            <input type="hidden" name='id' value="{{$producto->id}}">
                            <input type="number" style="width:80%;" name='cantidad' id="name">
                            <button style="float:right;" type="submit" href="#" id="close_{{$id}}"><i class="fas fa-calculator"></i></button>
                        </form>
                    </div>
                    <script>
                        	$(document).ready(function(){
                                $("#add_{{$id}}").on( "click", function() {
                                    $('#form_{{$id}}').show(); //muestro mediante id
                                    $('#cant_{{$id}}').hide(); //oculto mediante id
                                });
                                $("#close_{{$id}}").on( "click", function() {
                                    $('#form_{{$id}}').hide(); //oculto mediante id
                                    $('#cant_{{$id}}').show(); //muestro mediante clase
                                });
                            });
                    </script>
                </td>
                <td>{{$producto->categoria}}</td>
                <td>{{$producto->name}} {{$producto->apellidos}}</td>
                <td>{{$producto->date_created}}</td>
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
            @endforeach
        </tbody>
    </table>
</div>
{!! $productos->links() !!}
</div>

<style>
    .form_add{
        display:none;
    }
</style>

@endsection