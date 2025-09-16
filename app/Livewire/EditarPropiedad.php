<?php

namespace App\Livewire;

use App\Models\Propiedad;
use Livewire\Component;
use App\Models\TipoPropiedad;
use Livewire\WithFileUploads;

class EditarPropiedad extends Component
{   
    public $id;
    public $titulo;
    public $tipo;
    public $precio;
    public $descripcion;
    public $banos;
    public $habitaciones;
    public $superficie;
    public $direccion;
    public $ciudad;
    public $provincia;
    public $imagen;
    public $imagenActual;
    public $imagenNueva;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'tipo' => 'required',
        'precio' => 'required|integer|min:1', 
        'descripcion' => 'required|string|min:20', 
        'banos' => 'required|integer|min:1', 
        'habitaciones' => 'required|integer|min:1', 
        'superficie' => 'required|integer|min:1', 
        'direccion' => 'required|string|min:10', 
        'ciudad' => 'required|string|min:3', 
        'provincia' => 'required|string|min:3',
        'imagenNueva' => 'nullable|image'
    ];

    public function mount(Propiedad $propiedad) {
        $this->id = $propiedad->id;
        $this->titulo = $propiedad->titulo;
        $this->tipo = $propiedad->tipo_id;
        $this->precio = $propiedad->precio;
        $this->descripcion = $propiedad->descripcion;
        $this->banos = $propiedad->banos;
        $this->habitaciones = $propiedad->habitaciones;
        $this->superficie = $propiedad->superficie;
        $this->direccion = $propiedad->direccion;
        $this->ciudad = $propiedad->ciudad;
        $this->provincia = $propiedad->provincia;
        $this->imagen = $propiedad->imagen;
        $this->imagenActual = $propiedad->imagenActual;
        $this->imagenNueva = $propiedad->imagenNueva;
    }

    public function editarPropiedad() {
        $datos = $this->validate();

        // Si hay una nueva imagen
        if($this->imagenNueva) {
            $imagen = $this->imagenNueva->store('public/propiedades/portadas');
            $datos['imagen'] = str_replace('public/propiedades/portadas/', '' , $imagen);
        }

        // Encontrar la propiedad a editar
        $propiedad = Propiedad::find($this->id);

        // Asignar los valores
        $propiedad->titulo = $datos['titulo'];
        $propiedad->tipo_id = $datos['tipo'];
        $propiedad->precio = $datos['precio'];
        $propiedad->descripcion = $datos['descripcion'];
        $propiedad->banos = $datos['banos'];
        $propiedad->habitaciones = $datos['habitaciones'];
        $propiedad->superficie = $datos['superficie'];
        $propiedad->direccion = $datos['direccion'];
        $propiedad->ciudad = $datos['ciudad'];
        $propiedad->provincia = $datos['provincia'];
        $propiedad->imagen = $datos['imagen'] ?? $propiedad->imagen;

        // Guardar propiedad
        $propiedad->save();

        // Redireccionar
        session()->flash('mensaje', 'Actualizado Correctamente');
        return redirect()->route('propiedades.index');
    }

    public function render()
    {   
        $tipoPropiedades = TipoPropiedad::all();

        return view('livewire.editar-propiedad', [
            'tipoPropiedades' => $tipoPropiedades
        ]);
    }
}
