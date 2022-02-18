<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('mascotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre", 100);
            $table->string("especie", 100);
            $table->string("imagen", 100)->nullable();
            $table->unsignedBigInteger("propietario_id");
            $table->foreign("propietario_id")->references("id")->on("propietarios");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
}
