<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Información del aval
        </h2>
    </x-slot>

    <div class="container py-12">

        <div class="mb-10">
            @livewire('aval-edit', ['aval' => $aval])

            <x-jet-section-border />
        </div>
        
        <div class="mb-10">
            @livewire('edit-identificacion', ['identificacion' => $aval->identificacion])

            <x-jet-section-border />
        </div>

        <div>

            @livewire('edit-trabajo', ['trabajo' => $aval->trabajo])

        </div>

    </div>
</x-app-layout>