<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';

    // Campos asignables en masa
    protected $fillable = ['nombre', 'apellido', 'cargo_id', 'cc', 'telefono'];

    // Relación con cargo
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }

    // Relación con usuario
    public function usuario()
    {
        return $this->hasMany(Usuario::class, 'usuario_id');
    }

}
