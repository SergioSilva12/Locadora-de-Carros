<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{


    protected $fillable = ['marca_id', 'nome', 'imagem', 'numero_portas', 'lugares', 'abs', 'air_bag'];

    public function marca(){

        return $this->belongsTo('App\Models\Marca');
    }
}
