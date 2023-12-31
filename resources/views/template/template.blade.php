<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inscripcion</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="{{ asset('peru.ico') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row bgs-red d-flex justify-content-center">
                <div class="col-md-1"></div>
                <img src="{{asset('img/logo_primario.svg')}}" class="col-md-1 logo-size p-2">
                <div class="col-md-4 my-3 text-color">SEDE DIGITAL</div>
                <div class="col-md-5 btn-size">
                    <a href="" class="btn btn-success btn-login my-3">IR A LOGIN</a>
                </div>

        </div>
        <div class="row d-flex justify-content-center">
            <h3 class="m-4 font-weight-normal">REGISTRO DE USUARIOS</h3>
        </div>
       
    </div>
    <div id="preloader" class="preloader">
        Cargando...
    </div>
    @yield('container')
    @yield('footer')  
    <div class="footer-size bgs-lead d-flex justify-content-center p-4">
            <p class="text-white letter-size">Politica de privacidad para el manejo de datos de Gob.pe</p>
    </div>           
</body>
</html>