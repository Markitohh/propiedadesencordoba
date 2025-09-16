<?php

namespace App\Livewire;

use App\Models\Propiedad;
use Livewire\Component;
use App\Models\TipoPropiedad;
use Livewire\WithFileUploads;

class CrearPropiedad extends Component
{
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
    public $imagenes = [];

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
        'imagen' => 'required|image|max:2048', 
        'imagenes' => 'required|array|min:1', 
        // 'imagenes.*' => 'image|max:2048',
    ];

    public function crearPropiedad()
    {
        $datos = $this->validate();

        // Almacenar la imagen de portada
        $imagen = $this->imagen->store('public/propiedades/portadas');
        $datos['imagen'] = str_replace('public/propiedades/portadas/', '', $imagen);

        // Almacenar las imagenes de galeria
        $imagenes = [];
        if ($this->imagenes) {
            foreach ($this->imagenes as $imagen) {
                $ruta = $imagen->store('public/propiedades/galeria');
                $imagenes[] = str_replace('public/propiedades/galeria/', '', $ruta);
            }
        }
        $datos['imagenes'] = $imagenes;

        // Crear propiedad
        Propiedad::create([
            'titulo' => $datos['titulo'],
            'tipo_id' => $datos['tipo'],
            'precio' => $datos['precio'],
            'descripcion' => $datos['descripcion'],
            'banos' => $datos['banos'],
            'habitaciones' => $datos['habitaciones'],
            'superficie' => $datos['superficie'],
            'direccion' => $datos['direccion'],
            'ciudad' => $datos['ciudad'],
            'provincia' => $datos['provincia'],
            'imagen' => $datos['imagen'],
            'imagenes' => $datos['imagenes'],
            'user_id' => auth()->user()->id, 
        ]);

        // Mensaje de éxito
        session()->flash('mensaje', 'Propiedad creada correctamente.');

        // Redireccionar
        return redirect()->route('propiedades.index');
    }

    public function render()
    {
        // Consultar DB
        $tipoPropiedades = TipoPropiedad::all();

        return view('livewire.crear-propiedad', [
            'tipoPropiedades' => $tipoPropiedades
        ]);
    }
}
