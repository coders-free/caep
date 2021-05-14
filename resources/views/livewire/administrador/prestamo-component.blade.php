<div>


    <header class="bg-white shadow" style="background-color: #20335a">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-white leading-tight">
                    Prestamos
                </h2>
        
            </div>
        </div>
    </header>

    <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-12">
        <x-table-responsive>

            <div class="px-6 py-4 flex items-center">

                <x-jet-input type="text" class="mt-1 block flex-1" wire:model="search" placeholder="Escriba algo" />

                <div class="ml-2">
                    @livewire('administrador.create-prestamo')
                </div>

            </div>

            @if ($prestamos->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50" style="background-color: #b19d78">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Name
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Status
                            </th>

                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($prestamos as $prestamo)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600 font-bold uppercase">
                                        {{ $prestamo->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600 font-bold">
                                        @if ($prestamo->active)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Desactivo
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600 font-bold">
                                        <div class="flex justify-end">
                                            <button class="btn btn-primary disabled:opacity-50"
                                                wire:click="edit({{$prestamo->id}})"
                                                wire:loading.attr="disabled"
                                                wire:target="edit({{$prestamo->id}})"
                                                >
                                                Editar
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                @if ($prestamos->hasPages())
                    <div class="px-6 py-4">
                        {{ $prestamos->links() }}
                    </div>
                @endif

            @else

                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>

            @endif


        </x-table-responsive>
    </div>

    
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            ¿Qué tipo de solicitud quiere realizar?
        </x-slot>

        <x-slot name="content">
            <div class="mb-2">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" 
                            wire:model.defer="prestamo.name"
                            class="w-full" 
                            placeholder="Nombre del prestamo"/>
                <x-jet-input-error for="prestamo.name" />
            </div>

            <div class="mb-2">
                <x-jet-label value="Cuotas" />

                <div class="grid grid-cols-2 gap-x-6">
                    @foreach ($cuotas as $index => $cuota)
                        <label>
                            <input wire:model.defer="prestamo_cuotas.{{$cuota->id}}" type="checkbox" value="{{$cuota->id}}">
                            {{$cuota->value}} cuotas
                        </label>
                    @endforeach

                </div>
            </div>


            <div>

                <x-jet-label value="Estado" />

                <label>
                    <input type="radio" wire:model.defer="prestamo.active" name="active" value="1">
                    Activo
                </label>

                <label>
                    <input type="radio" wire:model.defer="prestamo.active" name="active" value="0">
                    Desactivo
                </label>
            </div>

        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-primary disabled:opacity-50" 
                    wire:click="save"
                    wire:loading.attr="disabled"
                    wire:target="save">
                    Actualizar
            </button>
        </x-slot>
    </x-jet-dialog-modal>
    
</div>
