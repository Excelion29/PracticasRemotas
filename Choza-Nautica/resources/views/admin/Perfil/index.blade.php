<form action="{{url('/dashboard')}}" method="POST">
    @csrf
    <h1>Actualización de usuario</h1>
    
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name">
    <br>
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos">
    <br>
    <label for="celular">Nro_Celular</label>
    <input type="text" name="celular" id="celular">
    <br>
    <label for="email">Email</label>
    <input type="text" name="email" id="email">
    <br>

    <input type="submit" name="Enviar" id="enviar">
    <br>
</form>