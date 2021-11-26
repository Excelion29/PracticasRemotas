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
  
    <div class="col-md-3 agile-img">
        <a class="twitter" href="https://twitter.com/la_chozanautica"><i class="fab fa-twitter"></i>Twitter</a>
    </div>
    <div class="col-md-3 agile-img">
        <a class="facebook" href="https://www.facebook.com/LaChozaNauticaCorporacion"><i class="fab fa-facebook"></i>Facebook</a>
    </div>
    <div class="col-md-3 agile-img">
        <a class="instagram" href="https://www.instagram.com/lachozanauticacorporacion/?hl=es"><i class="fab fa-instagram"></i>Instagram</a>
    </div>
    <div class="col-md-3 agile-img">
        <a class="youtube" href="https://www.youtube.com/channel/UCz7x2SbtTJR_7KNhXYcH8Sg"><i class="fab fa-youtube"></i>Youtube</a>
    </div>
@endsection