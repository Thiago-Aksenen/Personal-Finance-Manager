<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    public function usuario()
    {
        return $this->hasOne(Usuario::class);
    }
    protected $fillable = [
        'data',
        'categoria',
        'valor',
        'id_usuario'
    ];
    public $timestamps = false;
}
