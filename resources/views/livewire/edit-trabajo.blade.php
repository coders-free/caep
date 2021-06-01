<div>
    <x-jet-form-section submit="update">
        <x-slot name="title">
            <div class="text-center"><i class="fa fa-briefcase fa-5x" style="color:#0342cb" aria-hidden="true"></i></div>
        </x-slot>

        <x-slot name="description">
            <div class="text-center">Complete esta información sobre tu lugar de trabajo</div>
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6">
                <x-jet-label for="direccion" value="Reparticion" />
                <x-jet-input id="direccion" type="text" class="mt-1 block w-full"
                    wire:model.defer="trabajo.reparticion" />
                <x-jet-input-error for="trabajo.reparticion" class="mt-2" />
            </div>

            {{-- cargos --}}
            <div class="col-span-3">
                <x-jet-label for="direccion" value="Cargo" />
                <select class="form-control w-full" name="" id="" wire:model="trabajo.cargo_id">
                    <option value="" selected="true" disabled="disabled">Seleccione una opcion</option>
                    @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id }}">{{ $cargo->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="trabajo.cargo_id" class="mt-2" />
            </div>

            {{-- Antiguedad --}}
            <div class="col-span-3" wire:ignore>
                <x-jet-label value="Antiguedad" />
                <x-jet-input id="antiguedad" type="text" class="mt-1 block w-full"
                    value="{{$antiguedad}}" />
                <x-jet-input-error for="antiguedad" class="mt-2" />
            </div>

            <div class="col-span-6">
                <x-jet-label for="direccion" value="Dirección" />
                <x-jet-input id="direccion" type="text" class="mt-1 block w-full"
                    wire:model.defer="trabajo.direccion" />
                <x-jet-input-error for="trabajo.direccion" class="mt-2" />
            </div>


            {{-- Region --}}
            <div class="col-span-3">
                <x-jet-label for="direccion" value="Region" />
                <select class="form-control w-full" name="" id="" wire:model="trabajo.region_id">
                    <option value="" selected="true" disabled="disabled">Seleccione una opcion</option>
                    @foreach ($regiones as $region)
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                </select>

                <x-jet-input-error for="trabajo.region_id" class="mt-2" />
            </div>

            {{-- Comunidad --}}
            <div class="col-span-3">
                <x-jet-label for="direccion" value="Comuna" />
                <select class="form-control w-full" wire:model="trabajo.comuna_id">
                    <option value="" selected="true" disabled="disabled">Seleccione una opcion</option>
                    @foreach ($this->comunas as $comuna)
                        <option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
                    @endforeach
                </select>

                <x-jet-input-error for="trabajo.comuna_id" class="mt-2" />
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
        /* $( function() {
            
        }); */

        document.addEventListener('livewire:load', function () {
            $( "#antiguedad" ).datepicker({
                dateFormat: 'dd/mm/yy'
            });
        })

        $("#antiguedad").on('change', function(e){
            @this.set('antiguedad', e.target.value);
        })
    </script>

</div>
