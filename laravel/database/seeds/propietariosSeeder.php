<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Propietario;

class propietariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('propietarios')->insert([
            'nombre'=>"Javier",
            'localidad'=> "El Puerto"
        ]);
        $propietario =new Propietario();
        $propietario->nombre ="Alejandro";
        $propietario->localidad = "Cadiz";
        $propietario->save();

        Propietario::create(array(
            'nombre'=>"Manuel",
            'localidad'=> "Chiclana"
        ));
    }
}
