  @extends('layouts.nav')

  @section('title', 'Inicio' )
  
  @section('content')
      <!-- Contenido -->
      
      <div class="header" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent), url(https://images6.alphacoders.com/366/366291.jpg)peat  no-recenter center;">
      <div class="center">
        <h1 class="alex-brush"></h1>
        <h2>Bienvenidos</h2>
        <span id="asterisk">*</span>
        <p>A {{$empresa_provider->name}}</p>
      </div>
    </div>


    
    
    <div class="wrap">
      <form action="{{route('search_products')}}" id="form_search_products" method="GET" >
      <input type="text" name="search_products" id="search_product" placeholder="Buscar Platos" class="search-text">
      <input type="submit" class="search-imput">
      </form>
    </div>

    
    <section class="add-padding add-flex">
      <div class="center-text">
        <h1 class="alex-brush"><span class="custom-font">Nuestra</span><br />Comida</h1>
        <h2>*</h2>
        <p>Combinamos la comida tradicional con un toque de modernidad en nuestra extensa carta y menús, consiguiendo unos platos ricos y saludables, acordándonos de las personas celiacas para las que tenemos plancha y freidora exclusivas para su comida</p>
        <a href="#">ver mas</a>
      </div>
      <div  class="stuffed-cherries" data-aos="fade-left" data-aos-delay="300">
      </div>
    </section>

    <section class="bread-background center-h1">
      <h1 class="custom-h1 alex-brush"><span class="custom-font">Recetas</span><br />Para todos los gustos</h1>
    </section>

    <section class="menu add-flex add-padding">
      <div class="menu-images">
        <img src="http://www.konoba-mirakul.com/wp-content/uploads/2015/03/delikatesa4.jpg"  data-aos="fade-down" data-aos-delay="300"/>
        <img src="http://www.konoba-mirakul.com/wp-content/uploads/2015/03/delikatesa21.jpg" data-aos="fade-left" data-aos-delay="300"/>
        <img src="https://www.gourmetsociety.co.uk/uploads/images/restaurants/093ce538894c95892f62dc93bb023636-image.png" data-aos="fade-right" data-aos-delay="300"/>
        <img src="http://retrokitchenbar.com/wp-content/uploads/2014/05/menu-thumb-4-300x218.jpg" data-aos="fade-up" data-aos-delay="300"/>
      </div>
      <div class="center-text">
        <h1><span class="custom-font alex-brush">Descubre</span><br />Deliciosos platos</h1>
        <h2>*</h2>
        <p>Nuestro equipo colaborativo trabaja arduamente por generar nexos, e intentar hacer visibles elementos que, en la vida cotidiana, no pueden ser vistos por todos. La expedición que emprendimos nuestro inicio no tiene destino ni final, sino que se centra en el constante movimiento, en la observación y el respeto de la temporalidad y la estacionalidad que la tierra nos dicta.</p>
        <a href="#">view the full menu</a>
      </div>
    </section>

    <section class="cake-background center-h1">
      <h1 class="custom-h1"><span class="custom-font alex-brush">Contactanos</span><br />Estamos a tu servicio</h1>
    </section>

    <section class="add-flex reservation-section" id="gastro">
      <div class="center-text add-padding">
        <h1><span class="custom-font alex-brush">
</span><br />EXPERIENCIA GASTRONÓMICA</h1>
        <h2></h2>
        <p>Restaurante de alta cocina, situado en el lugar idóneo para visitar después de un bonito tour por la ciudad de Lima, ya que se encuentra justo en el centro histórico, a dos cuadras de la Plaza de Armas y de la Catedral de Lima, muy cerca a los museos y a los bellos balcones de la Casa Torre Tagle.</p>
        <a href="#">-----</a>
      </div>
      <div>
        <img src="http://www.konoba-mirakul.com/wp-content/uploads/2015/03/kulinarstvo11.jpg" data-aos="fade-up" data-aos-delay="300"/>
        <img src="http://www.konoba-mirakul.com/wp-content/uploads/2015/03/kulinarstvo21.jpg" data-aos="fade-down" data-aos-delay="300"/>
      </div>
    </section>
    
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="{{asset('js/typeahead.bundle.min.js')}}"></script>
      <script>
          var productos = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch:"{{route('productos.json')}}"
          });
          $('#search_product').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
          },
          {
            name:'productos',
            source:productos
          }).on('typehead:selected',function(event,selection){
            $('#form_search_products').submit();
          });
      </script>
    @endsection



