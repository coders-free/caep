<div>

    <x-jet-form-section submit="update">
        <x-slot name="title">
            <div class="text-center"><i class="fa fa-money fa-5x" style="color:#b19d78" aria-hidden="true">$</i></div>
        </x-slot>

        <x-slot name="description">
            <div class="text-center">Por favor complete sus datos bancarios</div>
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6">
                <x-jet-label for="direccion" value="Enviar cheques a" />
                <div class="mt-2">
                    @foreach ($envios as $envio)
                        <label class="mr-3">
                            <input value="{{$envio->id}}" type="radio" name="envio_id" wire:model="bancario.envio_id">
                            {{$envio->name}}
                        </label>
                    @endforeach

                    @if ($bancario->envio_id == 4)
                        <x-jet-input id="direccion" placeholder="Ingrese el nombre de la agencia" type="text" class="mt-1 block w-full mt-3"
                        wire:model.defer="bancario.agencia" />
                    @endif
                </div>

            </div>

            <div class="col-span-6">
                <x-jet-label for="direccion" value="Datos bancarios" />
                <div class="mt-2">
                    @foreach ($tipos as $tipo)
                        <label class="mr-3">
                            <input value="{{$tipo->id}}" type="radio" name="tipo_id" wire:model="bancario.tipo_id">
                            {{$tipo->name}}
                        </label>
                    @endforeach
                 
                </div>

            </div>

            <div class="col-span-6">
                <x-jet-label for="direccion" value="Banco" />
                <x-jet-input id="direccion" type="text" class="mt-1 block w-full"
                    wire:model.defer="bancario.banco" />
                <x-jet-input-error for="direccion" class="mt-2" />
            </div>

            <div class="col-span-6">
                <x-jet-label for="direccion" value="Numero de cuenta" />
                <x-jet-input id="direccion" type="text" class="mt-1 block w-full"
                    wire:model.defer="bancario.numero_cuenta" />
                <x-jet-input-error for="direccion" class="mt-2" />
            </div>

        </x-slot>
    
    
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>
    
            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>

    
</div>
