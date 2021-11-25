@extends('Admin.index')

@section('template_title')
    Combos
@endsection
@section('content')

<div class="alert alert-succes alert-dismissible" role="alert">
    @if(Session::get('mensaje')){{
     Session::get('mensaje')
     }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
     @else 
     @endif
</div>

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Gestión de combos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Combos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <a class="btn btn-success" href="{{url('dashboard/combos/create')}}">Registrar nuevos combo</a>
    </div><!-- /.container-fluid -->
  </div>
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Combo</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Administrador</th>
                        <th>Imagen</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($combos as $id=>$combo)
                    <tr>
                        <td>{{$id}}</td>
                        <td>{{$combo->nombre}}</td>
                        <td>{{substr($combo->descripcion,0,80)}}......</td>
                        <td>S/.{{$combo->precio}}</td>
                        <td>{{$combo->name}} {{$combo->apellidos}}</td>
                        <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$combo->foto}}" width="80px"></td>
                        <td>{{$combo->date_created}}</td>
                        <td>{{$combo->updated_at}}</td>
                        <td>
                            @if ($combo->estado == 1)
                                <a class="btn btn-success" href="{{route('change_status.combos',$combo)}}">Activa</a>
                                @else
                                <a class="btn btn-danger" href="{{route('change_status.combos',$combo)}}">Inactiva</a>
                            @endif 
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route('combos_prod.edit',$combo)}}"><i class="fas fa-edit"></i></a>
                            <form class="d-inline"  action="{{ url('dashboard/combos/'.$combo->id)}}" method="POST">
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
    {!! $combos->links() !!}
</div>
@endsection
