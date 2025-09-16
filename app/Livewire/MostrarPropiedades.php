<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Propiedad;
use Livewire\Attributes\On;

class MostrarPropiedades extends Component
{

    protected $listeners = ['eliminarPropiedad'];

    #[On('eliminarPropiedad')]
    public function eliminarPropiedad($propiedadId)
    {
        $propiedad = Propiedad::find($propiedadId);

        if ($propiedad) {
            $propiedad->delete();
            $this->dispatch('propiedadEliminada');
        }
    }

    public function render()
    {
        $propiedades = Propiedad::with('tipoPropiedad')->where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.mostrar-propiedades', [
            'propiedades' => $propiedades
        ]); 
    }
}
