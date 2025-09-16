<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarPropiedad extends Component
{   
    public $propiedad;

    public function render()
    {
        return view('livewire.mostrar-propiedad'); 
    }
}
