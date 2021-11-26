@extends('Admin.index')

@section('template_title')
    Delivery
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
          <h1 class="m-0 text-dark">Gestión de combos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Delivery</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <a class="btn btn-success" href="{{url('dashboard/Delivery/create')}}">Registrar nueva Distrito</a>
    </div><!-- /.container-fluid -->
</div>
<div class="card">
    <div class="card-body">
        <table id="example1"  class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Distrito</th>
                <th>Precio</th>                
                <th>Administrador</th>
                <th>Creada</th>
                <th>Actualizada</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Costo_x_deliverys as  $id=>$Costo_x_delivery)
            <tr>
                <td>{{$id}}</td>
                <td>{{$Costo_x_delivery->Distrito}}</td>
                <td>S/.{{$Costo_x_delivery->precio}}</td>
                <td>{{$Costo_x_delivery->name}}</td>
                <td>{{$Costo_x_delivery->date_created}}</td>
                <td>{{$Costo_x_delivery->updated_at}}</td>
                <td>
                    @if ($Costo_x_delivery->estado == 1)
                        <a class="btn btn-success" href="{{route('change.status.delivery',$Costo_x_delivery)}}">Activa</a>
                        @else
                        <a class="btn btn-danger" href="{{route('change.status.delivery',$Costo_x_delivery)}}">Inactiva</a>
                    @endif
                </td>
                <td>
                    <a class="btn btn-warning" href="{{url('dashboard/Delivery/'.$Costo_x_delivery->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                    
                    <form class="d-inline"  action="{{ url('dashboard/Delivery/'.$Costo_x_delivery->id)}}" method="POST">
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
{!! $Costo_x_deliverys->links() !!}
@endsection