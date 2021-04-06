<div>
    <x-jet-form-section submit="update">
        <x-slot name="title">
            Solicitud de retiro
        </x-slot>

        <x-slot name="description">
            Información del monto solicitado
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6">
                <div class="flex items-center">
                    <x-jet-label value="Monto a solicitar:" class="mr-16" />
                    <x-jet-input wire:model="solicitud.monto" type="number" class="flex-1" />
                    
                </div>

                <div class="flex justify-end">
                    <x-jet-input-error class="mt-1" for="solicitud.monto" />
                </div>
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                Solicitud actualizada
            </x-jet-action-message>

            <x-jet-button>
                Actualizar solicitud
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
