{{-- <div class="p-10 text-black dark:text-white md:grid md:grid-cols-2 md:gap-4">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 dark:text-white my-3">
            {{ $propiedad->titulo }}
        </h3>

        <div class="">
            <p class="text-xl font-bold text-emerald-600 dark:text-emerald-400 mb-1">
                ${{ number_format($propiedad->precio, 0, ',', '.') }} <span class="text-xs font-normal text-emerald-800 dark:text-emerald-100">USD</span>
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ $propiedad->direccion . ', ' . $propiedad->ciudad . ', ' . $propiedad->provincia }}
            </p>
            <p>{{ $propiedad->tipoPropiedad->nombre }}</p>
            <div class="">
                <ul>
                    <li>Baños: {{ $propiedad->banos }}</li>
                    <li>Habitaciones: {{ $propiedad->habitaciones }}</li>
                    <li>Superficie: {{ $propiedad->superficie . 'm²' }}</li>
                </ul>
            </div>
            <p> {{ $propiedad->descripcion }} </p>
            <p> 
                Publicado por: <span class="text-sm text-gray-600 dark:text-gray-400">{{ $propiedad->usuario->name }}</span>
            </p>
        </div>
    </div>
    <div class="">
        <img src="{{ asset('storage/propiedades/portadas/' . $propiedad->imagen) }}"
            alt="Portada {{ $propiedad->titulo }}"
            class="w-full h-48 object-cover">
    </div>

    @guest
        <div class="w-full mt-5 text-center p-5 md:col-span-2 md:items-center bg-gray-200 dark:bg-gray-900 rounded-lg">
            <p class="text-xl font-bold text-black dark:text-white">
                ¿Te interesa la propiedad? <a class="font-bold text-indigo-600" href="{{ route('register') }}">Obten una cuenta y consulta sus detalles!</a>
            </p>
        </div>
    @endguest

    @auth
        Verifica que el usuario no sea el creador de la propiedad
        @if ($propiedad->user_id !== auth()->user()->id)
            <livewire:postular-comprador :propiedad="$propiedad" />
        @else
             Mensaje para el dueño de la propiedad
            <div class="p-5 mt-10 bg-gray-200 dark:bg-gray-900 rounded-lg flex justify-center flex-col items-center md:col-span-2">
                <p class="text-xl font-bold text-gray-800 dark:text-white">Esta es tu propiedad. No puedes postularte.</p>
            </div>
        @endif
    @endauth
</div> --}}

<div class="p-10 text-black dark:text-white">
    
    <div class="md:grid md:grid-cols-2 md:gap-8">
       
        <div class="mb-5">
            <h3 class="font-bold text-3xl text-gray-800 dark:text-white my-3">
                {{ $propiedad->titulo }}
            </h3>

            <div>
                <p class="text-xl font-bold text-emerald-600 dark:text-emerald-400 mb-1">
                    ${{ number_format($propiedad->precio, 0, ',', '.') }} <span class="text-xs font-normal text-emerald-800 dark:text-emerald-100">USD</span>
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ $propiedad->direccion . ', ' . $propiedad->ciudad . ', ' . $propiedad->provincia }}
                </p>
                <p class="mt-2">{{ $propiedad->tipoPropiedad->nombre }}</p>
                <div class="my-3">
                    <ul class="flex space-x-4 text-sm font-semibold">
                        <li class="p-2 bg-gray-100 dark:bg-gray-700 rounded-md">🚿 Baños: {{ $propiedad->banos }}</li>
                        <li class="p-2 bg-gray-100 dark:bg-gray-700 rounded-md">🛏️ Habitaciones: {{ $propiedad->habitaciones }}</li>
                        <li class="p-2 bg-gray-100 dark:bg-gray-700 rounded-md">📐 Superficie: {{ $propiedad->superficie . 'm²' }}</li>
                    </ul>
                </div>
                <p class="mt-4 text-gray-700 dark:text-gray-300">Descripción: {{ $propiedad->descripcion }} </p>
                <p class="mt-4 text-sm text-gray-500 dark:text-gray-400"> 
                    Publicado por: <span class="font-bold">{{ $propiedad->usuario->name }}</span>
                </p>
                <div class="flex justify-start items-center mt-4 gap-2">
                    <p class="font-bold text-gray-700 dark:text-gray-300">Para más información:</p>
                    <a href="#"><img src="{{asset('img/icons8-whatsapp.svg')}}" alt="Icono de WhatsApp"></a>
                </div>
                
            </div>
        </div>

        {{-- Portada de la publicación --}}
        <div class="mb-5">
            <img src="{{ asset('storage/propiedades/portadas/' . $propiedad->imagen) }}"
                alt="Portada {{ $propiedad->titulo }}"
                class="w-full h-full max-h-[400px] object-cover rounded-xl shadow-xl">
        </div>
    </div>

    <hr class="my-8 border-gray-200 dark:border-gray-700">

    {{-- Galeria de imagenes de la publicación --}}
    @if(is_array($propiedad->imagenes) && count($propiedad->imagenes) > 0)
        <div class="mt-5">
            <h3 class="font-bold text-2xl text-gray-800 dark:text-white mb-4">
                Galería de la Propiedad
            </h3>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($propiedad->imagenes as $imagenGaleria)
                    <div class="rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset('storage/propiedades/galeria/' . $imagenGaleria) }}" 
                            alt="Imagen de galería"
                            class="w-full h-48 object-cover">
                    </div>
                @endforeach
            </div>
        </div>
        <hr class="my-8 border-gray-200 dark:border-gray-700">
    @endif
    
    <div class="md:col-span-2">
        @guest
            <div class="w-full mt-5 text-center p-5 bg-gray-200 dark:bg-gray-900 rounded-lg">
                <p class="text-xl font-bold text-black dark:text-white">
                    ¿Te interesa la propiedad? <a class="font-bold text-indigo-600" href="{{ route('register') }}">Obtén una cuenta y consulta sus detalles!</a>
                </p>
            </div>
        @endguest

        @auth
            {{-- Verifica que el usuario no sea el creador de la propiedad --}}
            @if ($propiedad->user_id !== auth()->user()->id)
                <livewire:postular-comprador :propiedad="$propiedad" />
            @else
                {{-- Mensaje para el dueño de la propiedad --}}
                <div class="p-5 mt-10 bg-gray-200 dark:bg-gray-900 rounded-lg flex justify-center flex-col items-center">
                    <p class="text-xl font-bold text-gray-800 dark:text-white">Esta es tu propiedad. No puedes postularte.</p>
                </div>
            @endif
        @endauth
    </div>
</div>