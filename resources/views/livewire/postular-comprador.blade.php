<div class="p-5 mt-10 bg-gray-600 dark:bg-gray-900 rounded-lg flex justify-center flex-col items-center md:col-span-2">
    <h3 class="text-center text-1xl font-bold my-4">Agendar un Zoom</h3>

    @if (session()->has('mensaje'))
        <div class="uppercase bg-green-200 border border-green-800 text-green-800 font-bold p-2 my-5">
            {{session('mensaje')}}
        </div>
    @else
        <form wire:submit.prevent='postularme' class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="date" :value="__('Fecha')" />
                <x-text-input 
                    id="date" 
                    class="block mt-1 w-full" 
                    type="date" 
                    wire:model="date" 
                    :value="old('date')" 
                    placeholder="Fecha que desees" />
                @error('date')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="hour" :value="__('Hora')" />
                <x-text-input 
                    id="hour" 
                    class="block mt-1 w-full" 
                    type="time"
                    min="09:00"
                    max="17:00"
                    wire:model="hour" 
                    :value="old('hour')" 
                    placeholder="Hora que desees" />
                @error('hour')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>
            <div>
                <x-input-label for="tel" :value="__('Tu Número de Celular')" />
                <x-text-input 
                    id="tel" 
                    class="block mt-1 w-full" 
                    type="tel"
                    wire:model="tel" 
                    :value="old('tel')"
                    placeholder="Número de Celular" />
                @error('tel')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>

            <x-primary-button class="mx-auto w-full justify-center my-5">
                {{ __('Enviar Datos') }}
            </x-primary-button>
        </form>
    @endif
</div>
