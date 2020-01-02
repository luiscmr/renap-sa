<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EstadoCivil;
use App\Municipio;
use App\Persona;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Persona::class, function (Faker $faker) {
    $municipio = Municipio::inRandomOrder()->first();
    return [
        'nombres' => $faker->firstname,
        'apellidos' => $faker->lastname,
        'fecha_nacimiento' => $faker->date('Y-m-d'),
        'genero' => $faker->randomElement(array ('M','F')),
        'difunto' => $faker->numberBetween(0,1),
        'estadocivil' => $faker->randomElement(array ('S','C')),
        'departamento' => str_pad($municipio->departamento_id, 2, "0", STR_PAD_LEFT),
        'municipio' => $municipio->llave,
        'acta' => $faker->randomNumber(8,true),
    ];
});
