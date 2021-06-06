<div>
    <x-jet-form-section submit="update">
        <x-slot name="title">
            
        </x-slot>

        <x-slot name="description">
            
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6">
                <label class="mr-8">
                    <input type="radio" wire:model="solicitud.status" name="status" value="3" required>
                    Marcar solicitud como aprobada
                </label>
                
                <label>
                    <input type="radio" wire:model="solicitud.status" name="status" value="4" required>
                    Marcar solicitud como rechazada
                </label>
                <br>
                <x-jet-input-error for="solicitud.status" />
            </div>

            <div class="col-span-6">
                <x-jet-label value="Mensaje" />
                <textarea wire:model.defer="mensaje" placeholder="Ingrese un mensaje que explique el motivo de aprobación o rechazo" class="form-control w-full" rows="6"></textarea>
                <x-jet-input-error for="mensaje" />
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
