<div>
    <x-jet-form-section submit="update">
        <x-slot name="title">
            Aprobar solicitud
        </x-slot>

        <x-slot name="description">
            Nombre y rut del imponente
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6">
                <label class="mr-8">
                    <input type="radio" wire:model="solicitud.status" name="status" value="3">
                    Marcar solicitud como aprobada
                </label>
                
                <label>
                    <input type="radio" wire:model="solicitud.status" name="status" value="4">
                    Marcar solicitud como rechazada
                </label>
                <br>
                <x-jet-input-error for="solicitud.status" />
            </div>

            <div class="col-span-6">
                <x-jet-label value="Mensaje" />
                <textarea wire:model="mensaje" placeholder="Ingrese un mensaje que explique el motivo de aprobación o rechazo" class="form-control w-full" rows="6"></textarea>
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
