<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoEvento extends Model
{
    use HasFactory;
    protected $table = 'producto_eventos';

    protected $fillable = ['nombre', 'producto_id', 'precio'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
