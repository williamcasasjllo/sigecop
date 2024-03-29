<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/gif/png" href="{{asset('images/logo-institucion.png')}}">
        @include('estilogeneral')
        <title>SIGECOP</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
    <form action="{{ url('social/google') }}">
        <div class="container-fluid text-center">
            <img src="images/logo-institucion-300dpi-02.png" width='700' height='150'><br><br>
            <h1>SIGECOP</h1>
            <h1>Sistema de gestión para procesos contractuales</h1>
            <h1>Politécnico Colombiano Jaime Isaza Cadavid</h1><br><br>
            <button type="submit" class="btn btn-success">Conectarse</button>
        </div>
    </form>
    <footer class="footer">
        <div class="container">
            <p class="text-muted text-center">
                Politécnico Colombiano Jaime Isaza Cadavid © {{date("Y")}}
                Carrera 48 # 7-151 El Poblado, Medellín - PBX: 3197900
            </p>
        </div>
    </footer>
    </body>
</html>