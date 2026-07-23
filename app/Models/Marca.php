<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['nome', 'imagem', 'id'];

    public function modelo(): HasMany
    {
        return $this->hasMany(Modelo::class);
    }
}
