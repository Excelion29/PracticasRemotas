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
      <a class="btn btn-success" href="{{url('dashboard/mesas/create')}}">Registrar nueva mesa</a>
    </div><!-- /.container-fluid -->
  </div>

<div class="card">
    <div class="card-body">
        <table id="example1"  class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nro de Mesa</th>
                <th>Capacidad</th>
                <th>Precio</th>
                <th>Administrador</th>
                <th>Foto</th>
                <th>Creada</th>
                <th>Actualizada</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mesas as  $id=>$mesa)
            <tr>
                <td>{{$id}}</td>
                <td>{{$mesa->nombre}}</td>
                <td>{{$mesa->capacidad}}</td>
                <td>S/.{{$mesa->precio}}</td>
                <td>{{$mesa->name}} {{$mesa->apellidos}}</td>
                <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$mesa->foto}}"  width="100" alt=""></td>
                <th>{{$mesa->date_created}}</th>
                <th>{{$mesa->updated_at}}</th>
                <td>
                    @if ($mesa->estado == 1)
                        <a class="btn btn-success" href="{{route('change.status.mesas',$mesa)}}">Activa</a>
                        @else
                        <a class="btn btn-danger" href="{{route('change.status.mesas',$mesa)}}">Inactiva</a>
                    @endif 
                </td>
                <td>
                    <a class="btn btn-warning" href="{{url('dashboard/mesas/'.$mesa->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                    
                    <form class="d-inline"  action="{{ url('dashboard/mesas/'.$mesa->id)}}" method="POST">
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
{!! $mesas->links() !!}
@endsection