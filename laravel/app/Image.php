<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $table = 'image';

    protected $fillable = [
        'description'
    ];

    // Relación One To Many / de uno a muchos /una imagen tiene muchos comentarios
    public function comment()
    {
        return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }

    // Relación Many To One / de muchos a uno / las imágenes (N) perteneces a 1 usuario
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    // Relación One To Many / de uno a muchos /una imagen tiene muchos likes
    public function likes()
    {
        return $this->hasMany('App\Like')->orderBy('id', 'desc');
    }
}
