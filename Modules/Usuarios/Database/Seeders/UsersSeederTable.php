<?php

namespace Modules\Usuarios\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Usuarios\Entities\Persona;

class UsersSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Persona::create(
            [
                'nombres' => 'Luis Carlos',
                'apellidos' => 'Méndez Rodas',
            ]
        );

        Persona::create(
            [
                'nombres' => 'Wilder Emmanuel',
                'apellidos' => 'Siguantay González',
            ]
        );

        Persona::create(
            [
                'nombres' => 'Josue Daniel',
                'apellidos' => 'De Leon Ruiz',
            ]
        );

        Persona::create(
            [
                'nombres' => 'Jorge Daniel',
                'apellidos' => 'Monterroso Nowel',
            ]
        );
    }
}
