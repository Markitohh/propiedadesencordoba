{{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

    @foreach ($propiedades as $propiedad)
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="leading-10">
                <a href="#" class="text-xl font-bold">{{$propiedad->titulo}}</a>
                <span class="
                    inline-block px-2 py-1 text-xs font-semibold rounded-full
                    @switch($propiedad->tipoPropiedad->nombre)
                        @case('Casa') bg-blue-100 text-blue-800 @break
                        @case('Departamento') bg-green-100 text-green-800 @break
                        @case('Terreno') bg-yellow-100 text-yellow-800 @break
                        @default bg-gray-100 text-gray-800
                    @endswitch
                ">
                    {{ $propiedad->tipoPropiedad->nombre }}
                </span>
            </div>
        </div>    
    @endforeach

</div> --}}
<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

        @if($propiedades->count() === 0)
            <p class="text-gray-500 dark:text-gray-300 text-center">
                No has publicado propiedades aún.
            </p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @if (session('mensaje'))
                    <div class="bg-green-500 text-white p-2 rounded mb-3">
                        {{ session('mensaje') }}
                    </div>
                @endif

                @foreach ($propiedades as $propiedad)
                    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-700 flex flex-col">

                        {{-- Imagen de portada --}}
                        <a href="{{ route('propiedades.show', $propiedad->id) }}">
                            <img src="{{ asset('storage/propiedades/portadas/' . $propiedad->imagen) }}"
                            alt="Portada {{ $propiedad->titulo }}"
                            class="w-full h-48 object-cover">
                        </a>

                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <div>
                                {{-- Título --}}
                                <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-1">
                                    {{ $propiedad->titulo }}
                                </h2>

                                {{-- Tipo de propiedad (badge) --}}
                                <span class="
                                    inline-block px-3 py-1 text-xs font-semibold rounded-full mb-2
                                    @switch($propiedad->tipoPropiedad->nombre)
                                        @case('Casa') bg-blue-100 text-blue-800 @break
                                        @case('Departamento') bg-green-100 text-green-800 @break
                                        @case('Terreno') bg-yellow-100 text-yellow-800 @break
                                        @case('Oficina') bg-purple-100 text-purple-800 @break
                                        @case('Cochera') bg-pink-100 text-pink-800 @break
                                        @case('Galpón') bg-orange-100 text-orange-800 @break
                                        @case('Local') bg-red-100 text-red-800 @break
                                        @case('Locales') bg-red-100 text-red-800 @break
                                        @default bg-gray-100 text-gray-800
                                    @endswitch
                                ">
                                    {{ $propiedad->tipoPropiedad->nombre }}
                                </span>

                                {{-- Precio --}}
                                <p class="text-xl font-bold text-emerald-600 dark:text-emerald-400 mb-1">
                                    ${{ number_format($propiedad->precio, 0, ',', '.') }}
                                </p>

                                {{-- Dirección --}}
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    📍 {{ $propiedad->direccion }}
                                </p>
                            </div>

                            {{-- Botones de acción --}}
                            <div class="mt-4 flex gap-2">
                                <a href="{{route('propiedades.edit', $propiedad->id)}}"
                                class="flex-1 text-center inline-block items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-3 py-2 rounded-lg transition">
                                    ✏️ Editar
                                </a>

                                <a class="flex-1 text-center bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-semibold px-3 py-2 rounded-lg transition" href="{{ route('candidatos.index', $propiedad) }}">👥 Interesados</a>

                                <div class="flex-1">
                                    <button 
                                        wire:click="$dispatch('mostrarAlerta', { propiedadId: {{ $propiedad->id }} })"
                                        class="w-full bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-3 py-2 rounded-lg transition">
                                        🗑️ Eliminar
                                    </button>

                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>

            {{-- Paginación --}}
            <div class="mt-6">
                {{ $propiedades->links() }}
            </div>
        @endif

    </div>
</div>

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Livewire.on('mostrarAlerta', ({ propiedadId }) => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esto",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('eliminarPropiedad', { propiedadId });
            }
        });
    });

    Livewire.on('propiedadEliminada', () => {
        Swal.fire({
            icon: 'success',
            title: 'Eliminado!',
            text: 'La propiedad fue eliminada',
            confirmButtonText: 'Aceptar'
        });
    });
</script>
@endpush