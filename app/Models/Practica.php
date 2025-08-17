<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estudiante;
use App\Models\Trabajador;
use App\Models\Carrera;
use App\Models\Usuario;
class Practica extends Model
{
    protected $table = 'practicas';
    protected $primaryKey = 'codPra';
    public $timestamps = false;

    // Campos REALES que sí existen en la tabla
    protected $fillable = [
        'codEst',
        'codTrab',
        'codEA',
        'codSem',
        'codUsu',
        'codCar',
        'titPra',
        'iniPra',
        'finPra',
        'hraPra',
        'resPra',
        'arcPra',
        'imgPra',
        'estPra',
        'regPra'
    ];

    // Relaciones

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'codEst');
    }

    public function docente()
    {
        return $this->belongsTo(Trabajador::class, 'codTrab');
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'codCar');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'codUsu');
    }

    // codEA, si representa empresa asignada o evaluador
    public function empresaAsignada()
    {
        return $this->belongsTo(Empresa::class, 'codEA');
    }
}
