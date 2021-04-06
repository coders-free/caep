<div>
    <x-jet-form-section submit="update">

        <x-slot name="title">
            Datos del aval
        </x-slot>

        <x-slot name="description">
            Nombre y rut del imponente
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6">
                <x-jet-label value="Nombre del aval" />
                <x-jet-input type="text" wire:model="aval.name" class="w-full" />
                <x-jet-input-error for="aval.name" />
            </div>

            <div class="col-span-6">
                <x-jet-label value="Rut del aval" />
                <x-jet-input type="number" wire:model="aval.rut" class="w-full" />
                <x-jet-input-error for="aval.rut" />
            </div>
        </x-slot>

        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="saved">
                Actualizado
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>

        </x-slot>

    </x-jet-form-section>
</div>
