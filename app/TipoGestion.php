<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoGestion extends Model
{
    protected $table = 'Tipo_gestion';
    protected $primaryKey = 'idtipo_gestion';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
