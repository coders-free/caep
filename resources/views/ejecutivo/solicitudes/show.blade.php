<x-ejecutivo-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Revisión de solicitud
        </h2>
    </x-slot>


    <div class="container py-12">

        @if ($solicitud->prestamo_id == 1)
            <div class="mb-10">
                @livewire('retiro-edit', ['solicitud' => $solicitud])
            </div>
        @else
        
            {{-- Información de la solicitud --}}
            <section>

                <h1 class="text-center text-2xl font-medium text-gray-700 mb-4">Información de la solicitud</h1>

                <div class="mb-10">
                    @livewire('imponente.solicitud-edit', compact('solicitud'))
        
                    <x-jet-section-border />
                </div>
            </section>
            

            {{-- Información del imponente --}}
            <section>

                <h1 class="text-center text-2xl font-medium text-gray-700 mb-4">Información del imponente</h1>

                <div class="mb-10">
                    @livewire('identificacion-component', ['identificacion' => $solicitud->identificacion])
                </div>

                <div class="mb-10">
                    @livewire('trabajo-component', ['trabajo' => $solicitud->trabajo])
                </div>

                <div class="mb-10">
                    @livewire('bancario-component', ['bancario' => $solicitud->bancario])
                    <x-jet-section-border />
                </div>
            </section>

            @if ((Auth::user()->roles()->first()->name == 'ejecutivo'))
                {{-- Información del aval --}}
                <section>
                    <h1 class="text-center text-2xl font-medium text-gray-700 mb-4">Información del aval</h1>
                

                    <div class="mb-10">
                        @livewire('aval-edit', ['aval' => $solicitud->aval])
                    </div>

                    <div class="mb-10">
                        @livewire('identificacion-component', ['identificacion' => $solicitud->aval->identificacion])
                    </div>

                    <div class="mb-10">
                        @livewire('trabajo-component', ['trabajo' => $solicitud->aval->trabajo])
                        <x-jet-section-border />
                    </div>

                </section>                
            @endif


            {{-- Subida de archivos --}}
            <section>

                <h1 class="text-center text-xl font-medium text-gray-700 mb-4">Subida de archivos</h1>

                <div class="mb-10">
                    @livewire('imponente.files-upload', compact('solicitud'))
                    <x-jet-section-border />
                </div>
            </section>
            
            {{-- Descarga de archivos --}}
            <section>

                <h1 class="text-center text-2xl font-medium text-gray-700 mb-4">Descarga de archivos</h1>

                <div class="mb-10">
                    @livewire('files-download', compact('solicitud'))
                    <x-jet-section-border />
                </div>
            </section>

        @endif

        <section>
            <h1 class="text-center text-2xl font-medium text-gray-700 mb-4">Aprobar solicitudes</h1>

            <div class="mb-10">
                @livewire('aprobar-solicitud', compact('solicitud'))
                <x-jet-section-border />
            </div>

        </section>

        <section>
            <h1 class="text-center text-2xl font-medium text-gray-700 mb-4">Notas de la solicitud</h1>
            <div class="mb-10">
                @livewire('solicitud-notes', compact('solicitud'))
            </div>

            <div>
                @livewire('bitacora', compact('solicitud'))
            </div>
        </section>


    </div>

</x-ejecutivo-layout>