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
    <!-- Contenido -->

    <div class="wrapper">
		


		

		

		

		<section>
			<div class="block">
				<div class="container">
					<div class="about-us">
						<h3 class="heading-title">Quienes Somos</h3>
						<p>“LA CHOZA NAUTICA”</strong> es una empresa dedicada al rubro gastronómico con más de 27 años de experiencia, lo cual nos ha permitido lograr una remarcada presencia en el mercado y ubicarnos en los primeros lugares del servicio de
                        la gastronomía; puesto que ofrecemos diversos servicios en la especialidad de; pescados, mariscos, comida criolla, buffet, Maky’s, y parrillas de todas las carnes, obteniendo como resultado reconocimientos como: El Primer Puesto del Día
                        Nacional del Ceviche por ARMAP (Asociación de Restauradores Marinos y Afines del Perú) cabe mencionar que hemos sido <strong>PARTICIPE DE MISTURA</strong> y actualmente somos socios de Apega lo cual muestra los avances que en estos últimos
                        años hemos logrado por dedicación y esfuerzo.</p>
						<br>
						<br>
						<h3 class="heading-title">Visión</h3>
						<p>Convertirnos en la mejor cadena de restaurantes turísticos donde nuestros colaboradores puedan encontrar una gran oportunidad de trabajo así mismo puedan ir creciendo a través de las capacitaciones brindadas.
						</p>
						<br>
						<br>
						<h3 class="heading-title">Misión</h3>
						<p>Promover la comida peruana a través de nuestros cocineros que tienen esa pasión por la cocina peruana, también brindar un servicio de calidad a través de nuestro personal capacitado para que en cada visita usted disfrute a pleno de nuestro servicio.</p>
					</div><!--about-us end-->
				</div>
			</div><!--about-section end-->
		</section>
		
		

		<section>
			<div class="construct-info">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="construct-details">
								<h2>La Choza Nautica<br /> Especializados<br />en la gastronomia  <br> peruana</h2>
							</div><!--construct-details end-->
						</div>
						<div class="col-lg-6">
							<div class="about-img">
								<img src="https://cdn.discordapp.com/attachments/740672693363540151/913679368071573615/s.jpg" alt="">
							</div><!--about-img end-->
						</div>
					</div>
				</div>
			</div><!--construct-info end-->
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
    <div class="spaceeee2">

        </div>






































    <!--
        <header>
            <div class="w3layouts-top-strip">
                <div class="container">
                    <div class="agileits-contact-info text-right">
                        <ul>
                            <li><span class="fab fa-whatsapp" aria-hidden="true"></span>{{$empresa_provider->telefono}}</li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </header>
        <section class="w3-about text-center">
            <div class="container">
                <h2 class="w3ls_head">Quienes<span> Somos</span></h2>
                <p class="para"><strong>“LA CHOZA NAUTICA”</strong> es una empresa dedicada al rubro gastronómico con más de 27 años de experiencia, lo cual nos ha permitido lograr una remarcada presencia en el mercado y ubicarnos en los primeros lugares del servicio de
                    la gastronomía; puesto que ofrecemos diversos servicios en la especialidad de; pescados, mariscos, comida criolla, buffet, Maky’s, y parrillas de todas las carnes, obteniendo como resultado reconocimientos como: El Primer Puesto del Día
                    Nacional del Ceviche por ARMAP (Asociación de Restauradores Marinos y Afines del Perú) cabe mencionar que hemos sido <strong>PARTICIPE DE MISTURA</strong> y actualmente somos socios de Apega lo cual muestra los avances que en estos últimos
                    años hemos logrado por dedicación y esfuerzo.<br><br>
                    <strong>La choza Nautica</strong>, agradece su atención y se complace en poner a su disposición nuestro Servicio de Banquetes, eventos, cumpleaños, conferencias corporativas, eventos corporativos, etc. el cual contamos con un staff calificado
                    y profesional.</p>
                <div class="col-md-6 agile-img">
                    <img src="https://images-ext-2.discordapp.net/external/3FQtCsgmoh2Rqpd2Cbys6xSFdARiAZ4Vh7o2xA8FEkA/https/www.chozanautica.com/images/em2.jpg">
                </div>
                <div class="col-md-6 agile-img">
                    <img src="https://media.discordapp.net/attachments/740672693363540151/913641765968445460/unknown.png">
                </div>
                <div class="col-md-3 agile-img">
                    <img src="https://media.discordapp.net/attachments/740672693363540151/913641794376454174/unknown.png">
                </div>
                <div class="col-md-3 agile-img">
                    <img src="https://images-ext-2.discordapp.net/external/eEsygpHEezV9St8rU74NBUzQrfDiM_r1xhZg7uXCgy4/https/www.chozanautica.com/images/em4.jpg">
                </div>
                <div class="col-md-3 agile-img">
                    <img src="https://media.discordapp.net/attachments/740672693363540151/913642196962537493/unknown.png">
                </div>
                <div class="col-md-3 agile-img">
                    <img src="https://media.discordapp.net/attachments/740672693363540151/913642217271337020/unknown.png">
                </div>
    
                <div class="clearfix"></div>
                <hr>
                <div>
                    <iframe style="width: 100%;" src="https://www.youtube.com/embed/aQPTblXzoCY" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" width="860" height="500" frameborder="0"></iframe>
                </div>
                <hr>
            </div>
        </section>-->
    
@endsection