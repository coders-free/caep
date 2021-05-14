<div>


    <x-jet-danger-button class="disabled:opacity-50" 
                        wire:click="create"
                        wire:loading.attr="disabled"
                        wire:target="create">
        Crear prestamo
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            ¿Qué tipo de solicitud quiere realizar?
        </x-slot>

        <x-slot name="content">
            <div class="mb-2">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" 
                            wire:model.defer="prestamo.name"
                            class="w-full"
                            placeholder="Nombre del prestamo" />
                <x-jet-input-error for="prestamo.name" />
            </div>

            <div class="mb-2">
                <x-jet-label value="Cuotas" />

                <div class="grid grid-cols-2 gap-x-6">
                    @foreach ($cuotas as $cuota)
                        <label>
                            <input wire:model.defer="prestamo_cuotas.{{$cuota->id}}" type="checkbox" value="{{$cuota->id}}">
                            {{$cuota->value}} cuotas
                        </label>
                    @endforeach
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-primary disabled:opacity-50" 
                    wire:click="save"
                    wire:loading.attr="disabled"
                    wire:target="save">
                    Crear solicitud
            </button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
