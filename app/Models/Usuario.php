<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'codUsu';
    public $timestamps = false;

    protected $fillable = ['codTrab', 'pasUsu'];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'codTrab', 'codTrab');
    }
}
