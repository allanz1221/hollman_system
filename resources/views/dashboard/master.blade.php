<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <title>Módulo admin</title>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

</head>

<body>

    @include('dashboard.partials.nav-header-main')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="background-image: url('../fondo2.png');">
    
                <div class="row justify-content-center"> <h4>PANEL DE ADMINISTRACIÓN </h4> </div>

                
                        <div class="container">
                            @include('dashboard.partials.session-flash-status')
                            @yield('content')
                        </div>

    

            </div>
        <div class="col-md-12" style="background-image: url('../barra-03.png');">
                        <img src="../logo_foot-04.png" width="150px" />
        </div>
      </div>
    </div>
            
            <script src="js/bootstrap.min.js"></script>
            <script src="js/popper.min.js"></script>


    <script src="{{ asset("js/app.js") }}"></script>
</body>

</html>