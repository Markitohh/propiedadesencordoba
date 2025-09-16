<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Propiedad;

class HomePropiedades extends Component
{
    public function render()
    {
        $propiedades = Propiedad::all();

        return view('livewire.home-propiedades', [
            'propiedades' => $propiedades
        ]); 
    }
}
