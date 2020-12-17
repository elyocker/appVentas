<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bodega extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->belongsToMany(bodega::class, 'id_categoria');
    }

    
}
    