<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';
    protected $primaryKey = 'codCar';
    public $timestamps = false;

    protected $fillable = [
        'codFac',
        'nomCar',
        'detCar',
        'logCar'
    ];

    public function facultad()
    {
        return $this->belongsTo(Facultad::class, 'codFac');
    }
}

