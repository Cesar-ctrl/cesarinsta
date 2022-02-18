<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class imageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 11; $i++) {
            $start = strtotime('2018-02-01');
            $end = time();
            $timestamp = mt_rand($start, $end); /*generar fecha aleatoria, junto con lo que hay en create_at*/
            DB::table('image')->insert([
                'user_id' => random_int(1, 20),
                'image_path' => "images/image{$i}.jpg",
                'description' => Str::random(100),
                'created_at' => date("Y-m-d H:i:s", $timestamp),
                'updated_at' => date("Y-m-d H:i:s", $timestamp),
            ]);
        }
    }
}
