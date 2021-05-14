<div>

    <x-jet-form-section submit="update">
        <x-slot name="title">
            <div class="text-center"><i class="fa fa-info-circle fa-5x" style="color:#b19d78" aria-hidden="true"></i></div>
        </x-slot>

        <x-slot name="description">
            <div class="text-center">Aquí puedes modificar la información de la solicitud</div>
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

                        <select wire:model="detalle_prestamo.cuotas" name="cuotas" id="cuotas"
                                class="form-control w-full">
                                @foreach ($cuotas as $cuota)
                                
                                    <option value="{{$cuota->value}}">{{$cuota->value}} cuotas</option>
                                    
                                @endforeach
                        </select>

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
                Información actualizada
            </x-jet-action-message>

            <x-jet-button>
                Actualizar solicitud
            </x-jet-button>

        </x-slot>


    </x-jet-form-section>

</div>
