<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Mascota;

class mascotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mascotas')->insert([
            'nombre'=>"Joker",
            'especie'=> "Perro",
            'propietario_id'=> 1
        ]);

        $mascota = new Mascota();
        $mascota->nombre = "Alberto";
        $mascota->especie = "Emprendedor";
        $mascota->propietario_id = 2;
        $mascota->save();

        Mascota::create(
            array(
                'nombre'=>'Pablo',
                'especie'=> 'tigre',
                'propietario_id'=> 1
            ));
        Mascota::create(
            array(
                'nombre'=>'Joserra',
                'especie'=> 'gatito',
                'propietario_id'=> 3
            ));
        Mascota::create(
            array(
                'nombre'=>'César',
                'especie'=> 'golem',
                'propietario_id'=> 1
            ));

        
    }
}
