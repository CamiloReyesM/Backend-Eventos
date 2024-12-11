<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function getData(Request $request){
        $producto = Producto::all();
        return response()->Json(['result' => $producto]);
    }

    // public function getData(Request $request)
    // {
    //     $rta = 10 + 20;
    //     return response()->json([
    //         'status' => '200',
    //         'message' => 'data...',
    //         'result' => $rta
    //     ]);

    // }

    public function getProductoById(Request $request, $id)
    {
        $producto = Producto::find($id);  // Busca el tipo de usuario por id
    
        if ($producto) {
            return response()->json(['result' => $producto]);
        } else {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
    }

    public function save(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'nullable|numeric',
            'clase_id' => 'required|exists:clases,id',
            'proveedor_id' => 'required|exists:proveedores,id', // Verificar que el ID exista en la tabla 'proveedores'
        ]);

        $producto = Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'clase_id' => $request->clase_id,
            'proveedor_id' => $request->proveedor_id,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $producto,
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'nullable|numeric',
            'clase_id' => 'required|exists:clases,id',
            'proveedor_id' => 'required|exists:proveedores,id', // Verificar que el ID exista en la tabla 'proveedores'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'clase_id' => $request->clase_id,
            'proveedor_id' => $request->proveedor_id,
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $producto,
        ]);
        
    }

    public function response(Request $request){
        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
            'data' => $producto,
        ]);

    }

    public function delete($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return response()->json([
            'status' => '200',
            'message' => 'eliminado con exito',
        ]);

    }

}
