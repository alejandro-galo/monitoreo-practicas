<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey = 'codEst';
    public $timestamps = false;

    protected $fillable = [
        'nomEst',
         'appEst',
          'emaEst', 
          'codCar'
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'codCar', 'codCar');
    }
}
