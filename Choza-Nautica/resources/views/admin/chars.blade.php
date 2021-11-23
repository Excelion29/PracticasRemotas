@extends('Admin.index')

@section('template_title')
    Productos
@endsection
@section('content')


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
    </div><!-- /.container-fluid -->
  </div>

<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>150</h3>

          <p>New Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>44</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Informe de recapitulación mensual de productos</h5>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-wrench"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" role="menu">
                <a href="#" class="dropdown-item">Action</a>
                <a href="#" class="dropdown-item">Another action</a>
                <a href="#" class="dropdown-item">Something else here</a>
                <a class="dropdown-divider"></a>
                <a href="#" class="dropdown-item">Separated link</a>
              </div>
            </div>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <p class="text-center">
                <strong>Compras: 
                  @php
                    $fecha_actual = date("d-m-Y");
                    echo date("d-m-Y",strtotime($fecha_actual."- 6 month")); 
                    echo ' - ';
                    echo date("d-m-Y",strtotime($fecha_actual));
                  @endphp
                </strong>
              </p>

              <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <!-- Sales Chart Canvas -->
                <canvas id="myChart" style="height: 180px; display: block; width: 795px;" class="chartjs-render-monitor" width="795" height="250"></canvas>
                <div id="mes_data" data-data=@json($data)></div>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <p class="text-center">
                <strong>Productos Destacados</strong>
              </p>
              <div class="progress-group">
                <canvas id="myChart_pie" style="height: 180px; display: block; width: 740px;" class="chartjs-render-monitor" width="795" height="250"></canvas>
                <div id="mes_data_prod_desc" data-data=@json($data_prod_desc)></div>
              </div>
              <!-- /.progress-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>  

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Informe de recapitulación mensual de compras</h5>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-wrench"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" role="menu">
                <a href="#" class="dropdown-item">Action</a>
                <a href="#" class="dropdown-item">Another action</a>
                <a href="#" class="dropdown-item">Something else here</a>
                <a class="dropdown-divider"></a>
                <a href="#" class="dropdown-item">Separated link</a>
              </div>
            </div>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <p class="text-center">
                <strong>Compras: 
                  @php
                    $fecha_actual = date("d-m-Y");
                    echo date("d-m-Y",strtotime($fecha_actual."- 6 month")); 
                    echo ' - ';
                    echo date("d-m-Y",strtotime($fecha_actual));
                  @endphp
                </strong>
              </p>

              <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <!-- Sales Chart Canvas -->
                <canvas id="myChart2" style="height: 180px; display: block; width: 795px;" class="chartjs-render-monitor" width="795" height="250"></canvas>
                <div id="mes_data_prod" data-data=@json($data_prod)></div>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <p class="text-center">
                <strong>Goal Completion</strong>
              </p>

              <div class="progress-group">
                Productos añadidos al carrito
                @if ($porcentaje['productos_compras']->ordersdetallesprod !=0)
                <span class="float-right"><b>{{$porcentaje['productos_compras']->ordersdetallesprod}}</b>/{{$porcentaje['productos_compras']->ordersdetalles}}</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" style="width: {{($porcentaje['productos_compras']->ordersdetallesprod / $porcentaje['productos_compras']->ordersdetalles) *100}}%">{{round(($porcentaje['productos_compras']->ordersdetallesprod / $porcentaje['productos_compras']->ordersdetalles) *100,2)}}%</div>
                </div>
                @else
                <span class="float-right"><b></b></span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary"></div>
                </div>
                @endif
              </div>
              <!-- /.progress-group -->

              <div class="progress-group">
                Combos añadidos al carrito
                @if ($porcentaje['productos_combos']->ordersdetallesprod !=0)
                <span class="float-right"><b>{{$porcentaje['productos_combos']->ordersdetallesprod}}</b>/{{$porcentaje['productos_combos']->ordersdetalles}}</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: {{($porcentaje['productos_combos']->ordersdetallesprod / $porcentaje['productos_combos']->ordersdetalles) *100}}%">{{round(($porcentaje['productos_combos']->ordersdetallesprod / $porcentaje['productos_combos']->ordersdetalles) *100,2)}}%</div>
                </div>
                @else
                <span class="float-right"><b></b></span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-success"></div>
                </div>
                @endif
              </div>
              
              <!-- /.progress-group -->
              <div class="progress-group">
                Productos calificados 
                @if ($porcentaje['productos_calificados']->productos_calificados !=0)
                <span class="float-right"><b>{{$porcentaje['productos_calificados']->productos_calificados}}</b>/{{$porcentaje['productos']->productos}}</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-warning" style="width:{{($porcentaje['productos_calificados']->productos_calificados / $porcentaje['productos']->productos) *100}}%">{{round(($porcentaje['productos_calificados']->productos_calificados / $porcentaje['productos']->productos) *100,2)}}%</div>
                </div>
                @else
                <span class="float-right"><b></b></span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-warning"></div>
                </div>
                @endif
              </div>
              <!-- /.progress-group -->
              
              <!-- /.progress-group -->
              <div class="progress-group">                
                <span class="progress-text">Carritos Abandonados</span>
                @if ($porcentaje['carritos_comprados']->compras !=0)
                  <span class="float-right"><b>{{$porcentaje['carritos_comprados']->compras}}</b>/{{$porcentaje['carritos']->carritos}}</span>
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" style="width: {{$porcentaje['porcentaje']}}%">{{round($porcentaje['porcentaje'],2)}}%</div>
                  </div>
                @else
                  <span class="float-right"><b></b></span>
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-danger"></div>
                  </div>
                @endif
              </div>
              <!-- /.progress-group -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->      
        <!-- ./card-body -->
        <div class="card-footer">
          <div class="row">
            @foreach ($porcentaje['conteo_subtotal'] as $presupuesto_meses)
                
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <h5 class="description-header">S/.{{$presupuesto_meses->subtotal}}</h5>
                <span class="description-text">TOTAL de {{$presupuesto_meses->Mes}}</span>
              </div>
              <!-- /.description-block -->
            </div>
            @endforeach
            <!-- /.col -->
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-footer --> 
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>  
  
