<?php

namespace App\Http\Controllers;

use App\Models\OrdenCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Usuario;
use Illuminate\Http\Request;

class OrdenCompraController extends Controller
{
    public function getData(Request $request)
    {
        $rta = 10 + 20;
        return response()->json([
            'status' => '200',
            'message' => 'data...',
            'result' => $rta
        ]);

    }

    public function save(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'nullable|numeric',
            'producto_id' => 'required|exists:productos,id',
            'proveedor_id' => 'required|exists:proveedores,id', // Verificar que el ID exista en la tabla 'proveedores'
            'usuario_id' => 'required|exists:usuarios,id',
            'precio' => 'nullable|numeric',
        ]);

        $ordencompra = OrdenCompra::create([
            'nombre' => $request->nombre,
            'producto_id' => $request->producto_id,
            'proveedor_id' => $request->proveedor_id,
            'usuario_id' => $request->usuario_id,
            'cantidad' => $request->cantidad,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $ordencompra,
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'producto_id' => 'required|exists:productos,id',
            'proveedor_id' => 'required|exists:proveedores,id', // Verificar que el ID exista en la tabla 'proveedores'
            'usuario_id' => 'required|exists:usuarios,id',
            'precio' => 'nullable|numeric',
        ]);

        $ordencompra = OrdenCompra::findOrFail($id);
        $ordencompra->update([
            'nombre' => $request->nombre,
            'producto_id' => $request->producto_id,
            'proveedor_id' => $request->proveedor_id,
            'usuario_id' => $request->usuario_id,
            'cantidad' => $request->cantidad,
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
            'data' => $ordencompra,
        ]);

    }

    public function delete($id)
    {
        $ordencompra = OrdenCompra::findOrFail($id);
        $ordencompra->delete();
        return response()->json([
            'status' => '200',
            'message' => 'eliminado con exito',
        ]);

    }

}
