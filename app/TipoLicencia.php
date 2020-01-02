<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoLicencia extends Model
{
    protected $table = 'Tipo_licencia';
    protected $primaryKey = 'idtipo_licencia';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
