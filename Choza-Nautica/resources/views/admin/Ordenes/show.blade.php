@extends('Admin.index')

@section('template_title')
    Ordenes Detalles
@endsection

@section('content')
<h1>Detalles de la orden</h1>
<br>
<br>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i>{{$empresa->name}}
                  <small class="float-right">{{$compra->created_at}}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Empresa
                <address>
                  <strong>{{$empresa->name_formal}}</strong><br>
                  {{$empresa->direccion}}<br>
                  Contacto: {{$empresa->telefono}}<br>
                  Correo: {{$empresa->correo}}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Cliente
                <address>
                  <strong>{{$user->name}} {{$user->apellidos}}</strong><br>                  
                  {{$user->cliente->direccion}}<br>
                  Contacto: {{$user->cliente->celular}}<br>
                  Correo: {{$user->email}}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Invoice #007612</b><br>
                <br>
                <b>Código:</b>{{$compra->codigo}}<br>
                <b>Estado del pago:</b>{{$compra->estado_pago}}<br>
                <b>Fecha:</b>{{$compra->created_at}}
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Item</th>
                    <th>Product</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($detalles as $key=>$detalle) 
                      <tr>
                        <td>{{$key}}</td>
                        @if($detalle->id_producto!='')
                        <td>{{$detalle->product->nombre}}</td>
                        @elseif($detalle->id_combo!='')
                        <td>{{$detalle->combo->nombre}}</td>
                        @endif
                        <td>{{$detalle->cantidad}}</td>
                        <td>S/.{{number_format($detalle->total(),2)}}</td>
                        <td></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                <p class="lead">Payment Methods:</p>
                <img style="width: 5%;" src="{{asset('img/visa.png')}}" alt="Visa">
                <img style="width: 5%;" src="{{asset('img/mastercard.png')}}" alt="Mastercard">
                <img style="width: 5%;" src="{{asset('img/american-express.png')}}" alt="American Express">
                <img style="width: 5%;" src="{{asset('img/paypal2.png')}}" alt="Paypal">

                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                  plugg
                  dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                </p>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td>S/.{{number_format($compra->subtotal(),2)}}</td>
                    </tr>
                    <tr>
                      <th>Impuesto ({{$compra->impuesto}}%)</th>
                      <td>S/.{{number_format($compra->total_impuesto(),2)}}</td>
                    </tr>
                    <tr>
                      <th>Shipping:</th>
                      <td>{{$compra->estado_pago}}</td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td>S/.{{number_format($compra->total(),2)}}</td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                  Payment
                </button>
                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                  <i class="fas fa-download"></i> Generate PDF
                </button>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
<!-- ./wrapper -->

@endsection
