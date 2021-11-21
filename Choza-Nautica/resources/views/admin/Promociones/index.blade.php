@extends('Admin.index')
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

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <a class="btn btn-success" href="{{url('dashboard/promociones/create')}}">Registrar nuevo promocion</a>
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
                <th>Promoción</th>
                <th>Descuento</th>
                <th>Descuento fijo</th>
                <th>Inicio</th>
                <th>Final</th>
                <th>Administrador</th>
                <th>Estado</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($promociones as $id=>$promocion)
            <tr>
                
                <td>{{$id}}</td>
                <td>{{$promocion->nombre}}</td>
                <td>{{$promocion->descuento}}</td>
                <td>{{$promocion->descuento_fijo}}</td>
                <td>{{$promocion->fecha_inicio}}</td>
                <td>{{$promocion->fecha_final}}</td>
                <td>{{$promocion->user->name}} {{$promocion->user->apellidos}}</td>
                <td><span class="badge badge-{{$promocion->promocion_estado()['color']}}">{{$promocion->promocion_estado()['text']}}</span></td>
                <td>{{$promocion->date_created}}</td>
                <td>{{$promocion->updated_at}}</td>
                <td>
                    <a class="btn btn-warning" href="{{route('promociones.edit',$promocion)}}"><i class="fas fa-edit"></i></a>

                    <form class="d-inline"  action="{{ url('dashboard/promociones/'.$promocion->id)  }}" method="POST">
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
{!! $promociones->links() !!}
</div>

@endsection