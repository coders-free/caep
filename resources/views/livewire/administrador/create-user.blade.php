<div class="ml-2">
    <x-jet-danger-button
        class="disabled:opacity-25"
        wire:click.prefetch="$set('open', true)"
        wire:target="open"
        wire:loading.attr="disabled">
        Agregar usuario
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open" maxWidth="lg">
        <x-slot name="title">
            Agregue un nuevo usuario
        </x-slot>

        <x-slot name="content">
    
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.defer="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-jet-input-error for="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" wire:model.defer="email" :value="old('email')" required />
                <x-jet-input-error for="email" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" wire:model.defer="password" required autocomplete="new-password" />
                <x-jet-input-error for="password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" wire:model.defer="password_confirmation" required autocomplete="new-password" />
                <x-jet-input-error for="password_confirmation" />
            </div>

            <div x-data="{ rol: @entangle('rol') }">
                <div class="mt-4">

                    <x-jet-label value="Rol de usuario" class="mb-1" />

                    <label class="text-sm text-gray-700 mr-3">
                        <input class="mr-1" type="radio" name="rol" x-model="rol" value="ejecutivo">
                        Ejecutivo
                    </label>

                    <label class="text-sm text-gray-700 ">
                        <input class="mr-1" type="radio" name="rol" x-model="rol" value="administrador">
                        Administrador
                    </label>
                </div>

                <div class="mt-4" 
                    
                    :class="{'hidden' : rol != 'ejecutivo' }">
                
                    <div wire:ignore>

                        <label class="text-sm text-gray-700 ">
                            Administrador
                        </label>

                        
                        <select
                            style="width: 100%; display:block; height:4rem"
                            x-data
                            wire:key="myIdentifierHere"
                            x-ref="myIdentifierHere"
                            x-init="$($refs.myIdentifierHere).select2();
                                    $($refs.myIdentifierHere).on('change', function(e){
                                        @this.set('agencia_id', e.target.value);
                                    });"
                            class="js-example-basic-single" 
                            name="state">
                            @foreach ($agencias as $agencia)
                                <option value="{{$agencia->id}}">{{$agencia->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

            </div>
            

        </x-slot>

        <x-slot name="footer">
            <x-jet-button class="ml-4" 
                wire:click="create"
                wire:loading.attr="disabled"
                wire:target="create">
                {{ __('Register') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    
    @push('js')
        
    @endpush

</div>
