<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    public function getData() {
        $clase = Clase::all();  // Asegúrate de tener el modelo clase
        return response()->json(['result' => $clase]);
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

    public function getClaseById(Request $request, $id)
{
    $clase = Clase::find($id);  // Busca el tipo de usuario por id

    if ($clase) {
        return response()->json(['result' => $clase]);
    } else {
        return response()->json(['message' => 'Clase no encontrada'], 404);
    }
}

    public function save(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $clase = Clase::create([
            'nombre' => $request->nombre,
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $clase,
        ]);

    }

    public function update(Request $request, $id)
    {
        $clase = Clase::findOrFail($id);
    
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);
    
        $clase->update([
            'nombre' => $request->nombre
        ]);
    
        return response()->json([
            'status' => '200',
            'message' => 'actualizado con éxito',
            'data' => $clase,
        ]);
    
        }

    public function delete(Request $request, $id)
    {
        $clase = Clase::find($id);
        
        if ($clase) {
            $clase->delete();
            return response()->json(['message' => 'Tipo de usuario eliminado con éxito']);
        } else {
            return response()->json(['message' => 'Tipo de usuario no encontrado'], 404);
        }
    }
    
}