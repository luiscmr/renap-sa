<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'Estado_civil';
    protected $primaryKey = 'idEstado_civil';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
