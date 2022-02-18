<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    //
    protected $table='likes';
    // Relación Many To One / de muchos a uno / las imágenes (N) perteneces a 1 usuario
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    // Relación Many To One / de muchos a uno / las imágenes (N) perteneces a 1 usuario
    public function image()
    {
        return $this->belongsTo('App\Image', 'image_id');
    }
}