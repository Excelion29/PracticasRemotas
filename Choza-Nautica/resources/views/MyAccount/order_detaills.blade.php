@extends('layouts.nav')

@section('title', 'Inicio' )

@section('content')
<link rel="stylesheet" href="{{asset('css/progressbarr.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href=https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container">
    <article class="card">
        <header class="card-header"> {{$empresa_provider->name_formal}} / {{$empresa_provider->telefono}} </header>
        <div class="card-body">
            <h6>Order ID: OD45345345435</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                    <div class="col"> <strong>Dirección :</strong> <br> </i>{{$orden->direccion}}, | <i class="fa fa-phone"></i>{{Auth::user()->cliente->celular}}</div>
                    <div class="col"> <strong>Estado Pago:</strong> <br> {{$orden->estado_pago}} </div>
                    <div class="col"> <strong>Código de verificación:</strong> <br> {{$orden->codigo}} </div>
                </div>
            </article>
            <div class="track">
                @if ($orden->estado == 'PENDIENTE')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Aprovado</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Pendiente</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">En Camino</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Entregado</span> </div>
                @else
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Aprovado</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Pendiente</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">En Camino</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Entregado</span> </div>
                @endif
            </div>
            <hr>
            <ul class="row">
                @foreach ($detalles as $key=>$detalle) 
                @if($detalle->id_producto!='')
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="{{asset('storage').'/'.$detalle->product->foto}}" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">{{$detalle->product->nombre}}<br> {{$detalle->cantidad}}</p> <span class="text-muted">S/.{{number_format($detalle->total(),2)}}</span>
                        </figcaption>
                    </figure>
                </li>
                @elseif($detalle->id_combo!='')
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="{{asset('storage').'/'.$detalle->combo->foto}}" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">{{$detalle->combo->nombre}}<br> {{$detalle->cantidad}}</p> <span class="text-muted">S/.{{number_format($detalle->total(),2)}}</span>
                        </figcaption>
                    </figure>
                </li>
                @endif
                @endforeach
            </ul>
            <article>
                <div class="card-body row">
                    <div class="col"> <strong>Cliente:</strong> <br>{{Auth::user()->name}}</div>
                    <div class="col"> <strong>Contacto :</strong> <br> {{Auth::user()->email}}</div>
                    <div class="col"> <strong>DNI:</strong> <br> {{Auth::user()->cliente->dni}} </div>
                </div>
            </article>
            <hr> <a href="{{route('my_orders') }}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
</div>
@endsection