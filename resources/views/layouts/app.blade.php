<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sistema Gestión de Solicitudes - CAEP</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
        <style>
        #app-whatsapp{
        	position: fixed;
    	    left: 24px;
	        bottom: 25px;
	        width: 60px;
	        z-index: 1000;
	        display: none;
        }
        #app-whatsapp{
            bottom: 5px;
            display: block;
        }
        #app-whatsapp2{
        	position: fixed;
    	    left: 24px;
	        bottom: 25px;
	        width: 60px;
	        z-index: 1000;
	        display: none;
        }
        #app-whatsapp2{
            bottom: 5px;
            display: block;
        }
        #app-whatsapp2{
            bottom: 65px;
            display: block;
        }
        #app-whatsapp i{
            font-size: 43px;
        }
        #app-whatsapp i{
            color: #1ebea5;
        }
        #app-whatsapp2 i{
            font-size: 43px;
        }
        #app-whatsapp2 i{
            color: #1ebea5;
        }

        
        a.tooltip span {
        display:none;
        padding:2px 3px;
        margin-left:8px; 
        width:12em; /*el ancho del tooltip*/
        }
        a.tooltip:hover span {
        display: inline; 
        position: absolute; /* posición del tooltip necesaria y obligatoria*/
        background: #128c7e ; /*el color del fondo del tooltip*/
        border: 1px solid #c6dcf0; /*el color del borde y su estilo*/
        color: #FFFFFF;  /*el color de la letra del tooltip*/
        font-size: 18px;  /*el tamaño de la letra*/
        line-height: 120%;  /*la separación entre lineas*/
        }        
        </style>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow" style="background-color: #20335a">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <a class="tooltip" id="app-whatsapp" target="_blanck" href="https://api.whatsapp.com/send?phone=56934689104&amp;text=Hola!&nbsp;me&nbsp;pueden&nbsp;apoyar?">
            <i class="fab fa-whatsapp"></i><span>Préstamos solo Santiago</span>
        </a>
        <a class="tooltip" id="app-whatsapp2" target="_blanck" href="https://api.whatsapp.com/send?phone=56934399388&amp;text=Hola!&nbsp;me&nbsp;pueden&nbsp;apoyar?">
            <i class="fab fa-whatsapp"></i><span>Consultas Generales Santiago y Regiones</span>
        </a>
    </body>
</html>
