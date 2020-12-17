<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    use HasFactory;
    
    public function categoria()
    {
        return $this->belongsTo(categorias::class, 'id_categoria');
    }
    public function departamento()
    {
        return $this->belongsTo(departamento::class, 'id_departamento');
    }
}
