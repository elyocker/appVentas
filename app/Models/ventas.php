<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;
    public function empresa()
    {
        return $this->belongsTo(empresa::class, 'id_empresa');
    }
    public function sucursal()
    {
        return $this->belongsTo(sucursal::class, 'id_sucursal');
    }
    public function bodega()
    {
        return $this->belongsTo(bodega::class, 'id_bodega');
    }
}
