<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<21;$i++)
        {
            $start = strtotime('2017-01-01');
            $end = time();
            $timestamp = mt_rand($start, $end); /*generar fecha aleatoria, junto con lo que hay en create_at*/
            DB::table('user')->insert([
                'name' => 'Usuario'.$i,
                'surname' => 'Apellido'.$i,
                'nick' => 'nick'.$i,
                'email' => 'usuario'.$i.'@'.'apellido'.$i.'.com',
                'password' => bcrypt('123456'),
                //'image' => 'usuario'.$i.'.jpg',
                'created_at' => date('Y-m-d H:i:s', $timestamp),
                'updated_at' => date('Y-m-d H:i:s', $timestamp),
            ]);
        }
    }
}

