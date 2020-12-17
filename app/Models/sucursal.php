<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursal extends Model
{
    use HasFactory;

    public function departamento()
    {
        return $this->belongsTo(departamento::class, 'id_departamento');
    }
    public function ciudad()
    {
        return $this->belongsTo(ciudades::class, 'id_ciudad');
    }
    public function empresa()
    {
        return $this->belongsTo(empresa::class, 'id_empresa');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'id_user');
    }
}
