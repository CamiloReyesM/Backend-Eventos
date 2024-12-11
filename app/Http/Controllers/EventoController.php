<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
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
            'cliente_id' => 'required|exists:clientes,id',
            'producto_evento_id' => 'required|exists:producto_eventos,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'precio' => 'nullable|numeric',
        ]);
        $evento = Evento::create([
            'nombre' => $request->nombre,
            'cliente_id' => $request->cliente_id,
            'producto_evento_id' => $request->producto_evento_id,
            'usuario_id' => $request->usuario_id,
            'precio' => $request->precio,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $evento,
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cliente_id' => 'required|exists:clientes,id',
            'producto_evento_id' => 'required|exists:producto_eventos,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'precio' => 'nullable|numeric',
        ]);

        $evento = Evento::findOrFail($id);
        $evento->update([
            'nombre' => $request->nombre,
            'cliente_id' => $request->cliente_id,
            'producto_evento_id' => $request->producto_evento_id,
            'usuario_id' => $request->usuario_id,
            'precio' => $request->precio,
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $evento,
        ]);
        
    }

    public function response(Request $request){
        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
            'data' => $evento,
        ]);

    }

    public function delete($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return response()->json([
            'status' => '200',
            'message' => 'eliminado con exito',
        ]);

    }

}
