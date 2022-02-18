<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Mascotas</title>
</head>
<body>
    <section>
        @foreach ($mascotas as $mascota)
            <div><a href="{{ route("mascota", array("id" => $mascota->id)) }}">{{ $mascota }}</a>
                <a href="{{ route("editamascota", array("id" => $mascota->id)) }}">Editar</a>
                <a href="{{ route("borramascota", array("id" => $mascota->id)) }}">Borrar</a>
            </div>
        @endforeach
    </section>
</body>
</html>

