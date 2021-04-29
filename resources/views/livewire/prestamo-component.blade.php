<div>


    <header class="bg-white shadow" style="background-color: #20335a">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-white leading-tight">
                    Prestamos
                </h2>
    
                <x-jet-secondary-button 
                    class="disabled:opacity-25"
                    wire:click="update"
                    wire:loading.attr="disabled"
                    wire:target="update">
                    Actualizar
                </x-jet-secondary-button>
    
            </div>
        </div>
    </header>


    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">


        <div class="bg-white shadow rounded-xl mb-6">
            <div class="p-4">
                <input wire:model.defer="name" type="text" class="form-control w-full" placeholder="Ingresar un nuevo tipo de prestamo">
                <x-jet-input-error for="name" />
                <div class="flex justify-end mt-4">
                    <x-jet-danger-button
                        class="disabled:opacity-25"
                        wire:click="save"
                        wire:loading.attr="disabled"
                        wire:target="save">
                        Agregar
                    </x-jet-danger-button>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-2 gap-6">
        
            @foreach ($prestamos as $index => $prestamo)
                <div class="bg-white shadow rounded-xl mb-4" wire:key="prestamo-field-{{ $prestamo->id }}">
                    <div class="p-4">
                        <input type="text" wire:model.defer="prestamos.{{ $index }}.name" class="form-control w-full">

                        <x-jet-input-error for="prestamos.{{ $index }}.name" />

                        <div class="mt-2">
                            <label>
                                <input type="radio" name="active.{{ $index }}" value="1" wire:model.defer="prestamos.{{ $index }}.active">
                                Activado
                            </label>

                            <label class="ml-4">
                                <input type="radio" name="active.{{ $index }}" value="0" wire:model.defer="prestamos.{{ $index }}.active">
                                Desactivado
                            </label>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
</div>
