<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">
                Archivos adjuntos
            </h3>

            <p class="mt-1 text-sm text-gray-600">
                Lista de archivos adjuntos a la solicitud
            </p>
        </div>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">

        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
            
            <ul class="grid grid-cols-1 gap-2 mt-4 text-gray-600 text-sm">


                @forelse ($solicitud->files as $file)

                    <li class="flex justify-between items-center">

                        {{ $file->url }}

                        <button wire:click="export({{$file}})" class="btn btn-primary float-right text-xs">
                            <i class="fas fa-download"></i>
                        </button>

                    </li>

                    <hr>

                @empty

                    <p class="text-center">No se ha adjuntado ningún archivo con esta solicitud</p>

                @endforelse
            </ul>
            
        </div>

    </div>
</div>
