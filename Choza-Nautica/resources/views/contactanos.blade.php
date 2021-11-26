@extends('layouts.nav')

@section('title', 'Inicio' )

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="{{asset('css/complementos.css')}}">

<div class="header" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent), url(https://images6.alphacoders.com/366/366291.jpg)peat  no-recenter center;">
    <div class="center">
      <h1 class="alex-brush"></h1>
      <h2>Bienvenidos</h2>
      <span id="asterisk">*</span>
      <p>A {{$empresa_provider->name}}</p>
    </div>
  </div>

  @include('layouts.map')

  <div class="wrapper">
		<section>
			<div class="contact-info-sec">
				<div class="container">
					<div class="cntct-details">
						<div class="row">
							<div class="col-lg-6">
								<div class="contact-address">
									<h2><strong>Lima</strong></h2>
									<p>{{$empresa_provider->direccion}}</p>
									<span><b>Email:</b> {{$empresa_provider->correo}}</span>
								</div><!--contact-address end-->
							</div>
							<div class="col-lg-6">
								<div class="contact-more-info">
									<h5>Central Telefonica:</h5>
									<h2>{{$empresa_provider->telefono}}</h2>
									<div class="address">
										
									</div><!--address end-->
									<div class="address">
										<h3>Horas te atencion:</h3>
										<span>Lunes - Viernes: 8:00 am - 17:00 pm</span> <br>
										<span>Sabado: 8:00 am - 12:00 pm</span>
									</div>
								</div><!--contact-more-info end-->
							</div>
						</div>
					</div><!--cntct-details end-->
					
				</div>
			</div><!--contact-info-sec end-->
		</section>
        
		<footer>
			<div class="footer-data">
				<div class="container">
					<div class="ft-contact-info">
						<h6>CONTACTO</h6>
						<h1>{{$empresa_provider->telefono}}</h1>
						<h3>NUESTRO LOCAL</h3>
						<h3>{{$empresa_provider->direccion}}</h3>
						<h3>{{$empresa_provider->correo}}</h3>
					</div><!--ft-contact-info end-->
					<div class="social-copyright">
						<ul>
							<li><a href="https://twitter.com/la_chozanautica" title="">Twitter</a></li>
							<li><a href="https://www.facebook.com/LaChozaNauticaCorporacion" title="">Facebook</a></li>
							<li><a href="https://www.instagram.com/lachozanauticacorporacion/?hl=es" title="">Instagram</a></li>
							<li><a href="https://www.youtube.com/channel/UCz7x2SbtTJR_7KNhXYcH8Sg" title="">Youtube</a></li>
						</ul>
						<div class="copyright-text">
							
						</div>
					</div><!--social-copyright end-->
				</div>
			</div><!--footer-data end-->
		</footer>
	</div><!--wrapper end-->
    <div class="spaceeee">

        </div>
  
   
@endsection