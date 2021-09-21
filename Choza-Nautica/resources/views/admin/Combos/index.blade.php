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

        <h1>Gestión de Combos</h1>
        <a class="btn btn-success" href="{{url('dashboard/combos/create')}}">Registrar nuevos combo</a>
        <br>
        <br>
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
                    @foreach ($combos as  $id=>$combo)
                    <tr>
                        <td>{{$id}}</td>
                        <td>{{$combo->nombre}}</td>
                        <td>{{$combo->descripcion}}</td>
                        <td>{{$combo->precio}}</td>
                        <td>{{$combo->name}}</td>
                        <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$combo->foto}}" width="80px"></td>
                        <td>{{$combo->created_at}}</td>
                        <td>{{$combo->updated_at}}</td>
                        <td>
                            @if ($combo->estado == 1)
                                <a class="btn btn-success" href="{{route('change.status.combos',$combo)}}">Activa</a>
                                @else
                                <a class="btn btn-danger" href="{{route('change.status.combos',$combo)}}">Inactiva</a>
                            @endif 
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{url('dashboard/combos/'.$combo->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                            <form class="d-inline"  action="{{ url('dashboard/combos/'.$combo->id)  }}" method="POST">
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
