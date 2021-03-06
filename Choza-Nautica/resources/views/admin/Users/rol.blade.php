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
            <h1 class="m-0 text-dark">Gestión de {{$rol}}</h1>    
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">{{$rol}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <a class="btn btn-success" onclick="mostrarregistro()">Registrar nuevo {{$rol}}</a>
    </div><!-- /.container-fluid -->
  </div>
   
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Rol</th>                    
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>                        
                        <td style="background:{{$modo}}; color:white;">{{$user->nombre}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->apellidos}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <form class="d-inline"  action="{{ url('dashboard/'.$rol.'/'.$user->id)  }}" method="POST">
                                @csrf    
                                {{method_field('PATCH')}}
                                <input type="hidden" value="0" id="estado" name="estado">
                                <button class="btn btn-danger" type="submit" name="enviar" id="enviar" onclick="return confirm('¿Estas seguro de borrarlo?')"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {!! $users->links() !!}
</div>
<div class="modal" id="modal">
    <div class="modalcrear" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;" >
        <div class="container" id="container">
            <div class="modal-header">
                <h5 class="modal-title">Gestiónn {{$rol}}</h5>
                <button type="button" onclick="ocultarrregistro()" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <br>
                <form method="POST" enctype="multipart/form-data">
                    @csrf 
                        @if(count($errors)>0)

                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    
                                @foreach ($errors->all() as $error)
                                <li> {{$error}}</li>
                                @endforeach

                                
                            </ul>
                        </div>
                            @endif
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" value="{{ isset($users->name)?$users->name:old('name')}}" id="name" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" value="{{ isset($users->apellidos)?$users->apellidos:old('apellidos')}}" id="apellidos" required>
                            </div>
                        </div>

                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Correo</label>
                                <input type="text" class="form-control" name="email" value="{{ isset($users->email)?$users->email:old('email')}}" id="email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Constraseña</label>
                                <input type="password" class="form-control" name="password" value="{{ isset($users->password)?$users->password:old('password')}}" id="password" required>
                            </div>
                        </div>
                        
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="id_rol" value="{{$id}}" id="id_rol">
                        <input class="btn btn-success" type="submit" name="enviar" value="Crear"  id="enviar">
                        <a class="btn btn-primary" href="{{url('dashboard/'.$rol)}}">Cancelar</a>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function mostrarregistro() {
            document.getElementById('modal').style.display = 'block';
        }
        function ocultarrregistro() {
            document.getElementById('modal').style.display = 'none';
        }
    </script>
    <style>
        .modal{            
            height: 100vh;
            background-color: rgba(44, 40, 40, 0.425);
            /*IMPORTANTE*/
            justify-content: center;
            align-items: center;   
            display: none;
        }
        .modalcrear{
            background: white;
            border-radius: 5px;
            margin-top: 5%; /* Buscamos el centro horizontal (relativo) del navegador */
            width: 50%; /* Definimos el ancho del objeto a centrar */
            margin-right: auto; /* Restamos la mitad de la altura del objeto con un margin-top */
            margin-left: auto; /* Restamos la mitad de la anchura del objeto con un margin-left */
        }
        .form-group{
            width: 80%;
            margin-right: auto; /* Restamos la mitad de la altura del objeto con un margin-top */
            margin-left: auto; /* Restamos la mitad de la anchura del objeto con un margin-left */
        }
    </style>
@endsection
