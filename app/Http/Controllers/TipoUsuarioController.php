<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoUsuario;


class TipoUsuarioController extends Controller
{
    // En tu controlador (por ejemplo, TipoUsuarioController)
    public function getData() {
        $tipo_usuario = TipoUsuario::all();  // Asegúrate de tener el modelo TipoUsuario
        return response()->json(['result' => $tipo_usuario]);
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

    public function getTipoUsuarioById(Request $request, $id)
{
    $tipo_usuario = TipoUsuario::find($id);  // Busca el tipo de usuario por id

    if ($tipo_usuario) {
        return response()->json(['result' => $tipo_usuario]);
    } else {
        return response()->json(['message' => 'Tipo de usuario no encontrado'], 404);
    }
}


    public function save(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $tipo_usuario = TipoUsuario::create([
            'nombre' => $request->nombre,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $tipo_usuario,
        ]);

    }

    public function update(Request $request, $id)
{
    $tipo_usuario = TipoUsuario::findOrFail($id);

    $request->validate([
        'nombre' => 'required|string|max:255'
    ]);

    $tipo_usuario->update([
        'nombre' => $request->nombre
    ]);

    return response()->json([
        'status' => '200',
        'message' => 'actualizado con éxito',
        'data' => $tipo_usuario,
    ]);

    }

    public function response(Request $request){
        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
            'data' => $cargo,
        ]);

    }    

    public function delete(Request $request, $id)
    {
        $tipo_usuario = TipoUsuario::find($id);
        
        if ($tipo_usuario) {
            $tipo_usuario->delete();
            return response()->json(['message' => 'Tipo de usuario eliminado con éxito']);
        } else {
            return response()->json(['message' => 'Tipo de usuario no encontrado'], 404);
        }
    }
    
}