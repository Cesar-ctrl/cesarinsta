<div>{{ $propietario->nombre }}</div>
@foreach ($propietario->mascotas as $mascota)
    <div>mascota: {{$mascota->nombre}}<</div>
@endforeach