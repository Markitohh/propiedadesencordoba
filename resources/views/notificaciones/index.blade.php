<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tus Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-center text-2xl font-bold mb-4">Notificaciones</h1>
                    <div class="divide-y divide-gray-200">
                        @forelse ($notificaciones as $notificacion)
                            <div class="p-5 lg:flex lg:justify-between lg:items-center">
                                <div class="">
                                    <p>Tienes un nuevo interesado en la propiedad en:
                                        <span class="font-bold"> {{ $notificacion->data['nombre_propiedad'] }}</span>
                                    </p>
                                    <p>
                                        <span class="font-bold"> {{ $notificacion->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                                <div class="mt-5 lg:mt-0">
                                    <a class="bg-indigo-500 inline-block transition delay-150 duration-300 ease-in-out hover:scale-110 hover:bg-indigo-800 hover:-translate-y-1 p-3 text-sm uppercase font-bold text-white rounded-lg" href="{{route('candidatos.index', $notificacion->data['id_propiedad'])}}">Ver Interesados</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-900 dark:text-gray-100 text-center">No hay notificaciones nuevas.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
