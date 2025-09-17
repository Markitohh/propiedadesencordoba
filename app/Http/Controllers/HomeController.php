<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {   
        $propiedad = Propiedad::all();
        return view('home.index', [
            'propiedad' => $propiedad
        ]);
    }
}
