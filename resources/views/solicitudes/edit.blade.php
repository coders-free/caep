<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-3xl text-white leading-tight">
                Editar solicitud
            </h2>

            <form action="{{route('solicitudes.update', $solicitud)}}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary">Enviar a revisión</button>
            </form>
        </div>
    </x-slot>

    <div class="container py-12">

       
        @if ($solicitud->prestamo_id == 1)
            @livewire('retiro-edit', ['solicitud' => $solicitud])
        @else
        
            {{-- Información de la solicitud --}}
            <section>

                <h1 class="text-center text-xl font-medium text-gray-700 mb-4">Información de la solicitud</h1>

                <div class="mb-10">
                    @livewire('solicitud.edit-component', compact('solicitud'))
        
                    <x-jet-section-border />
                </div>
            </section>
            

            {{-- Información del imponente --}}
            <section>

                <h1 class="text-center text-xl font-medium text-gray-700 mb-4">Información del imponente</h1>

                <div class="mb-10">
                    @livewire('edit-identificacion', ['identificacion' => $solicitud->identificacion])
                </div>

                <div class="mb-10">
                    @livewire('edit-trabajo', ['trabajo' => $solicitud->trabajo])
                </div>

                <div class="mb-10">
                    {{-- @livewire('solicitud.bancario-component', compact('solicitud')) --}}
                    @livewire('bancario-edit', ['bancario' => $solicitud->bancario])
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
                        @livewire('edit-identificacion', ['identificacion' => $solicitud->aval->identificacion])
                    </div>

                    <div class="mb-10">
                        @livewire('edit-trabajo', ['trabajo' => $solicitud->aval->trabajo])
                        <x-jet-section-border />
                    </div>

                </section>
            
            @endif
            {{-- Subida de archivos --}}
            <section>

                <h1 class="text-center text-xl font-medium text-gray-700 mb-4">Subida de archivos</h1>

                <div class="mb-10">
                    @livewire('files-upload', compact('solicitud'))
                </div>
            </section>
        
            
        @endif
        
    </div>

</x-app-layout>