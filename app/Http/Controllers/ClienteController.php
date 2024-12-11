<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
            'apellido' => 'required|string|max:255',
            'empresa' => 'required|string|max:255', // Verificar que el ID exista en la tabla 'proveedores'
            'cargo' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
        ]);

        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'empresa' => $request->empresa,
            'cargo' => $request->cargo,
            'telefono' => $request->telefono,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $cliente,
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'empresa' => 'required|string|max:255', // Verificar que el ID exista en la tabla 'proveedores'
            'cargo' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
        ]);

        $cliente = cliente::findOrFail($id);
        $cliente->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'empresa' => $request->empresa,
            'cargo' => $request->cargo,
            'telefono' => $request->telefono,
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $cliente,
        ]);

    }

    public function response(Request $request){
        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
            'data' => $cliente,
        ]);

    }

    public function delete($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return response()->json([
            'status' => '200',
            'message' => 'eliminado con exito',
        ]);

    }

}
