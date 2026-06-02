<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['name'];

    public function ferramentas()
    {
        return $this->hasMany(Ferramenta::class, 'categorias_id');
    }
}
