<div>

    <x-jet-form-section submit="update">
        <x-slot name="title">
            <div class="text-center"><i class="fa fa-id-card fa-5x" style="color:#b19d78" aria-hidden="true"></i></div>
        </x-slot>

        <x-slot name="description">
            <div class="text-center">Complete la información básica del usuario</div>
        </x-slot>

        <x-slot name="form">
            
            <div class="col-span-6">
                <x-jet-label for="direccion" value="Dirección" />
                <x-jet-input id="direccion" type="text" class="mt-1 block w-full"
                    wire:model.defer="identificacion.direccion" />
                <x-jet-input-error for="direccion" class="mt-2" />
            </div>

            {{-- Region --}}
            <div class="col-span-3">
                <x-jet-label for="direccion" value="Region" />
                <select class="form-control w-full" name="" id="" wire:model="identificacion.region_id">
                    <option selected="true" disabled="disabled">Seleccione una opcion</option>
                    @foreach ($regiones as $region)
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Comunidad --}}
            <div class="col-span-3">
                <x-jet-label for="direccion" value="Comuna" />
                <select class="form-control w-full" wire:model="identificacion.comuna_id">
                    <option selected="true" disabled="disabled">Seleccione una opcion</option>
                    @foreach ($this->comunas as $comuna)
                        <option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Fecha de nacimiento --}}
            <div class="col-span-3" wire:ignore>
                
                <x-jet-label value="Fecha de nacimiento" />
                <x-jet-input id="fecha_nacimiento" type="text" class="mt-1 block w-full"
                    value="{{$fecha_nacimiento}}" />
                <x-jet-input-error for="fecha_nacimiento" class="mt-2" />
            </div>

            {{-- Sexo --}}
            <div class="col-span-3">
                <x-jet-label for="direccion" value="Sexos" />
                <select class="form-control w-full" wire:model="identificacion.sexo_id">
                    <option selected="true" disabled="disabled">Seleccione una opcion</option>
                    @foreach ($sexos as $sexo)
                        <option value="{{ $sexo->id }}">{{ $sexo->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Estado civil --}}
            <div class="col-span-3">
                <x-jet-label for="direccion" value="Estado civil" />
                <select class="form-control w-full" wire:model="identificacion.estado_civil_id">
                    <option selected="true" disabled="disabled">Seleccione una opcion</option>
                    @foreach ($estados_civiles as $estado_civil)
                        <option value="{{ $estado_civil->id }}">{{ $estado_civil->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Celular --}}
            <div class="col-span-3">
                <x-jet-label for="direccion" value="Celular" />
                <x-jet-input id="direccion" type="text" class="mt-1 block w-full"
                    wire:model.defer="identificacion.celular" />
                <x-jet-input-error for="direccion" class="mt-2" />
            </div>

            {{-- Separacion de bienes --}}
            <div class="col-span-6">
                <x-jet-label for="direccion" value="Separación de bienes" />

                <div class="mt-2">
                    <label class="mr-4">
                        <input type="radio" name="separacion" value="1" class="mr-1" wire:model.defer="identificacion.separacion">
                        Con separación de bienes
                    </label>

                    <label>
                        <input type="radio" name="separacion" value="0" class="mr-1" wire:model.defer="identificacion.separacion">
                        Sin separación de bienes
                    </label>
                </div>
                
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

    

    <script>
        $( function() {
            $( "#fecha_nacimiento" ).datepicker({
                dateFormat: 'dd/mm/yy'
            });
        });

        $("#fecha_nacimiento").on('change', function(e){
            @this.set('fecha_nacimiento', e.target.value);
        })
    </script>
    
</div>
