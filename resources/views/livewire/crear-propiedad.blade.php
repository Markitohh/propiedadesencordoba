<form class="md:w-1/2 space-y-5" enctype="multipart/form-data" novalidate wire:submit.prevent="crearPropiedad">

    <div>
        <x-input-label for="titulo" :value="__('Titulo Propiedad')" />
        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo" 
            :value="old('titulo')"
            placeholder="Titulo de la propiedad"
            autofocus />
        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="tipo" :value="__('Tipo de Propiedad')" />
        <select id="tipo" wire:model="tipo" class="block font-medium text-sm text-gray-700 dark:text-gray-300 border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option>--Seleccione--</option>

            @foreach($tipoPropiedades as $tipoPropiedad)
                <option value="{{ $tipoPropiedad->id }}">{{ $tipoPropiedad->nombre }}</option>
            @endforeach

        </select>
        @error('tipo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="precio" :value="__('Precio de la Propiedad')" />
        <x-text-input 
            id="precio" 
            class="block mt-1 w-full" 
            type="number" 
            wire:model="precio" 
            :value="old('precio')"
            placeholder="Precio de la propiedad" />
        @error('precio')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción de la Propiedad')" />
        <textarea 
            placeholder="Describe la propiedad" 
            wire:model="descripcion"
            id="descripcion" 
            cols="30" 
            rows="10" 
            class="h-auto resize-none block font-medium text-sm text-gray-700 dark:text-gray-300 border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">{{ old('descripcion') }}</textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="banos" :value="__('Número de Baños')" />
        <x-text-input 
            id="banos" 
            class="block mt-1 w-full" 
            type="number"
            min="1" 
            wire:model="banos" 
            :value="old('banos')"
            placeholder="Número de baños" />
        @error('banos')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="habitaciones" :value="__('Número de Habitaciones')" />
        <x-text-input 
            id="habitaciones" 
            class="block mt-1 w-full" 
            type="number"
            min="1" 
            wire:model="habitaciones" 
            :value="old('habitaciones')"
            placeholder="Número de habitaciones" />
        @error('habitaciones')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="superficie" :value="__('Superficie (m²)')" />
        <x-text-input 
            id="superficie" 
            class="block mt-1 w-full" 
            type="number" 
            min="1" 
            wire:model="superficie" 
            :value="old('superficie')"
            placeholder="Metros cuadrados" />
        @error('superficie')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="direccion" :value="__('Dirección')" />
        <x-text-input 
            id="direccion" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="direccion" 
            :value="old('direccion')"
            placeholder="Calle y número" />
        @error('direccion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="ciudad" :value="__('Ciudad')" />
        <x-text-input 
            id="ciudad" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="ciudad" 
            :value="old('ciudad')" 
            placeholder="Ciudad" />
        @error('ciudad')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="provincia" :value="__('Provincia')" />
        <x-text-input 
            id="provincia" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="provincia" 
            :value="old('provincia')" 
            placeholder="Provincia" />
        @error('provincia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen para la portada de la Propiedad')" />
        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="imagen"
            accept="image/*" />

        <div class="my-5">
            @if ($imagen) 
                <p>Imagen seleccionada: <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen seleccionada"></p>
            @endif
        </div>

        @error('imagen')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="imagenes" :value="__('Imágenes para la propiedad')" />
        <x-text-input 
            id="imagenes" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="imagenes"
            multiple
            accept="image/*" />
            @error('imagenes')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
            @error('imagenes.*')
                <livewire:mostrar-alerta :message="$message" />
            @enderror

            {{-- Vista previa --}}
            @if ($imagenes)
                <div class="my-5 grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ($imagenes as $img)
                        <div class="border rounded overflow-hidden">
                            <img src="{{ $img->temporaryUrl() }}" 
                                alt="Imagen seleccionada"
                                class="w-full h-32 object-cover">
                        </div>
                    @endforeach
                </div>
            @endif
    </div>

    <x-primary-button class="mx-auto w-full justify-center">
        {{ __('Crear Propiedad') }}
    </x-primary-button>
</form>
