<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioPermiso extends Model
{
    use HasFactory;
    protected $table = 'usuario_permisos';

    // Desactivar la gestión de timestamps
    public $timestamps = false;

    // Campos asignables en masa
    protected $fillable = ['usuario_id', 'permiso_id'];

}
