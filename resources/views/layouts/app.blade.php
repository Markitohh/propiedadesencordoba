<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer class="bg-white dark:bg-gray-900 shadow-inner mt-12">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                    <div class="md:col-span-1 flex flex-col items-center md:items-start">
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('propiedades.index') }}">
                                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                            </a>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">
                            Encuentra la propiedad de tus sueños.
                        </p>
                    </div>

                    <div class="md:col-span-1">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Enlaces Útiles</h3>
                        <ul class="space-y-2">
                            <li><a href="/" class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors duration-300">Inicio</a></li>
                            <li><a href="#propiedades" class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors duration-300">Propiedades</a></li>
                            <li><a href="{{route('login')}}" class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors duration-300">Iniciar Sesión</a></li>
                            <li><a href="{{route('register')}}" class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors duration-300">Crear Cuenta</a></li>
                        </ul>
                    </div>

                    <div class="md:col-span-1">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Síguenos</h3>
                        <div class="flex justify-center md:justify-start space-x-4">
                            <a href="https://www.facebook.com/profile.php?id=61578384661763" class="text-gray-500 dark:text-gray-400 hover:text-blue-500 transition-colors duration-300" target="_blank" rel="noopener noreferrer">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.5c-.828 0-.5.364-.5 1v2h2l-.25 2h-1.75v6h-3v-6h-2v-2h2v-2c0-1.657 1.343-3 3-3h3v3z"/></svg>
                            </a>
                            {{-- <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-blue-400 transition-colors duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557a9.967 9.967 0 01-2.829.775 4.932 4.932 0 002.16-2.723 9.873 9.873 0 01-3.131 1.192 4.93 4.93 0 00-8.384 4.512A13.921 13.921 0 013.7 3.5a4.93 4.93 0 001.52 6.58A4.914 4.914 0 011.6 9.5a4.922 4.922 0 004.92 4.92A4.93 4.93 0 012 15.5a4.93 4.93 0 006.51 4.71 9.872 9.872 0 01-6.103 2.115A14.075 14.075 0 0010.5 22c5.65 0 8.74-4.675 8.74-8.74 0-.133-.003-.266-.007-.399a6.388 6.388 0 001.564-1.624z"/></svg>
                            </a>
                            <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-red-500 transition-colors duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-3.79 0-4.272.016-5.751.083-1.492.072-2.585.394-3.504.764-.9.37-1.6.864-2.261 1.526-.662.662-1.156 1.361-1.526 2.261-.37 1.054-.692 2.147-.764 3.504-.067 1.479-.083 1.961-.083 5.751s.016 4.272.083 5.751c.072 1.492.394 2.585.764 3.504.37.9.864 1.6 1.526 2.261.662.662 1.361 1.156 2.261 1.526 1.054.37 2.147.692 3.504.764 1.479.067 1.961.083 5.751.083s4.272-.016 5.751-.083c1.492-.072 2.585-.394 3.504-.764.9-.37 1.6-.864 2.261-1.526.662-.662 1.156-1.361 1.526-2.261.37-1.054.692-2.147.764-3.504.067-1.479.083-1.961.083-5.751s-.016-4.272-.083-5.751c-.072-1.492-.394-2.585-.764-3.504-.37-.9-.864-1.6-1.526-2.261-.662-.662-1.361-1.156-2.261-1.526-1.054-.37-2.147-.692-3.504-.764-1.479-.067-1.961-.083-5.751-.083zm0 4a8 8 0 100 16 8 8 0 000-16zm6 4a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM12 9a3 3 0 110 6 3 3 0 010-6z"/></svg>
                            </a> --}}
                        </div>
                    </div>
                </div>

                <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-8 text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        &copy; {{ date('Y') }} 
                        Developed by 
                        <a 
                            href="http://marcoscordoba.site/" 
                            class="border-b-2 border-indigo-600 text-indigo-600 hover:text-indigo-900 dark:text-white dark:hover:text-gray-600 transition-colors duration-300"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Marcos Cordoba
                        </a>. Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </footer>

        @livewireScripts
        @stack('scripts')
    </body>
</html>
