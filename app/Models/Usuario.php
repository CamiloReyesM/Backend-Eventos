<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';

    // Campos asignables en masa
    protected $fillable = ['tipo_usuario_id', 'email', 'password'];

    // Relación con tipo de tipo de usuario
    public function tipousuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario_id');
    }

    // Relación con usuario de usauario permiso
    public function usuariopermiso()
    {
        return $this->hasMany(UsuarioPermiso::class, 'usuario_permiso_id');
    }
}
