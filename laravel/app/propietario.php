<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class propietario extends Model
{
    protected $table = "propietarios"; 
    protected $fillable = ['nombre', 'localidad'];

    public function mascotas(){
        return $this->hasMany("App\Mascota");
    }

    public function __toString()
    {
        return $this->nombre;
    }
}
