<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table='user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'nick', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // Relación One To Many / de uno a muchos /un usuario hace  muchos comentarios
    public function comment()
    {
        return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }

    // Relación One To Many / de uno a muchos /un usuario sube  muchas fotografías
    public function imagenes()
    {
        return $this->hasMany('App\Image', 'user_id');
    }

    // Relación One To Many / de uno a muchos /un usuario da muchos likes
    public function likes()
    {
        return $this->hasMany('App\Like')->orderBy('id', 'desc');
    }
}