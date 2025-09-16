<div class="p-10 text-black dark:text-white md:grid md:grid-cols-2 md:gap-4">
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
                Vendido por: <span class="text-sm text-gray-600 dark:text-gray-400">{{ $propiedad->usuario->name }}</span>
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
        {{-- Verifica que el usuario no sea el creador de la propiedad --}}
        @if ($propiedad->user_id !== auth()->user()->id)
            <livewire:postular-comprador :propiedad="$propiedad" />
        @else
            {{-- Mensaje para el dueño de la propiedad --}}
            <div class="p-5 mt-10 bg-gray-200 dark:bg-gray-900 rounded-lg flex justify-center flex-col items-center md:col-span-2">
                <p class="text-xl font-bold text-gray-800 dark:text-white">Esta es tu propiedad. No puedes postularte.</p>
            </div>
        @endif
    @endauth
</div>
