<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    use HasFactory;
    protected $table= 'orden_compras';

    protected $fillable=['nombre', 'producto_id', 'proveedor_id', 'usuario_id', 'cantidad'];
// Relación con tipo de tipo de usuario
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(proveedor::class, 'tipo_usuario_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
