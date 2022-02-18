<form method="POST" action="">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ isset($mascota) ? $mascota->nombre : "" }}">
    <label for="especie">Especie:</label>
    <input type="text" name="especie" value="{{ isset($mascota) ? $mascota->especie : ""  }}">
    <input type="submit" value="{{ isset($mascota) ? "Actualizar" : "Crear" }}">
    <select class="form-control" name="propietario_id">
        <option>Ninguno</option>
        @foreach ($propietarios  as $propietario)
            <option value="{{ $propietario->id }}" 
                {{ isset($mascota) && $propietario->id === $mascota->propietario_id ? "selected" : "" }}>
                {{ $propietario }}
            </option>
        @endforeach
    </select>
</form>
@error('nombre')
No puede quedar vacío el nombre
@enderror