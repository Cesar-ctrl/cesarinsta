<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'content', 'image_id', 'user_id',
    ];
    // Relación Many To One / de muchos a uno / los comentarios (N) pertenecen a 1 usuario
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    // Relación Many To One / de muchos a uno / las comentarios (N) son a 1 imagen
    public function image()
    {
        return $this->belongsTo('App\Images', 'image_id');
    }
}