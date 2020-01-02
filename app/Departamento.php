<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'Departamento';
    protected $primaryKey = 'idDepartamento';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
