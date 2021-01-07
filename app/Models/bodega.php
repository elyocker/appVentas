<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categorias;

class bodega extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(categorias::class, 'id_categoria');
    }

    
}
    