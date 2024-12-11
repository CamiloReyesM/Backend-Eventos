<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function getData(Request $request){
        $proveedor = Proveedor::all();
        return response()->Json(['result' => $proveedor]);
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

    public function getProveedorById(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);  // Busca el tipo de usuario por id
    
        if ($proveedor) {
            return response()->json(['result' => $proveedor]);
        } else {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }
    }

    public function save(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'empresa' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
        ]);

        $proveedor = Proveedor::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'empresa' => $request->empresa,
            'cargo' => $request->cargo,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $proveedor,
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'empresa' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'empresa' => $request->empresa,
            'cargo' => $request->cargo,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
        ]);
        
        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
            'data' => $proveedor,
        ]);

    }

    public function delete($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        return response()->json([
            'status' => '200',
            'message' => 'eliminado con exito',
        ]);

    }
}
