<div>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight text-center">
            Mis solicitudes
        </h2>
    </x-slot>


    <div class="container py-12">

        @if (session('info'))
            <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                </svg>
                <p>{{ session('info') }}</p>
            </div>

        @endif

        {{-- Tabla --}}

        <x-table-responsive>

            <div class="px-6 py-4 flex items-center">

                <x-jet-input type="text" class="mt-1 block flex-1" wire:model="search" placeholder="Escriba algo" />


                @livewire('imponente.solicitud-create')

            </div>


            @if ($this->solicitudes->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50" style="background-color: #0342cb">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Tipo de solicitud
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Monto solicitado
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Fecha cierre
                            </th>
                            {{-- <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                N° cuotas
                            </th> --}}
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Estado
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-indigo-50 divide-y divide-gray-200">

                        @foreach ($this->solicitudes as $solicitud)
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600 font-bold uppercase">
                                        @if ($solicitud->prestamo_id)
                                            {{ $solicitud->prestamo->name }}
                                        @else
                                            Solicitud de retiro
                                        @endif
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">

                                            @if ($solicitud->monto)
                                                {{ moneda_chilena($solicitud->monto) }}
                                            @else

                                            @endif

                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $solicitud->created_at->format('d/m/Y') }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">

                                    @switch($solicitud->status)
                                        @case(1)

                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-white text-gray-800">
                                                Borrador
                                            </span>

                                        @break
                                        @case(2)

                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-white text-gray-800">
                                                Revisión
                                            </span>

                                        @break

                                        @case(3)

                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-white text-gray-800">
                                                Aprobado
                                            </span>

                                        @break

                                        @case(4)

                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Rechazado
                                            </span>

                                        @break

                                        @default

                                    @endswitch


                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    @if ($solicitud->status == 1)
                                        <a href="{{ route('solicitudes.edit', $solicitud) }}"
                                            class="btn btn-primary block w-20 text-center"
                                            style="background-color:#0342cb">Editar</a>
                                    @else
                                        <a href="{{ route('solicitudes.show', $solicitud) }}"
                                            class="btn btn-secondary block w-20 text-center"
                                            style="background-color:#0342cb">Detalle</a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach

                        <!-- More items... -->
                    </tbody>
                </table>

                @if ($this->solicitudes->hasPages())
                    <div class="px-6 py-4">
                        {{ $this->solicitudes->links() }}
                    </div>
                @endif


            @else

                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>

            @endif

        </x-table-responsive>

    </div>

    @push('js')


        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Livewire.on('complete_imponente', function() {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Debe completar los datos de imponente para poder crear una solicitud',
                    footer: '<a href="/imponente">¿Quieres dirigirte a la ruta de imponente?</a>'
                })
            })

        </script>

    @endpush

</div>
