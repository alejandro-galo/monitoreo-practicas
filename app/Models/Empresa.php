<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $primaryKey = 'codEmp';
    public $timestamps = false;

protected $fillable = ['rucEmp', 'dirEmp', 'nomEmp', 'tipEmp', 'tefEmp', 'lonEmp', 'latEmp'];
}
