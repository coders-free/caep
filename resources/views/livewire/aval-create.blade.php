<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Crear nuevo aval
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear aval
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre del aval" />
                <x-jet-input class="w-full" wire:model="name" type="text" placeholder="Escriba el nombre completo del aval" />
                <x-jet-input-error for="name" />
            </div>

            <div class="">
                <x-jet-label value="Rut del aval" />
                <x-jet-input class="w-full" wire:model="rut" type="number" placeholder="Escriba el número de RUT del aval" />
                <x-jet-input-error for="rut" />
            </div>
                    
        </x-slot>

        <x-slot name="footer">

            <x-jet-action-message class="mr-3 inline-block" on="saved">
                El post se creó con éxito
            </x-jet-action-message>


            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25" >
                Crear aval
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
