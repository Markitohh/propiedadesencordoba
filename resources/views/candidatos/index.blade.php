<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Interesados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-center text-2xl font-bold mb-4">Interesados en "{{$propiedad->titulo}}"</h1>

                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full">
                            @forelse ($propiedad->candidatos as $candidato)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800 dark:text-white">{{$candidato->user->name}}</p>
                                        <p class="text-base text-gray-600 dark:text-white">{{$candidato->user->email}}</p>
                                        <p class="text-sm text-gray-600 dark:text-white font-bold">{{$candidato->created_at->diffForHumans()}}</p>
                                    </div>
                                    <div class="">
                                        <p class="text-base text-gray-800 dark:text-white">
                                            <span class="font-bold text-lg">Número: </span>{{$candidato->tel}}
                                        </p>
                                        <p class="text-base text-gray-800 dark:text-white">
                                            <span class="font-bold text-lg">Fecha: </span>{{$candidato->date->format('d/m/Y')}}
                                        </p>
                                        <p class="text-base text-gray-800 dark:text-white">
                                            <span class="font-bold text-lg">Horario: </span>{{$candidato->hour->format('H:i')}}
                                        </p>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm">No hay interesados en esta propiedad.</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
