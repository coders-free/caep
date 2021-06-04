<div>
    <x-jet-danger-button class="ml-4 disabled:opacity-50" 
        wire:click="$set('open', true)"
        wire:loading.attr="disabled">
        Crear solicitud Manual
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            ¿Qué tipo de solicitud quiere realizar?
        </x-slot>

        <x-slot name="content">

            
            <div class="card mb-2">
                
                <label class="card-body bg-gray-100 block cursor-pointer">
                    <input wire:model.defer="type" value="1" type="radio" name="type">
                    Quiero solicitar un prestamo
                </label>

            </div>

            <div class="card">
                
                <label class="card-body bg-gray-100 block cursor-pointer">
                    <input wire:model.defer="type" value="2" type="radio" name="type">
                    Quiero solicitar un retiro de fondos
                </label>
                
            </div>

            <x-jet-input-error class="mt-1" for="type" />

            <div class="mt-4">

                <x-jet-label value="Rut del imponente" />
                <x-jet-input wire:model.defer="rut" type="text" class="w-full" placeholder="Ingrese el rut del imponente" />
                <x-jet-input-error for="rut" />

            </div>

            <div class="mt-4">
                <x-jet-label value="Monto a solicitar" />
                <x-jet-input wire:model.defer="monto" type="number" class="w-full" placeholder="Ingrese el monto a solicitar" />
                <x-jet-input-error class="mt-1" for="monto" />
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

    {{-- <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        $('.select2').on('change', function(e){
            @this.set('imponente_id', e.target.value);
        })

    </script> --}}

</div>
