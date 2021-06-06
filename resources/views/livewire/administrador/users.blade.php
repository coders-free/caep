<div>

    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight text-center">
            Lista de usuarios
        </h2>
    </x-slot>

    <div class="container py-12">
        <x-table-responsive>
            <div class="px-6 py-4 flex items-center">

                <x-jet-input type="text" class="mt-1 block flex-1" wire:model="search" placeholder="Escriba algo" />

                @livewire('administrador.create-user')

            </div>

            @if ($users->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50" style="background-color: #0342cb">
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
                    <tbody class="bg-indigo-50 divide-y divide-gray-200">
                        @foreach ($users as $item)
                            <tr id="{{$item->id}}">
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


                                        @livewire('administrador.edit-user', ['user' => $item], key($item->id))

                                        <x-jet-danger-button
                                            class="ml-2"
                                            wire:click="$emit('deleteUser', {{$item->id}})">
                                            Eliminar
                                        </x-jet-danger-button>
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

    @push('script')
        

        <script>

            Livewire.on('deleteUser', userId => {

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Una vez eliminado no podrás revertirlo",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    
                    if (result.isConfirmed) {
                        Livewire.emit('delete', userId);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })
        </script>
        
    @endpush
</div>
