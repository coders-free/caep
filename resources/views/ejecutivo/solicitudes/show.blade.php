<x-ejecutivo-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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
                    @livewire('solicitud.edit-component', compact('solicitud'))
        
                    <x-jet-section-border />
                </div>
            </section>
            

            {{-- Información del imponente --}}
            <section>

                <h1 class="text-center text-2xl font-medium text-gray-700 mb-4">Información del imponente</h1>

                <div class="mb-10">
                    @livewire('edit-identificacion', ['identificacion' => $solicitud->identificacion])
                </div>

                <div class="mb-10">
                    @livewire('edit-trabajo', ['trabajo' => $solicitud->trabajo])
                </div>

                <div class="mb-10">
                    @livewire('bancario-edit', ['bancario' => $solicitud->bancario])
                    <x-jet-section-border />
                </div>
            </section>

            {{-- Información del aval --}}
            <section>
                <h1 class="text-center text-2xl font-medium text-gray-700 mb-4">Información del aval</h1>
            

                <div class="mb-10">
                    @livewire('aval-edit', ['aval' => $solicitud->aval])
                </div>

                <div class="mb-10">
                    @livewire('edit-identificacion', ['identificacion' => $solicitud->aval->identificacion])
                </div>

                <div class="mb-10">
                    @livewire('edit-trabajo', ['trabajo' => $solicitud->aval->trabajo])
                    <x-jet-section-border />
                </div>

            </section>

            {{-- Subida de archivos --}}
            <section>

                <h1 class="text-center text-2xl font-medium text-gray-700 mb-4">Subida de archivos</h1>

                <div class="mb-10">
                    @livewire('files-upload', compact('solicitud'))
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