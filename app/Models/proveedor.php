<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    public $table = "proveedores"; // solucion por si laravel no reconoce los plurales
    use HasFactory;
    
    public function categoria()
    {
        return $this->belongsTo(categorias::class, 'id_categoria');
    }
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
}
