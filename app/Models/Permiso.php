<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;
    protected $table = 'permisos';

    // Campos asignables en masa
    protected $fillable = ['nombre'];

    // Relación con usuarios
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuario_id');
    }

    // Relación con usuario de usauario permiso
    public function usuariopermiso()
    {
        return $this->hasMany(UsuarioPermiso::class, 'usuario_permiso_id');
    }
}