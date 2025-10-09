<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receita extends Model
{
    use SoftDeletes;

    protected $fillable = ['data_receita', 'categoria', 'valor', 'user_id'];
}
