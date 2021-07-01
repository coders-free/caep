<div>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight text-center">
            <i class="fa fa-university" aria-hidden="true"></i>
            Total Ahorrado: {{moneda_chilena(auth()->user()->imponente->fondos)}}
        </h2>
    </x-slot>
    
    <div class="container py-12">
        <x-table-responsive>
            <div class="px-6 py-4 flex items-center">

                <x-jet-input type="text" class="mt-1 block flex-1" wire:model="search" placeholder="Escriba algo" />
                
            </div>

            @if ($creditos->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50" style="background-color: #0342cb">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Tipo de prestamo
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Fecha cierre
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Monto prestado
                            </th>
                            
                           
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Numero de cuotas
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Monto de cuota
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Fecha de vencimiento
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-indigo-50 divide-y divide-gray-200">

                        @foreach ($creditos as $credito)
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600 font-bold uppercase">
                                        {{$credito->prestamo->name}}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600">
                                        {{$credito->fecha_cierre->format('d/m/Y')}}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600">
                                        {{moneda_chilena($credito->monto_prestamo)}}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600">
                                        {{$credito->numero_cuotas}} cuotas
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600">
                                        {{moneda_chilena($credito->monto_cuota)}}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600">
                                        {{$credito->fecha_vencimiento}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <!-- More items... -->
                    </tbody>
                </table>

                @if ($creditos->hasPages())
                    <div class="px-6 py-4">
                        {{$creditos->links()}}
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
