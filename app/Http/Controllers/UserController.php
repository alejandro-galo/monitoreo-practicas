<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practica;
use App\Models\Carrera;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
{
    $estado = $request->input('estado');     // 0 o 1
    $carreraFiltro = $request->input('carrera');   // codCar

    // Obtener el docente en sesión
    $codTrab = session('trabajador_id');
    
    if (!$codTrab) {
        abort(403, 'No se encontró el código del docente en la sesión.');
    }

    // Obtener carreras activas del docente
    $carrerasDocente = \DB::table('trabajadores_carreras')
        ->where('codTrab', $codTrab)
        ->where('estTC', 1)
        ->pluck('codCar');

    // Construir consulta base
    $query = Practica::with('carrera')
        ->whereIn('codCar', $carrerasDocente);

    // Filtrar por estado si está presente
    if ($estado !== null && $estado !== '') {
        $query->where('estPra', $estado);
    }

    // Filtrar por carrera si está presente
    if ($carreraFiltro !== null && $carreraFiltro !== '') {
        $query->where('codCar', $carreraFiltro);
    }

    $practicas = $query->get();

    // Obtener todas las carreras del docente para filtro
    $carreras = \DB::table('carreras')->whereIn('codCar', $carrerasDocente)->get();

    // Obtener nombre de la carrera principal para el título
    $nombreCarrera = $carreras->first()->nomCar ?? 'todas';

    return view('user', [
        'practicas' => $practicas,
        'carreras' => $carreras,
        'filtroEstado' => $estado,
        'filtroCarrera' => $carreraFiltro,
        'nombreCarrera' => $nombreCarrera
    ]);
}
public function asesorados()
{
    $codTrab = session('trabajador_id');

    if (!$codTrab) {
        abort(403, 'No se encontró el código del docente en la sesión.');
    }

    // Traer prácticas donde codTrab = docente en sesión
    $practicas = Practica::with('carrera')
        ->where('codTrab', $codTrab)
        ->get();

    return view('user.asesorados', [
        'practicas' => $practicas
    ]);
}

}
