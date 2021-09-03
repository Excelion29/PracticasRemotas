@extends('Admin.index')

@section('template_title')
    Usuarios
@endsection

@section('content')
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Nro. Celular</th>
                    <th>Email</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->apellidos}}</td>
                        <td>{{$user->celular}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td class="bg-primary">{{$user->nombre}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
