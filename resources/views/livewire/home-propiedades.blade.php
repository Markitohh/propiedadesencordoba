<div>
    <div id="propiedades" class="p-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 dark:text-white mb-12">
                Nuestras Propiedades Disponibles
            </h3>
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl overflow-hidden p-6 md:p-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($propiedades as $propiedad)
            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <a href="{{ route('propiedades.show', $propiedad->id) }}" class="block">
                    <div class="h-56 overflow-hidden rounded-t-xl">
                        <img 
                            src="{{ asset('storage/propiedades/portadas/' . $propiedad->imagen) }}"
                            alt="{{ 'Imagen de la propiedad ' . $propiedad->titulo }}" 
                            class="w-full h-full object-cover"
                        >
                    </div>

                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">
                            {{ $propiedad->titulo }}
                        </h3>
                        <p class="text-xl font-semibold text-emerald-600 dark:text-emerald-400 mb-2">
                            Precio: ${{ number_format($propiedad->precio, 0, ',', '.') }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-1">
                            <span class="font-semibold">Ubicación:</span> {{ $propiedad->direccion }}, {{ $propiedad->ciudad }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            <span class="font-semibold">Publicado por:</span> {{ $propiedad->usuario->name }}
                        </p>
                        <div class="mt-2">
                            <a 
                                class="bg-indigo-500 inline-block transition delay-150 duration-300 ease-in-out hover:scale-110 hover:bg-indigo-800hover:-translate-y-1 p-3 text-sm uppercase font-bold text-white rounded-lg" 
                                href="{{route('propiedades.show', $propiedad->id)}}">
                                Ver Propiedad
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p class="col-span-full p-6 text-center text-lg text-gray-600 dark:text-gray-400">
                No hay propiedades publicadas en este momento.
            </p>
        @endforelse
    </div>
</div>
        </div>
    </div>
</div>