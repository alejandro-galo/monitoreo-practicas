<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // 👈 Importamos File para manejar archivos

class PracticaController extends Controller
{
    public function index(Request $request)
    {
        $query = Practica::where('estPra', 1)->with('carrera'); // Solo publicadas

        if ($request->filled('carrera')) {
            $query->where('codCar', $request->carrera);
        }
        $path = storage_path('app/visitas.txt'); // Archivo donde guardamos el contador
        $practicas = $query->get();
        $carreras = Carrera::all();
         if (!File::exists($path)) {
            File::put($path, 0);
        }      
          $visitas = (int) File::get($path);
         $visitas++;
        // Guardamos el nuevo valor
        File::put($path, $visitas);

        return view('practicas.index', compact('practicas', 'carreras','visitas'));
    }
public function show($id)
{
    $practica = Practica::with(['estudiante', 'docente', 'carrera', 'empresaAsignada'])
                        ->where('estPra', 1)
                        ->findOrFail($id);

    return view('practicas.show', compact('practica'));
}


}
