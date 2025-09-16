<?php

namespace App\Livewire;

use App\Models\Propiedad;
use App\Notifications\NuevoCandidato;
use Livewire\Component;

class PostularComprador extends Component
{   
    public $date;
    public $hour;
    public $tel;
    public $propiedad;

    protected $rules = [
        'date' => ['required', 'date', 'after:yesterday'],
        'hour' => ['required', 'date_format:H:i'],
        'tel' => ['required', 'string', 'regex:/^\+?\d{1,15}$/'],
    ];

    public function mount(Propiedad $propiedad)
    {
        $this->propiedad = $propiedad;
    }

    public function messages()
    {
        return [
            'date.required' => 'La fecha es obligatoria.',
            'date.after' => 'La fecha debe ser a partir de hoy.',
            'hour.required' => 'La hora es obligatoria.',
            'hour.date_format' => 'La hora no es válida.',
            'tel.required' => 'El teléfono es obligatorio.',
            'tel.regex' => 'El número de teléfono no es válido.',
        ];
    }

    public function postularme()
    {   
        $datos = $this->validate();

        $this->propiedad->candidatos()->create([
            'user_id' => auth()->user()->id,
            'propiedad_id' => $this->propiedad->id,
            'date' => $datos['date'],
            'hour' => $datos['hour'],
            'tel' => $datos['tel']
        ]);

        $this->propiedad->vendedor->notify(new NuevoCandidato($this->propiedad->id, $this->propiedad->titulo, auth()->user()->id));

        session()->flash('mensaje', 'Se envío correctamente');
        return redirect()->back();
    }


    public function render()
    {
        return view('livewire.postular-comprador'); 
    }
}
