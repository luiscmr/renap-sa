<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'Municipio';
    protected $primaryKey = 'idMunicipio';
    protected $fillable = ['nombre','departamento_id'];
    public $timestamps = false;
}
