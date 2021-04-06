<div>
    <x-jet-form-section submit="save">
        <x-slot name="title">
            Bitácora
        </x-slot>

        <x-slot name="description">
            Aquí encontrará las notas que ha agregado a la solicitud
        </x-slot>


        <x-slot name="form">
            <div class="text-gray-900 col-span-6">
                <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                    @forelse ($notes as $note)
                        @if ($loop->index % 2 == 0)
                            
                        
                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                <div class="w-0 flex-1 flex items-center">
                                   
                                    <span class="ml-2 flex-1 w-0 truncate">
                                        {{$note->name}}
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <span class="font-medium text-indigo-600 hover:text-indigo-500">
                                        {{$note->created_at->format('d/m/Y')}}
                                    </span>
                                </div>
                            </li>

                        @else

                            <li class="bg-gray-100 pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                <div class="w-0 flex-1 flex items-center">
                                    <span class="ml-2 flex-1 w-0 truncate">
                                        {{$note->name}}
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <span class="font-medium text-indigo-600 hover:text-indigo-500">
                                        {{$note->created_at->format('d/m/Y')}}
                                    </span>
                                </div>
                            </li>

                        @endif

                    @empty
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                            <div class="w-0 flex-1 flex items-center">
                                <span class="ml-2 flex-1 w-0 truncate">
                                    No ha agregado ninguna nota a esta solicitud
                                </span>
                            </div>
                            
                        </li>
                    @endforelse
                </ul>
            </div>
        </x-slot>


    </x-jet-form-section>
</div>
