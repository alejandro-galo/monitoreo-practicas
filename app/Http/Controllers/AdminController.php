<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Carrera;
use App\Models\Practica;
use App\Models\Empresa;
use App\Models\Facultad;
class AdminController extends Controller
{

    public function indexCarrera()
{
    $carreras = Carrera::with('facultad')->get();
    return view('admin.carreras.index', compact('carreras'));
}

public function createCarrera()
{
    $facultades = Facultad::all(); // Para el select
    return view('admin.carreras.create', compact('facultades'));
}
    public function storeCarrera(Request $request)
{
    $request->validate([
        'codFac' => 'required|exists:facultad,codFac',
        'nomCar' => 'required|string|max:255',
        'detCar' => 'nullable|string',
        'logCar' => 'nullable|string|max:255',
    ]);

    Carrera::create($request->all());

    return redirect('/admin/Carreras')
        ->with('success', 'Carrera registrada correctamente.');
}
    
    public function guardarFacultad(Request $request)
    {
    $request->validate([
        'nomFac' => 'required|string|max:255',
        'tipoFac' => 'required|integer',
        'detFac' => 'nullable|string',
    ]);

    Facultad::create([
        'nomFac' => $request->nomFac,
        'tipoFac' => $request->tipoFac,
        'detFac' => $request->detFac,
    ]);

    return redirect()->back()->with('success', 'Facultad registrada correctamente.');
    }

     public function store(Request $request)
    {
        $request->validate([
            'nomFac' => 'required|string|max:255',
            'tipoFac' => 'required|integer',
            'detFac' => 'nullable|string',
        ]);

        Facultad::create([
            'nomFac' => $request->nomFac,
            'tipoFac' => $request->tipoFac,
            'detFac' => $request->detFac,
        ]);

return redirect('/admin/Facultad')
    ->with('success', 'Facultad registrada correctamente.');
    }


    public function addCar (){
        return view('admin.addCar');
    }
    public function  carrera (){

        $Carreras =Carrera::all();
        return view('admin.Carrera', compact('Carreras'));

    }
        public function addfacu()
    {
        return view('admin.facultad.add');
    }
      public function facu()
    {
        $facultades = Facultad::all();
        return view('admin.facultad.index', compact('facultades'));
    }
    public function index()
    {
        $trabajadores = Trabajador::all();
        return view('admin.trabajadores.index', compact('trabajadores'));
    }
    public function docentes()
    {
        $docentes = Trabajador::where('rolTrab', 2)->get();
        return view('admin.docentes', compact('docentes'));
    }

    public function formNuevoDocente()
    {
        return view('admin.form-docente');
    }
    public function guardarDocente(Request $request)
{
    $request->validate([
        'nomTrab' => 'required|string|max:100',
        'appTrab' => 'required|string|max:100',
        'emaTrab' => 'required|email|unique:trabajadores,emaTrab',
    ]);

    \App\Models\Trabajador::create([
        'nomTrab' => $request->nomTrab,
        'appTrab' => $request->appTrab,
        'emaTrab' => $request->emaTrab,
        'rolTrab' => 2, // Docente
    ]);

    return redirect('/admin/docentes')->with('success', 'Docente creado correctamente.');
}



// ...

public function estudiantes()
{
    $estudiantes = Estudiante::with('carrera')->get();
    return view('admin.estudiantes', compact('estudiantes'));
}

public function formNuevoEstudiante()
{
    $carreras = Carrera::all(); // para el select
    return view('admin.form-estudiante', compact('carreras'));
}

public function guardarEstudiante(Request $request)
{
    $request->validate([
        'nomEst' => 'required|string|max:100',
        'appEst' => 'required|string|max:100',
        'emaEst' => 'required|email|unique:estudiantes,emaEst',
        'codCar' => 'required|exists:carreras,codCar',
    ]);

    Estudiante::create($request->all());

    return redirect('/admin/estudiantes')->with('success', 'Estudiante creado correctamente.');
}


// ...

public function empresas()
{
    $empresas = Empresa::all();
    return view('admin.empresas', compact('empresas'));
}

public function formNuevaEmpresa()
{
    return view('admin.form-empresa');
}

public function guardarEmpresa(Request $request)
{
    $request->validate([
        'rucEmp' => 'required|string|max:20',
        'nomEmp' => 'required|string|max:150',
        'dirEmp' => 'nullable|string|max:255',
        'tefEmp' => 'nullable|string|max:20',
        'tipEmp' => 'required|in:1,2',
        'latEmp' => 'nullable|string|max:50',
        'lonEmp' => 'nullable|string|max:50',
    ]);

    Empresa::create($request->all());

}


public function practicas()
{
$practicas = Practica::with(['estudiante', 'empresaAsignada', 'docente'])->get();
    return view('admin.practicas', compact('practicas'));
}

public function formNuevaPractica()
{
    $estudiantes = \App\Models\Estudiante::all();
    $empresas = \App\Models\Empresa::all();
    $docentes = \App\Models\Trabajador::where('rolTrab', 2)->get();

    return view('admin.form-practica', compact('estudiantes', 'empresas', 'docentes'));
}

public function guardarPractica(Request $request)
{
    $request->validate([
        'codEst' => 'required|exists:estudiantes,codEst',
        'codTrab' => 'required|exists:trabajadores,codTrab',
        'codEA' => 'required|exists:empresas,codEmp',
        'codCar' => 'required|exists:carreras,codCar',
        'codSem' => 'required|integer|min:1|max:19',
        'titPra' => 'required|string|max:255',
        'hraPra' => 'nullable|string|max:100',
        'iniPra' => 'required|date',
        'finPra' => 'required|date|after_or_equal:iniPra',
        'resPra' => 'nullable|string',
        'estPra' => 'required|in:0,1',
    ]);

    Practica::create([
        'codEst' => $request->codEst,
        'codTrab' => $request->codTrab,
        'codEA' => $request->codEA,
        'codCar' => $request->codCar,
        'codSem' => $request->codSem,
        'codUsu' => auth()->user()->codUsu ?? 1, // fallback si no hay login real
        'titPra' => $request->titPra,
        'iniPra' => $request->iniPra,
        'finPra' => $request->finPra,
        'hraPra' => $request->hraPra ?? '360',
        'resPra' => $request->resPra,
        'arcPra' => 'documento.pdf', // automático
        'imgPra' => 'imagen.jpg',    // automático
        'estPra' => $request->estPra,
        'regPra' => now(),
    ]);

    return redirect('/admin/practicas')->with('success', 'Práctica registrada correctamente.');
}


}
