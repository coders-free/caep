<div>
    <a class="btn btn-danger ml-2" wire:click="$set('open', true)">
        <i class="fas fa-trash"></i>
    </a>

    <x-jet-confirmation-modal wire:model="open" maxWidth="xl">
        <x-slot name="title">
            ¿Estás seguro que quieres eliminar?
        </x-slot>

        <x-slot name="content">
            Se eliminará la información del aval {{$aval->name}}
        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="delete" wire:loading.attr="disabled" class="disabled:opacity-25">
                Eliminar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
