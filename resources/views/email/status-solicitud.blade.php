<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    @if ($status == 3)
        <h1>Solicitud aprobada</h1>
        <p>Por favor imprima el pagare y llevelo a la agencia que le corresponde</p>
    @elseif($status == 4)
        <h1>Solicitud rechazada</h1>
    @endif

    <p>Mensaje</p>

    {!! $mensaje !!}

</body>
</html>