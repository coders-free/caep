<div>
    <x-jet-form-section submit="save">
        <x-slot name="title">
            <div class="text-center"><i class="fa fa-money fa-5x" style="color:#b19d78" aria-hidden="true">Up</i></div>
        </x-slot>

        <x-slot name="description">
            <div class="text-center">En esta sección podrá subir documentos que quiera anexar a su solicitud</div>
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6">

                <x-jet-label value="Archivos adjuntos" />

                <input class="w-full" type="file" wire:model="files" multiple>

                <p class="text-lg text-red-600 mt-2">NOTA: en esta sección debe adjuntar: fotocopia Carnet de Identidad por ambos lados, de usted y Aval, liquidaciones de sueldos de ambos. Si usted es Carabinero debe adjuntar su TIPCAR</p>
                <p class="text-xs text-red-600 mt-2">*Luego de seleccionar los archivos, debes hacer click al botón guardar</p>

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
                Información actualizada
            </x-jet-action-message>
    
            <x-jet-button wire:loading.attr="disabled" wire:target="files">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
