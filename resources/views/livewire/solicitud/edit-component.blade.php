<div>

    <x-jet-form-section submit="update">
        <x-slot name="title">
            Información de solicitud
        </x-slot>

        <x-slot name="description">
            Aquí puedes modificar la información de la solicitud
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6">

                {{-- Prestamo y cuotas --}}
                <div class="grid grid-cols-2 gap-4 mb-4">

                    {{-- Monto --}}
                    <div>

                        <x-jet-label value="Solicitud de prestamo de:" />
                        <x-jet-input wire:model="solicitud.monto" class="w-full" type="number"
                            placeholder="Ingrese el monto a solicitar" />

                        <x-jet-input-error for="solicitud.monto" />

                    </div>

                    {{-- Cuotas --}}
                    <div>

                        <x-jet-label value="Número de cuotas:" />
                        @if ($detalle_prestamo->cuotas == 60)

                            <x-jet-input value="60 cuotas" class="w-full bg-gray-100" type="text" disabled />
                        @else

                            <select wire:model="detalle_prestamo.cuotas" name="cuotas" id="cuotas"
                                class="form-control w-full">
                                <option value="12">12 cuotas</option>
                                <option value="18">18 cuotas</option>
                                <option value="24">24 cuotas</option>
                                <option value="36">36 cuotas</option>
                            </select>

                        @endif

                        <x-jet-input-error for="detalle_prestamo.cuotas" />
                        
                    </div>
                </div>

                {{-- Tipo de prestamo --}}
                <div>
                    <x-jet-label value="Tipo de prestamo" />
                    <div class="grid grid-cols-2 gap-2 mb-4">

                        @foreach ($prestamos as $prestamo)

                            <label class="cursor-pointer">
                                <input wire:model="solicitud.prestamo_id" value="{{ $prestamo->id }}" type="radio"
                                    name="prestamo_id">
                                
                                    <span class="uppercase">{{ $prestamo->name }}</span>
                            </label>

                        @endforeach
                    </div>

                    <x-jet-input-error for="solicitud.prestamo_id" />
                    
                </div>
                

            </div>
        </x-slot>



        <x-slot name="actions">

            {{-- <button class="btn btn-primary" type="submit">Crear nueva solicitud</button> --}}
            <x-jet-action-message class="mr-3" on="saved">
                Solicitud actualizada
            </x-jet-action-message>

            <x-jet-button>
                Actualizar solicitud
            </x-jet-button>

        </x-slot>


    </x-jet-form-section>

</div>
