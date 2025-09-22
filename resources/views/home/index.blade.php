<x-app-layout>
    <div class="py-16 bg-gray-50 dark:bg-gray-800 overflow-hidden lg:py-24">
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
                <div class="relative py-12 md:py-20 lg:py-24">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="md:flex md:justify-between md:items-center md:gap-12">
                            
                            <div class="md:w-3/5 text-center md:text-left mb-8 md:mb-0">
                                <h2 class="text-5xl leading-tight font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-6xl lg:text-7xl animate__animated animate__bounceInLeft">
                                    La propiedad que <span class="text-indigo-600 dark:text-indigo-400">siempre quisiste!</span>
                                </h2>
                                <p class="mt-6 max-w-xl mx-auto md:mx-0 text-xl text-gray-600 dark:text-gray-300 animate__animated animate__bounceInUp">
                                    Encuentra la propiedad de tus sueños en Córdoba. Desde cabañas hasta una casa, ¡y mucho más!
                                </p>
                                
                                <div class="mt-8">
                                    <a href="{{ route('propiedades.create') }}" 
                                    class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-lg text-white bg-indigo-600 hover:bg-indigo-700 transition duration-300 animate__animated animate__fadeIn animate__delay-1s">
                                        Publica tu Propiedad Ahora
                                    </a>
                                </div>
                            </div>
                            
                            <div class="md:w-2/5 flex justify-center md:justify-end">
                                <img 
                                    src="{{ asset('img/icon-header.svg') }}" 
                                    alt="Icono del subtitulo"
                                    class="w-48 h-auto object-cover md:w-full max-w-sm transform hover:scale-105 transition duration-500 ease-in-out animate__animated animate__backInRight"
                                />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <livewire:home-propiedades/>
</x-app-layout>