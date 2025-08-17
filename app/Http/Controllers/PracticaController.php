<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use App\Models\Carrera;
use Illuminate\Http\Request;

class PracticaController extends Controller
{
    public function index(Request $request)
    {
        $query = Practica::where('estPra', 1)->with('carrera'); // Solo publicadas

        if ($request->filled('carrera')) {
            $query->where('codCar', $request->carrera);
        }

        $practicas = $query->get();
        $carreras = Carrera::all();

        return view('practicas.index', compact('practicas', 'carreras'));
    }
public function show($id)
{
    $practica = Practica::with(['estudiante', 'docente', 'carrera', 'empresaAsignada'])
                        ->where('estPra', 1)
                        ->findOrFail($id);

    return view('practicas.show', compact('practica'));
}


}
