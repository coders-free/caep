<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Imponente
        </h2>
    </x-slot>


    <div class="container py-12">
        
        <div class="mb-10">
            
            @livewire('edit-identificacion', ['identificacion' => auth()->user()->imponente->identificacion])
            <x-jet-section-border />

        </div>
        
        <div class="mb-10">
            @livewire('edit-trabajo', ['trabajo' => auth()->user()->imponente->trabajo])
            
            <x-jet-section-border />

        </div>

        {{-- @livewire('bancario-component') --}}
        @livewire('bancario-edit', ['bancario' => auth()->user()->imponente->bancario])
        
    </div>

</x-app-layout>