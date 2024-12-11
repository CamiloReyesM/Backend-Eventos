<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $table = 'cargos';

    // Campos asignables en masa
    protected $fillable = ['nombre', 'salario', 'tipo_usuario_id'];

    // Relación con tipo de usuario
    public function tipousuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario_id');
    }

    // Relación con empleados
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'empleado_id');
    }
    
}