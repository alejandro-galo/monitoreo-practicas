<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;

    protected $table = 'facultad';
    protected $primaryKey = 'codFac';
    public $timestamps = false;

    protected $fillable = [
        'nomFac',
        'tipoFac',
        'detFac'
    ];
}
