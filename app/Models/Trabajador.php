<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = 'trabajadores';
    protected $primaryKey = 'codTrab';
    public $timestamps = false;
   protected $fillable = [
        'nomTrab',
        'appTrab',
        'apmTrab',
        'tdoTrab',
        'docTrab',
        'sexTrab',
        'emaTrab',
        'celTrab',
        'fnaTrab',
        'dirTrab',
        'rolTrab',
        'estTra',
        'regTrab'
    ];

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'codTrab', 'codTrab');
    }
}
