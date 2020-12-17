<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;

    public function empresas()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
}
