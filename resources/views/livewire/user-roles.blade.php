<div>
    <div class="container py-12">
        <x-table-responsive>
            <div class="px-6 py-4 flex items-center">

                <x-jet-input type="text" class="mt-1 block flex-1" wire:model="search" placeholder="Escriba algo" />

                @livewire('create-user')

            </div>

            @if ($users->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50" style="background-color: #B19D78">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Nombre
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Email
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Rol
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->id }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->name }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->email }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 capitalize">
                                        {{ $item->roles->first()->name }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 flex justify-end">


                                        @livewire('edit-role', ['user' => $item], key($item->id))

                                        {{-- <button 
                                            class="btn btn-primary disabled:opacity-25"
                                            wire:click="edit({{$item}})"
                                            wire:loading.attr="disabled"
                                            wire:target="edit({{$item}})">
                                            Editar
                                        </button> --}}
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($users->hasPages())
                    <div class="px-6 py-4">
                        {{ $users->links() }}
                    </div>
                @endif
            @else

                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>

            @endif
        </x-table-responsive>
    </div>
</div>