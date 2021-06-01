<div>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight text-center">
            Solicitudes
        </h2>
    </x-slot>


    <div class="container py-12">


        <div class="mb-12">
            <div class="md:grid md:grid-cols-1 mb-12 px-4 py-5 sm:px-6 mt-5 md:mt-0 md:col-span-2 bg-white shadow overflow-hidden sm:rounded-lg">
                <h3 class="text-3xl leading-6 font-medium text-gray-900 text-center"><i class="fa fa-bullhorn" aria-hidden="true" style="color: #0342cb"></i>
                    Usted pertenece a la agencia <span class="capitalize">{{strtolower(auth()->user()->ejecutivo->agencia->name)}}</span>
                </h3>
                <h3 class="text-lg leading-6 font-medium text-gray-900 text-center">
                    Aquí encontrarás un resumen de las solicitudes</span>
                </h3>
               
            </div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <div class="text-center"><i class="fa fa-list fa-5x" style="color:#0342cb" aria-hidden="true"></i></div>
                        <div class="text-center text-5xl">{{$solicitudes->total()}}</div>
                        <div class="text-center text-xl">pendientes</div>
                    </div>
                </div>
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <div class="text-center"><i class="fa fa-thumbs-up fa-5x" style="color:#0342cb" aria-hidden="true"></i></div>
                        <div class="text-center text-5xl">{{$aprobados}}</div>
                        <div class="text-center text-xl">aprobadas</div>
                    </div>
                </div>
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <div class="text-center"><i class="fa fa-times fa-5x" style="color:#0342cb" aria-hidden="true"></i></div>
                        <div class="text-center text-5xl">{{$rechazados}}</div>
                        <div class="text-center text-xl">rechazadas</div>
                    </div>
                </div>

            </div>
        </div>


        <x-table-responsive>

            <div class="px-6 py-4 flex items-center">

                <x-jet-input type="text" class="mt-1 block flex-1" wire:model="search" placeholder="Escriba algo" />

                {{-- @livewire('ejecutivo.solicitud-create') --}}

            </div>

            

            @if ($solicitudes->count())
                <div class="relative">

                    <div wire:loading.flex 
                        wire:target="search"
                        class="absolute inset-0 bg-black bg-opacity-10 justify-center items-center">
                        <div class="rounded animate-spin ease duration-300 w-8 h-8 border-2 border-indigo-500"></div>
                    </div>
                    

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50" style="background-color: #0342cb">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Imponente
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Tipo Prestamo
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Monto solicitado
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Número de cuotas
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Comuna
                                </th>
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


                            @foreach ($solicitudes as $solicitud)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600 font-bold">
                                            {{ $solicitud->imponente->user->name }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $solicitud->prestamo->name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{moneda_chilena($solicitud->monto)}}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{$solicitud->detalle_prestamo->cuotas}} cuotas
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $solicitud->identificacion->comuna->name }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">

                                        @switch($solicitud->status)
                                            @case(1)

                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-white text-red-800">
                                                Borrador
                                            </span>

                                            @break
                                            @case(2)

                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-white text-yellow-800">
                                                Revisión
                                            </span>

                                            @break

                                            @case(3)

                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-white text-green-800">
                                                Aprobado
                                            </span>

                                            @break

                                            @default

                                        @endswitch


                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                        <a href="{{ route('ejecutivo.solicitudes.show', $solicitud) }}"
                                            class="btn btn-primary" style="background-color:#0342cb">Detalle</a>

                                    </td>
                                </tr>
                            @endforeach

                            <!-- More items... -->
                        </tbody>
                    </table>

                    
                </div>

                @if ($solicitudes->hasPages())
                    <div class="px-6 py-4">
                        {{ $solicitudes->links() }}
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
