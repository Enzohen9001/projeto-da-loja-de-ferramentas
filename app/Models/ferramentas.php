<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ferramenta extends Model
{
    protected $fillable = ['Nome','title','text','marca','cor','voltagem','material','estoque','categorias_id'];
    
    // Metodo para retornar o caminho completo da imagem
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categorias_id');
    }
}
