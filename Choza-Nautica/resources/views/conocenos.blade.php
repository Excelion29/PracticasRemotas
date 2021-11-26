@extends('layouts.nav')

@section('title', 'Inicio' )

@section('content')
<div class="header" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent), url(https://images6.alphacoders.com/366/366291.jpg)peat  no-recenter center;">
    <div class="center">
      <h1 class="alex-brush"></h1>
      <h2>Bienvenidos</h2>
      <span id="asterisk">*</span>
      <p>A {{$empresa_provider->name}}</p>
    </div>
  </div>
    <!-- Contenido -->
    <body>
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
        </section>
    </body>
@endsection