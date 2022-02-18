<form method="POST" action="">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ isset($propietario) ? $propietario->nombre : "" }}">
    <label for="localidad">Localidad:</label>
    <input type="text" name="localidad" value="{{ isset($propietario) ? $propietario->localidad : ""  }}">
    <input type="submit" value="{{ isset($propietario) ? "Actualizar" : "Crear" }}">
    
</form>
@error('nombre')
No puede quedar vacío el nombre
@enderror