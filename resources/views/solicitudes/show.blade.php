<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle solicitud
        </h2>
    </x-slot>

    <div class="container py-12">
        @if ($solicitud->prestamo_id == 1)
            <div class="mb-12">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">

                            @switch($solicitud->status)
                                @case(2)
                                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold">¡Información!</strong>
                                        <span class="block sm:inline">Esta solicitud se encuentra en revisión.</span>
                                    </div>
                                @break
                                @case(3)
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold">¡Información!</strong>
                                        <span class="block sm:inline">Esta solicitud se encuentra aprobada.</span>
                                    </div>
                                @break

                                @case(4)
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold">¡Información!</strong>
                                        <span class="block sm:inline">Esta solicitud se encuentra en rechazado.</span>
                                    </div>
                                @break
                                @default

                            @endswitch
                            
                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 md:col-span-2 bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Resumen de solicitudes
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                El monto solicitado para retirar es {{ moneda_chilena($solicitud->monto) }}
                            </p>
                        </div>
                        <div class="border-t border-gray-200">

                        </div>
                    </div>

                </div>
            </div>
        @else

            {{-- Solicitud de prestamo --}}
            <article class="mb-16">
                <h1 class="text-gray-700 font-bold text-lg mb-2">Solicitud de prestamo</h1>

                <div class="card">
                    <div class="card-body">
                        <div class="grid grid-cols-2 gap-24">
                            <div class="flex items-center justify-between">

                                <h2 class="block uppercase tracking-wide text-gray-600 font-bold">Prestamo:</h2>

                                <p class="form-control-2 w-1/2 text-center">{{ moneda_chilena($solicitud->monto) }}
                                </p>

                            </div>

                            <div class="flex items-center justify-between">

                                <h2 class="block uppercase tracking-wide text-gray-600 font-bold">Cuotas:</h2>

                                <p class="form-control-2 w-1/2 text-center">{{ $solicitud->detalle_prestamo->cuotas }}
                                </p>

                            </div>

                        </div>

                        <div class="grid grid-cols-2 gap-24 mt-6">
                            <div class="flex items-center justify-between">

                                <h2 class="block uppercase tracking-wide text-gray-600 font-bold">Monto cuota:</h2>

                                <p class="form-control-2 w-1/2 text-center">
                                    {{ monto_cuota($solicitud->monto, $solicitud->detalle_prestamo->cuotas) }}</p>

                            </div>

                            <div class="flex items-center justify-between">

                                <h2 class="block uppercase tracking-wide text-gray-600 font-bold">Fecha vencimiento:
                                </h2>

                                <p class="form-control-2 w-1/2 text-center">
                                    {{ parse($solicitud->detalle_prestamo->fecha_vencimiento)->format('d/m/Y') }}</p>

                            </div>

                        </div>
                    </div>
                </div>
            </article>

            {{-- Identificación del imponente --}}
            <article class="mb-16">
                <h1 class="text-gray-700 font-bold text-lg mb-2">Identificación del imponente</h1>

                <div class="card">
                    <div class="card-body">

                        <div class="grid grid-cols-5 gap-6">
                            <div class="col-span-4">
                                <label class="form-label">Nombre completo</label>
                                <p class="form-control-2">{{ auth()->user()->name }}</p>
                            </div>

                            <div class="col-span-1">
                                <label class="form-label">RUT</label>
                                <p class="form-control-2">{{ auth()->user()->imponente->rut }}</p>
                            </div>

                            <div class="col-span-3">
                                <label class="form-label">Domicilio</label>
                                <p class="form-control-2">{{ auth()->user()->imponente->identificacion->direccion }}
                                </p>
                            </div>

                            <div class="col-span-1">
                                <label class="form-label">Region</label>
                                <p class="form-control-2">
                                    {{ auth()->user()->imponente->identificacion->region->name }}</p>
                            </div>

                            <div class="col-span-1">
                                <label class="form-label">Comuna</label>
                                <p class="form-control-2">
                                    {{ auth()->user()->imponente->identificacion->comuna->name }}</p>
                            </div>
                            {{-- ------------------- --}}
                            <div class="col-span-1">
                                <label class="form-label">Fecha Nacimiento</label>
                                <p class="form-control-2">
                                    {{ auth()->user()->imponente->identificacion->fecha_nacimiento->format('d/m/Y') }}
                                </p>
                            </div>

                            <div class="col-span-1">
                                <label class="form-label">Sexo</label>
                                <p class="form-control-2">{{ auth()->user()->imponente->identificacion->sexo->name }}
                                </p>
                            </div>

                            <div class="col-span-1">
                                <label class="form-label">Estado civil</label>
                                <p class="form-control-2">
                                    {{ auth()->user()->imponente->identificacion->estadoCivil->name }}
                                </p>
                            </div>

                            <div class="col-span-2">
                                <label class="form-label">Celular</label>
                                <p class="form-control-2">{{ auth()->user()->imponente->identificacion->celular }}
                                </p>
                            </div>

                            <div class="col-span-5">
                                <label class="form-label">Separación de bienes</label>
                                @if (auth()->user()->imponente->identificacion->separacion)
                                    <p class="form-control-2">Con separacion de vienes</p>
                                @else
                                    <p class="form-control-2">Sin separacion de vienes</p>
                                @endif
                            </div>

                        </div>

                    </div>
                </div>
            </article>

            {{-- Lugar de trabajo --}}
            <article class="mb-16">
                <h1 class="text-gray-700 font-bold text-lg mb-2">Datos lugar de trabajo</h1>

                <div class="card">
                    <div class="card-body">

                        <div class="grid grid-cols-5 gap-6">

                            <div class="col-span-3">
                                <label class="form-label">Reparticion</label>
                                <p class="form-control-2">{{ $solicitud->trabajo->reparticion }}</p>
                            </div>

                            <div class="col-span-1">
                                <label class="form-label">Cargo</label>
                                <p class="form-control-2">{{ $solicitud->trabajo->cargo->name }}</p>
                            </div>

                            <div class="col-span-1">
                                <label class="form-label">Antiguedad</label>
                                <p class="form-control-2">{{ $solicitud->trabajo->antiguedad->format('d/m/Y') }}</p>
                            </div>

                            <div class="col-span-3">
                                <label class="form-label">Domicilio</label>
                                <p class="form-control-2">{{ $solicitud->trabajo->direccion }}</p>
                            </div>

                            <div class="col-span-1">
                                <label class="form-label">Region</label>
                                <p class="form-control-2">{{ $solicitud->trabajo->region->name }}</p>
                            </div>

                            <div class="col-span-1">
                                <label class="form-label">Comuna</label>
                                <p class="form-control-2">{{ $solicitud->trabajo->comuna->name }}</p>
                            </div>

                        </div>

                    </div>
                </div>
            </article>

            {{-- Datos de bancario --}}
            <article class="mb-16">
                <h1 class="text-gray-700 font-bold text-lg mb-2">Datos bancarios</h1>

                <div class="card">
                    <div class="card-body">

                        <div class="grid grid-cols-2 gap-6 mt-6">

                            <div>
                                <h2 class="form-label">Banco</h2>
                                <p class="form-control-2 w-full">{{ $solicitud->bancario->banco }}</p>

                            </div>

                            <div>
                                <h2 class="form-label">Número de cuenta</h2>
                                <p class="form-control-2 w-full">{{ $solicitud->bancario->numero_cuenta }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </article>

        @endif

    </div>
</x-app-layout>
