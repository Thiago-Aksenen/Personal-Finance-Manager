<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    public function receita()
    {
        return $this->hasMany(Receita::class);
    }
    public function despesa()
    {
        return $this->hasMany(Despesa::class);
    }

    protected $table = 'usuarios';
    protected $fillable = ['nome', 'senha'];
    protected $hidden = ['senha'];
    public $timestamps = false;
    public function getAuthPassword()
    {
        return $this->senha;
    }
}
