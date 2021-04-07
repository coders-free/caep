<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mis solicitudes
        </h2>
    </x-slot>


    <div class="container py-12">

        {{-- Tabla --}}

        <x-table-responsive>

            <div class="px-6 py-4 flex items-center">

                <x-jet-input type="text" class="mt-1 block flex-1" wire:model="search" placeholder="Escriba algo" />
                

                @livewire('solicitud-create')
                
            </div>

            @if ($this->solicitudes->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tipo de solicitud
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Monto solicitado
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha cierre
                            </th>
                            {{-- <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                N° cuotas
                            </th> --}}
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($this->solicitudes as $solicitud)
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600 font-bold uppercase">
                                        @if ($solicitud->prestamo_id)
                                            {{$solicitud->prestamo->name}}
                                        @else
                                            Solicitud de retiro
                                        @endif
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            
                                            @if ($solicitud->monto)
                                                {{moneda_chilena($solicitud->monto)}}
                                            @else
                                                
                                            @endif
                                            
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{$solicitud->created_at->format('d/m/Y')}}
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">

                                    @switch($solicitud->status)
                                        @case(1)

                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                Borrador
                                            </span>

                                            @break
                                        @case(2)

                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Revisión
                                            </span>

                                            @break

                                        @case(3)

                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Aprobado
                                            </span>

                                            @break

                                        @case(4)

                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Rechazado
                                            </span>

                                            @break

                                        @default
                                            
                                    @endswitch

                                    
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    @if ($solicitud->status == 1)
                                        <a href="{{route('solicitudes.edit', $solicitud)}}" class="btn btn-primary block w-20 text-center">Editar</a>
                                    @else
                                        <a href="{{route('solicitudes.show', $solicitud)}}" class="btn btn-secondary block w-20 text-center">Detalle</a>
                                    @endif
                                    
                                </td>
                            </tr>
                        @endforeach

                        <!-- More items... -->
                    </tbody>
                </table>

                @if ($this->solicitudes->hasPages())
                    <div class="px-6 py-4">
                        {{$this->solicitudes->links()}}
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