@push('js')
      
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>


  <script>
  let data_mes = document.querySelector('#mes_data').dataset.data;
  data_meses = JSON.parse(data_mes);

  const genericOptions = {
    fill: false,
    interaction: {
      intersect: false
    },
    radius: 0,
  };  

  const ctx2 = document.getElementById('myChart2').getContext('2d');
  const config = new Chart(ctx2, {

    type: 'line',
    data: {
      labels: [data_meses[0]['Mes'],data_meses[1]['Mes'],data_meses[2]['Mes'],data_meses[3]['Mes'],data_meses[4]['Mes'],data_meses[5]['Mes']],
      datasets: [{
        label: 'Compras por los 6 últimos meses',
        data: [data_meses[0]['cantidad'],data_meses[1]['cantidad'],data_meses[2]['cantidad'],data_meses[3]['cantidad'],data_meses[4]['cantidad'],data_meses[5]['cantidad']],
        borderColor: 'rgb(75, 192, 192)',
        segment: {
          borderColor: ctx2 => skipped(ctx2, 'rgb(0,0,0,0.2)') || down(ctx2, 'rgb(192,75,75)'),
          borderDash: ctx2 => skipped(ctx2, [6, 6]),
        },
        spanGaps: true
      }]
    },
    options: genericOptions
  });
  const skipped = (ctx2, value) => ctx2.p0.skip || ctx2.p1.skip ? value : undefined;
  const down = (ctx2, value) => ctx2.p0.parsed.y > ctx2.p1.parsed.y ? value : undefined;
  
  </script>

  <script>  
  let data_mes2 = document.querySelector('#mes_data_prod').dataset.data;
  data_meses = JSON.parse(data_mes2);
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {

      type: 'bar',
      data: {
          labels: [data_meses[0]['Mes'],data_meses[1]['Mes'],data_meses[2]['Mes'],data_meses[3]['Mes'],data_meses[4]['Mes'],data_meses[5]['Mes']],
          datasets: [{
              label: 'Productos registrados los 6 últimos meses',
              data: [data_meses[0]['cantidad'],data_meses[1]['cantidad'],data_meses[2]['cantidad'],data_meses[3]['cantidad'],data_meses[4]['cantidad'],data_meses[5]['cantidad']],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
 
  </script>

<script>
var data_meses_prod_desc ={!! json_encode($data_prod_desc ) !!};
    const DATA_COUNT = 5;
    const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};

    const labels = [data_meses_prod_desc[0]['nombres'],data_meses_prod_desc[1]['nombres'],data_meses_prod_desc[2]['nombres'],data_meses_prod_desc[3]['nombres'], data_meses_prod_desc[4]['nombres']];
    const data = {
      labels: labels,
      datasets: [
        {
          label: 'Dataset 1',
          data: [data_meses_prod_desc[0]['cantidad'],data_meses_prod_desc[1]['cantidad'],data_meses_prod_desc[2]['cantidad'],data_meses_prod_desc[3]['cantidad'], data_meses_prod_desc[4]['cantidad']],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
          ]
        }
      ]
    };
    const ctx3 = document.getElementById('myChart_pie');
    const config2 = new Chart(ctx3,  {
      type: 'doughnut',
      data: data,
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Chart.js Doughnut Chart'
          }
        }
      },
    });
    </script>
@endpush

@endsection