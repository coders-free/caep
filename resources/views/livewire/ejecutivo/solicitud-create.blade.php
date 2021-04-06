<div>
    <x-jet-danger-button class="ml-4" wire:click="$set('open', true)">
        Crear solicitud
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            ¿Qué tipo de solicitud quiere realizar?
        </x-slot>

        <x-slot name="content">

            
            <div class="card mb-2">
                
                <label class="card-body bg-gray-100 block cursor-pointer">
                    <input wire:model="type" value="1" type="radio" name="type">
                    Quiero solicitar un prestamo
                </label>

            </div>

            <div class="card">
                
                <label class="card-body bg-gray-100 block cursor-pointer">
                    <input wire:model="type" value="2" type="radio" name="type">
                    Quiero solicitar un retiro de fondos
                </label>
                
            </div>

            <x-jet-input-error class="mt-1" for="type" />

            <div class="mt-4" wire:ignore>
                <x-jet-label value="Imponente" />

                <select class="w-full select2 py-1" style="width: 100%" name="imponente_id">
                    @foreach ($imponentes as $imponente)
                        <option value="{{$imponente->id}}">{{$imponente->user->name}}</option>
                    @endforeach
                </select>

            </div>

            <div class="mt-4">
                <x-jet-label value="Monto a solicitar" />
                <x-jet-input wire:model="monto" type="text" class="w-full" placeholder="Ingrese el monto a solicitar" />
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

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        $('.select2').on('change', function(e){
            @this.set('imponente_id', e.target.value);
        })

    </script>

</div>

{{-- <div>

    <x-jet-danger-button class="ml-4" wire:click="$set('open', true)">
        Crear solicitud
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear solicitud
        </x-slot>

        <x-slot name="content">

            <div class="flex items-center justify-between" wire:ignore>

                <x-jet-label value="Nombre del imponente:" />
                
                <select class="select2 w-72" name="imponente_id">
                    @foreach ($imponentes as $imponente)
                        <option value="{{$imponente->id}}">{{$imponente->user->name}}</option>
                    @endforeach
                    
                </select>
                
            </div>

            <div class="grid grid-cols-2 gap-4 my-4">

                
                <div>

                    <x-jet-label value="Solicitud de prestamo de:" />
                    <x-jet-input wire:model="monto" class="w-full" type="number" placeholder="Ingrese el monto a solicitar" />
                    <x-jet-input-error for="monto" />

                </div>

                
                <div>
                        
                    <x-jet-label value="Número de cuotas:" />
                    @if ($cuotas == 60)
                        
                        <x-jet-input value="60 cuotas" class="w-full bg-gray-100" type="text" disabled />
                    @else
                    
                        <select wire:model="cuotas" name="cuotas" id="cuotas" class="form-control w-full">
                            <option value="12">12 cuotas</option>
                            <option value="18">18 cuotas</option>
                            <option value="24">24 cuotas</option>
                            <option value="36">36 cuotas</option>
                        </select>

                    @endif

                    <x-jet-input-error for="cuotas" />
                </div>

            </div>

            <div>
                <x-jet-label value="Tipo de prestamo" />
                <div class="grid grid-cols-2 gap-2 mb-4">
                    
                        @foreach ($prestamos as $prestamo)
                            
                            <label>
                                <input wire:model="prestamo_id" value="{{$prestamo->id}}" type="radio" name="prestamo_id">
                                {{$prestamo->name}}
                            </label>

                        @endforeach
                </div>

                @error('prestamo_id')
                    <span class="invalid-feedback mt-2">{{$message}}</span>
                @enderror
            </div>

            @if ($this->avales->count())

                <hr class="mb-4">

                <x-jet-label value="Seleccione un aval de la lista" />

                @foreach ($this->avales as $aval)
                    <div>
                        <label>
                            <input wire:model="aval_id" type="radio" name="aval_id" value="{{$aval->id}}">
                            {{$aval->name}}
                        </label>
                    </div>
                @endforeach

            @endif


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

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        $('.select2').on('change', function(e){
            @this.set('imponente_id', e.target.value);
        })

    </script>
</div> --}}
