<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
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
            'evento_id' => 'required|exists:eventos,id',
            'monto' => 'nullable|numeric',
        ]);
        $factura = Factura::create([
            'nombre' => $request->nombre,
            'cliente_id' => $request->cliente_id,
            'evento_id' => $request->evento_id,
            'monto' => $request->monto,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $factura,
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cliente_id' => 'required|exists:clientes,id',
            'evento_id' => 'required|exists:eventos,id',
            'monto' => 'nullable|numeric',
        ]);

        $factura = Factura::findOrFail($id);
        $factura->update([
            'nombre' => $request->nombre,
            'cliente_id' => $request->cliente_id,
            'evento_id' => $request->evento_id,
            'monto' => $request->monto,
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $factura,
        ]);
        
    }

    public function response(Request $request){
        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
            'data' => $factura,
        ]);

    }

    public function delete($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();

        return response()->json([
            'status' => '200',
            'message' => 'eliminado con exito',
        ]);

    }

}
