@foreach ($propietarios as $propietario)
    <div>
    <a href="{{ route("propietario", array("id" => $propietario->id)) }}">{{ $propietario->nombre }}</a>
    <a href="{{ route("editapropietario", array("id" => $propietario->id)) }}">Editar</a>
    <a href="{{ route("borrapropietario", array("id" => $propietario->id)) }}">Borrar</a>
    </div>
@endforeach