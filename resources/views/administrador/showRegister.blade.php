<x-administrador-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Crear nuevo usuario
        </h2>
    </x-slot> --}}

    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('administrador.register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

           <div class="mt-4">

                <x-jet-label value="Rol de usuario" />

                <label class="text-xs text-gray-700 ">
                   <input class="mr-1" type="radio" name="rol" value="imponente">
                   Imponente
                </label>

                <label class="text-xs text-gray-700 mx-3">
                    <input class="mr-1" type="radio" name="rol" value="ejecutivo">
                    Ejecutivo
                </label>

                <label class="text-xs text-gray-700 ">
                    <input class="mr-1" type="radio" name="rol" value="administrador">
                    Administrador
                </label>
           </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-administrador-layout>