<div>

    <div class="card">
        <div class="card-body">
            {{-- Prestamo y cuotas --}}
            <div class="grid grid-cols-2 gap-4 mb-4">

                {{-- Monto --}}
                <div>

                    <x-jet-label value="Solicitud de prestamo de:" />
                    <x-jet-input wire:model="monto" class="w-full" type="number" placeholder="Ingrese el monto a solicitar" />

                    @error('monto')
                        <span class="invalid-feedback mt-2">{{$message}}</span>
                    @enderror

                </div>

                {{-- Cuotas --}}
                <div>
                    
                    <x-jet-label value="Número de cuotas:" />
                    @if ($cuotas == 60)
                        
                        <x-jet-input value="60 cuotas" class="w-full bg-gray-100" type="text" disabled />
                    @else
                    
                        <select wire:model="cuotas" name="cuotas" id="cuotas" class="form-control-2 w-full">
                            <option value="12">12 cuotas</option>
                            <option value="18">18 cuotas</option>
                            <option value="24">24 cuotas</option>
                            <option value="36">36 cuotas</option>
                        </select>

                    @endif

                    @error('cuotas')
                        <span class="invalid-feedback mt-2">{{$message}}</span>
                    @enderror
                </div>
            </div>

            {{-- Tipo de prestamo --}}
            <div>
                <x-jet-label value="Tipo de prestamo" />
                <div class="grid grid-cols-2 gap-2 mb-4">
                    
                        @foreach ($prestamos as $prestamo)
                            
                            <label>
                                <input wire:model="prestamo_id" value="{{$prestamo->id}}" type="radio" name="prestamo_id">
                                {{-- {!! Form::radio('prestamo_id', $prestamo->id, null, ['class' => 'mr-1']) !!} --}}
                                {{$prestamo->name}}
                            </label>

                        @endforeach
                </div>

                @error('prestamo_id')
                    <span class="invalid-feedback mt-2">{{$message}}</span>
                @enderror
            </div>


            @if ($avales->count())

                <hr class="mb-4">

                <div>
                    <x-jet-label value="Seleccione un aval de la lista" />

                    @foreach ($avales as $aval)
                        <div>
                            <label>
                                <input wire:model="aval_id" type="radio" name="aval_id" value="{{$aval->id}}">
                                {{$aval->name}}
                            </label>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    
                    <span class="block sm:inline">No has agregado ningún aval. Para continuar dirigete a la sección de <a class="font-bold underline" href="{{route('avales.create')}}">avales.</a></span>
                    
                </div>
            @endif

            <x-jet-input-error for="aval_id" />

        </div>

        <div class="card-footer bg-gray-50 border-t border-gray-100 flex justify-end">

            @if (auth()->user()->imponente->avales->count())

                <button class="btn btn-primary disabled:opacity-50" 
                    wire:click="save"
                    wire:loading.attr="disabled"
                    wire:target="save">
                    Crear solicitud
                </button>
                
            @else
                

                <button class="btn btn-primary disabled:opacity-50" disabled>
                    Crear solicitud
                </button>    

            @endif


            
        </div>
    </div>
</div>
