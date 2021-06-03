<div>

    <x-jet-form-section submit="update">
        <x-slot name="title">
            <div class="text-center"></div>
        </x-slot>

        <x-slot name="description">
            <div class="text-center">Por favor complete sus datos bancarios</div>
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6">
                <x-jet-label value="Enviar cheques a" />
                <div class="mt-2">
                    @foreach ($envios as $envio)
                        <label class="mr-3">
                            <input value="{{$envio->id}}" type="radio" name="envio_id" wire:model="bancario.envio_id">
                            {{$envio->name}}
                        </label>
                    @endforeach

                    <x-jet-input-error for="bancario.envio_id" />

                    @if ($bancario->envio_id == 4)
                        <x-jet-input placeholder="Ingrese el nombre de la agencia" type="text" class="mt-1 block w-full mt-3"
                        wire:model.defer="bancario.agencia" />
                        <x-jet-input-error for="bancario.agencia" />
                    @endif
                </div>

            </div>

            <div class="col-span-6">
                <x-jet-label value="Datos bancarios" />
                <div class="mt-2">
                    @foreach ($tipos as $tipo)
                        <label class="mr-3">
                            <input value="{{$tipo->id}}" type="radio" name="tipo_id" wire:model="bancario.tipo_id">
                            {{$tipo->name}}
                        </label>
                    @endforeach
                    <x-jet-input-error for="bancario.tipo_id" />
                 
                </div>

            </div>

            <div class="col-span-6">
                <x-jet-label for="bancario.banco" value="Banco" />
                {{-- <x-jet-input id="bancario.banco" type="text" class="mt-1 block w-full"
                    wire:model.defer="bancario.banco" /> --}}

                <select id="bancario.banco" 
                    wire:model.defer="bancario.banco" 
                    class="form-control w-full">
                    <option value="" selected disabled>Seleccione una opción</option>
                    <option value="BANCO BCI">BANCO BCI</option>
                    <option value="BANCO DE CHILE">BANCO DE CHILE</option>
                    <option value="BANCO ESTADO">BANCO ESTADO</option>
                    <option value="BANCO SANTANDER">BANCO SANTANDER</option>
                    <option value="BANCO BICE">BANCO BICE</option>
                    <option value="BANCO CONDELL">BANCO CONDELL</option>
                    <option value="BANCO CREDICHILE">BANCO CREDICHILE</option>
                    <option value="BANCO FALABELLA">BANCO FALABELLA</option>
                    <option value="BANCO INTERNACIONAL">BANCO INTERNACIONAL</option>
                    <option value="BANCO ITAÚ">BANCO ITAÚ</option>
                    <option value="BANCO RIPLEY">BANCO RIPLEY</option>
                    <option value="BANCO SECURITY">BANCO SECURITY</option>
                    <option value="BANCO SCOTIABANK">BANCO SCOTIABANK</option>
                </select>


                <x-jet-input-error for="bancario.banco" class="mt-2" />
            </div>

            <div class="col-span-6">
                <x-jet-label for="bancario.numero_cuenta" value="Numero de cuenta" />
                <x-jet-input id="bancario.numero_cuenta" type="text" class="mt-1 block w-full"
                    wire:model.defer="bancario.numero_cuenta" />
                <x-jet-input-error for="bancario.numero_cuenta" class="mt-2" />
            </div>

        </x-slot>
    
    
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                Información actualizada
            </x-jet-action-message>
    
            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>

    
</div>
