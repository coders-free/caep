<div>
    <button 
        class="btn btn-primary disabled:opacity-25"
        wire:click="$set('open', true)"
        wire:loading.attr="disabled">
        Editar
    </button>

    <x-jet-dialog-modal wire:model="open" maxWidth="lg">
        <x-slot name="title">
            Actualizar información de usuario
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

            <div class="mt-4">

                <x-jet-label value="Rol de usuario" class="mb-1" />

                <label class="text-sm text-gray-700 ">
                   <input class="mr-1" type="radio" name="rol" wire:model.defer="rol" value="imponente">
                   Imponente
                </label>

                <label class="text-sm text-gray-700 mx-3">
                    <input class="mr-1" type="radio" name="rol" wire:model.defer="rol" value="ejecutivo">
                    Ejecutivo
                </label>

                <label class="text-sm text-gray-700 ">
                    <input class="mr-1" type="radio" name="rol" wire:model.defer="rol" value="administrador">
                    Administrador
                </label>
           </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-button class="ml-4" 
                wire:click="update"
                wire:loading.attr="disabled"
                wire:target="update">
                {{ __('Actualizar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
