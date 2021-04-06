<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Avales
        </h2>
    </x-slot>

    <div class="container py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table-responsive>

            <div class="px-6 py-3 flex items-center justify-between">
                <x-jet-input type="text" class="flex-1 mr-4" placeholder="Ingrese una palabra para empezar a filtar"
                    wire:model="search" />

                @livewire('aval-create', ['imponente' => $imponente])

            </div>

            @if ($avales->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rut
                            </th>

                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($avales as $aval)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $aval->name }}
                                        </div>

                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $aval->rut }}
                                    </div>

                                </td>

                                <td class="px-6 py-4 text-sm font-medium">

                                    <div class="flex justify-end items-center">
                                        <a href="{{route('avales.edit', $aval)}}" class="btn btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        @livewire('aval-delete', ['aval' => $aval], key($aval->id))

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More items... -->
                    </tbody>
                </table>

            @else

                <div class="px-6 py-4 bg-white">
                    No hay ningún registro coincidente
                </div>

            @endif

            {{-- Paginacion --}}
            @if ($avales->hasPages())

                <div class="px-6 py-3">
                    {{ $avales->links() }}
                </div>

            @endif

        </x-table-responsive>


    </div>
</div>
