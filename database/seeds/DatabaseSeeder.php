<?php

use App\Persona;
use App\TipoLicencia;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $output = new ConsoleOutput();
        // $this->call(ConfigSeeder::class);
        // $this->call(UbicacionesSeederTable::class);
        for ($i=0; $i < 2000; $i++) {
            $user = factory(App\Persona::class)->create();
            $output->writeln("Persona: $user->nombres $user->apellidos - $i");
            if(Carbon::parse($user->fecha_nacimiento)->age > 18){
                $digito1 = mt_rand(10000000,99999999);
                $digito2 = mt_rand(0,9);
                $dept = str_pad($user->departamento, 2, "0", STR_PAD_LEFT);
                $muni = str_pad($user->municipio, 2, "0", STR_PAD_LEFT);
                $cui = $digito1.$digito2.$dept.$muni;
                $output->writeln("cui: $cui");
                DB::table('DPI')->insert(
                    [
                        'cui' => $cui,
                        'digito_validatorio' => $digito2,
                        'no_correlativo' => $digito1,
                        'municipio'  => $user->municipio,
                        'departamento'  => $user->departamento,
                    ]
                );
                $user->update(['dpi' => $cui]);
                $tiene_licencia = mt_rand(0,100);
                if($tiene_licencia > 50){
                    if( isset($user->dpi)){
                        $tipo_licencia = array('a','b','c','m');
                        DB::table('Licencia')->insert(
                            [
                                'dpi' => $user->dpi,
                                'tipo' => $tipo_licencia[array_rand($tipo_licencia,1)],
                                'anios' => mt_rand(1,4)
                            ]
                        );
                    }
                }

                if($user->estadocivil == 'C'){
                    if($user->genero == 'M'){
                        $user2 = Persona::leftJoin('Gestion as g1','Persona.dpi','g1.dpimujer')
                                        ->where('genero','F')
                                        ->where('difunto',0)
                                        ->where('estadocivil','C')
                                        ->whereNotNull('dpi')
                                        ->whereNull('g1.dpimujer')
                                        ->get()->first();
                        if(isset($user2)){
                            $faker = Faker\Factory::create();
                            $startDate = Carbon::createFromFormat('Y-m-d', $user->fecha_nacimiento)->age - 18;
                            $fecha = $faker->dateTimeBetween("-$startDate years", 'now');
                            DB::table('Gestion')->insert(
                                [
                                    'fecha' => $fecha,
                                    'tipo_gestion_id' => 1,
                                    'dpihombre'  => $user->dpi,
                                    'dpimujer'  => $user2->dpi,
                                ]
                            );
                            $output->writeln("Casado con: $user2->nombres $user2->apellidos");
                        }
                    }else{
                        $user2 = Persona::leftJoin('Gestion as g1','Persona.dpi','g1.dpihombre')
                                        ->where('genero','M')
                                        ->where('difunto',0)
                                        ->where('estadocivil','C')
                                        ->whereNotNull('dpi')
                                        ->whereNull('g1.dpihombre')
                                        ->get()->first();
                        if(isset($user2) && Carbon::createFromFormat('Y-m-d', $user2->fecha_nacimiento)->age > 18){
                            $faker = Faker\Factory::create();
                            $startDate = Carbon::createFromFormat('Y-m-d', $user->fecha_nacimiento)->age - 18;
                            $fecha = $faker->dateTimeBetween("-$startDate years", 'now');
                            DB::table('Gestion')->insert(
                                [
                                    'fecha' => $fecha,
                                    'tipo_gestion_id' => 1,
                                    'dpihombre'  => $user2->dpi,
                                    'dpimujer'  => $user->dpi,
                                ]
                            );
                            $output->writeln("Casado con: $user2->nombres $user2->apellidos");
                        }
                    }
                }
            }
            $padre = Persona::inRandomOrder()->where('genero','M')->whereRaw('fecha_nacimiento < '.$user->fecha_nacimiento)->first();
            $madre = Persona::inRandomOrder()->where('genero','F')->whereRaw('fecha_nacimiento < '.$user->fecha_nacimiento)->first();
            if(isset($padre->dpi) && isset($madre->dpi)){
                $user->update(['dpipadre' => $padre->dpi, 'dpimadre' => $madre->dpi]);
            }

        }
    }
}
