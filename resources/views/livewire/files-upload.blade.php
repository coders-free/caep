<div>
    <x-jet-form-section submit="save">
        <x-slot name="title">
            Subir documentos
        </x-slot>

        <x-slot name="description">
            En esta sección podrá subir documentos que quiera anexar a su solicitud
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6">

                <x-jet-label value="Archivos adjuntos" />

                <input class="w-full" type="file" wire:model="files" multiple>

                <p class="text-xs mt-2">*Luego de seleccionar los archivos, debes hacer click al botón guardar</p>

                <x-jet-input-error for="files.*" />

                @if ($solicitud->files)
                    <ul class="grid grid-cols-1 gap-2 mt-4 text-gray-600 text-sm">
                        @foreach ($solicitud->files as $file)
                            
                            <li class="flex justify-between items-center">
                                
                                {{$file->url}}

                                <button 
                                    wire:click="delete({{$file}})"
                                    class="btn btn-danger float-right text-xs">
                                    <i class="fas fa-trash"></i>
                                </button>
                                
                            </li>

                            <hr>
                        @endforeach
                    </ul>
                @endif
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>
    
            <x-jet-button wire:loading.attr="disabled" wire:target="files">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
