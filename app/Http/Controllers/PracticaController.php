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
        $practicas = $query->get();
        $carreras = Carrera::all();
        
        $file = storage_path('../app/visitas.txt'); // Archivo donde guardamos el contador
         if (!File::exists($file)) {
            File::put($file, 0);
        }      
          $visitas = (int) file_get_contents($file);

         $visitas++;
        // Guardamos el nuevo valor
        file_put_contents($file, $visitas);

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
