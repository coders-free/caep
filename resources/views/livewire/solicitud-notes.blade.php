<div>
    <x-jet-form-section submit="save">

        <x-slot name="title">
            Agregue una nota
        </x-slot>

        <x-slot name="description">
            Estas notas aparecerán en la bitacora de la solicitud
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6">
                <x-jet-label value="Mensaje" />
                <textarea wire:model="mensaje" class="form-control w-full" placeholder="Agrege una nota a la solicitud" rows="4"></textarea>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>
</div>
