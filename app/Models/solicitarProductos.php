<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitarProductos extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(categorias::class, 'id_categoria');
    }
    public function empresa()
    {
        return $this->belongsTo(empresa::class, 'id_empresa');
    }
    public function sucursal()
    {
        return $this->belongsTo(sucursal::class, 'id_sucursal');
    }
}
