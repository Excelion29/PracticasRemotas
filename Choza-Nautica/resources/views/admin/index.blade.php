@extends('adminlte::page')
@section('title', 'Dashboard')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.cs">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('css/switch.css')}}">

{{-- Notificación carritos y shops --}}
    <ul class="navbar-nav ml-auto" style="z-index:190000;left: 1400px;
    top: 8px;position:absolute;display:flex;float:right;">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">
                {{auth()->user()->unreadNotifications()->count()}}
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">{{auth()->user()->unreadNotifications()->count()}} Notifications nuevas</span>
          @foreach (auth()->user()->unreadNotifications as $notification)
          <div class="dropdown-divider"></div>
            @if (auth()->user()->unreadNotifications()->count()>0) 
                <a href="{{route('mark_a_notifications',[$notification->id,$notification->data['id']])}}" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <i class="{{$notification->data['icon']}}"></i>
                        {{$notification->data['title']}}
                        <span class="float-right text-muted text-sm">{{$notification->data['name']}} realizó un pedido de {{$notification->data['total']}}</span>
                    </div>
                </a>
            @endif
          @endforeach
          {{-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a> --}}
          <div class="dropdown-divider"></div>
          <a href="{{route('mark_all_notifications')}}" class="dropdown-item dropdown-footer">Ver Todo</a>
        </div>
      </li>
    </ul>
    
{{--End Notificación carritos y shops --}}
@endsection
@section('content')

@endsection
@section('js')  
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script>
        $('#example1').DataTable({
            responsive: true
        });
    </script>
    
    <script src="{{asset('js/jqueryui-editable.js')}}"></script>
    <script src="{{asset('js/jqueryui-editable.min.js')}}"></script>
    <script>
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type: "PUT"};
        $('.editable').editable({
        source: [
          {value: 'PENDIENTE', text: 'PENDIENTE'},
          {value: 'VÁLIDO', text: 'VÁLIDO'},
          {value: 'EN CAMINO', text: 'EN CAMINO'},
          {value: 'ENTREGADO', text: 'ENTREGADO'},
          {value: 'CANCELADO', text: 'CANCELADO'}
        ],
        });
    </script>
@endsection

