<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

class PropiedadesController extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Propiedad::class);
        return view('propiedades.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Propiedad::class);
        return view('propiedades.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Propiedad $propiedad)
    {
        return view('propiedades.show', [
            'propiedad' => $propiedad
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Propiedad $propiedad)
    {
        $this->authorize('update', $propiedad);
        return view('propiedades.edit', [
            'propiedad' => $propiedad
        ]);
    }
}
