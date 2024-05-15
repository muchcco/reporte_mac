<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">

    @yield('estilos')

    <style>

        html, body {
            height: 100%;
            margin: 0;
        }
        #body{
            display: flex;

        }
        .sidebar{
            position: sticky;
            top: 0;
            height: 100vh;
            width: 18%;
            overflow-y: auto;
            background-color: #f8f9fa; /* Color de fondo opcional */
        }
        #principal{
            width: 100%;
        }

        .contenido-principal{
            padding: 2em;
        }

        .header{
            padding: 0;
            margin: 0;
            max-width: 100%;
        }

        table.dataTable td.dataTables_empty, table.dataTable th.dataTables_empty {
            text-align: center;
            color: red;
        }

        .th{
            color: #fff !important;
            vertical-align: middle !important;
        }
    
        .sorting, .dt-orderable-none{
            color: #fff !important;
            vertical-align: middle !important;
            text-align: center !important;
        }
      </style>
</head>
<body>        
    <div id="body">
        @include('secciones.sidebar')


        
        <section id="principal">
            <div class="header">
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="#">REPORTE</a>
                    </div>
                  </nav>
            </div>
            <div class="contenido-principal">
                
                @yield('main')
            </div>
            
        </section>
    </div>
    


    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/jquery-3.7.1.min.js') }}"></script>

    @yield('script')
</body>
</html>