<div>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight text-center">
            Estatutos
        </h2>
    </x-slot>
    <div class="container py-12">
        <div class="container text-center">
            <h1 class="text-xl mb-8">ESTATUTOS GENERALES DE LA CAJA DE AHORROS DE EMPLEADOS PÚBLICOS</h1>
            <p class="mb-8">En esta sección usted podra descargar los Estatutos Generales de nuestra CAEP, la descarga de este archivo representa una aceptación a los estatutos de nuestra caja. Le solicitamos que se el timepo de leerlos.</p>
            <a href="{{asset('Documentos/ESTATUTOS VIGENTES.pdf')}}" target="_blank" wire:click="guardaAceptacion()" class="btn btn-primary" style="background-color:#0342cb">DESCARGAR Y ACEPTAR ESTATUTOS</a>
        </div>
    </div>

</div>
