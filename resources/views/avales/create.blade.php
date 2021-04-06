<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear nuevo aval
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        {!! Form::open(['route' => 'avales.store', 'class' => 'card']) !!}
        
            <div class="card-body">
                <h1 class="font-bold text-gray-700 text-lg mb-6">Crear aval</h1>

                <div class="mb-4">
                    {!! Form::label('name', 'Nombre del aval', ['class' => 'form-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control w-full']) !!}

                    <x-jet-input-error for="name" />
                </div>

                <div>
                    {!! Form::label('rut', 'Rut del aval', ['class' => 'form-label']) !!}
                    {!! Form::text('rut', null, ['class' => 'form-control w-full']) !!}
                    
                    <x-jet-input-error for="rut" />
                </div>
            </div>

            <div class="card-body bg-gray-100">
                <div class="flex justify-end">
                    <x-jet-danger-button type="submit">
                        Agregar aval
                    </x-jet-danger-button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

</x-app-layout>