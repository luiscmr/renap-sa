<?php

use App\EstadoCivil;
use App\TipoGestion;
use App\TipoLicencia;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        TipoGestion::create([
            'idtipo_gestion' => 1,
            'nombre' => 'Matrimonio'
        ]);
        TipoGestion::create([
            'idtipo_gestion' => 2,
            'nombre' => 'Divorcio'
        ]);
    }
}
