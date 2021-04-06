<div>
    {{-- <x-jet-label for="datepicker" value="Dirección" />
    <x-jet-input id="datepicker" type="text" class="mt-1 block w-full"
        wire:model="fecha_nacimiento" />
    <x-jet-input-error for="datepicker" class="mt-2" />

    <script>
        document.addEventListener('livewire:load', function () {
            $( function() {
                $( "#datepicker" ).datepicker();
            } );
        })
    </script> --}}
    <input
    x-data
    x-ref="input"
    x-init="$('$refs.input').datepicker()"
    type="text"
    {{ $attributes }}
    >
</div>