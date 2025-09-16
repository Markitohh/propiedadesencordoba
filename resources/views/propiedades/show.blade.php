<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $propiedad->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-5 md:m-0 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:mostrar-propiedad
                    :propiedad="$propiedad"
                />
            </div>
        </div>
    </div>
</x-app-layout>
