<?php

namespace App\Http\Controllers;

use App\Models\ProductoEvento;
use Illuminate\Http\Request;

class ProductoEventoController extends Controller
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
            'producto_id' => 'required|exists:productos,id',
            'precio' => 'nullable|numeric',
        ]);
        $producto_evento = ProductoEvento::create([
            'nombre' => $request->nombre,
            'producto_id' => $request->producto_id,
            'precio' => $request->precio,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $producto_evento,
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'producto_id' => 'required|exists:productos,id',
            'precio' => 'nullable|numeric',
        ]);

        $producto_evento = ProductoEvento::findOrFail($id);
        $producto_evento->update([
            'nombre' => $request->nombre,
            'producto_id' => $request->producto_id,
            'precio' => $request->precio,
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $producto_evento,
        ]);
        
    }

    public function response(Request $request){
        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
            'data' => $producto_evento,
        ]);

    }

    public function delete($id)
    {
        $producto_evento = ProductoEvento::findOrFail($id);
        $producto_evento->delete();

        return response()->json([
            'status' => '200',
            'message' => 'eliminado con exito',
        ]);

    }

}
