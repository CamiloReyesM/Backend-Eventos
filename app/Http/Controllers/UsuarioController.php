<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
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
            'tipo_usuario_id' => 'required|exists:tipo_usuarios,id', // Verificar que el ID exista en la tabla 'cargos'
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $usuario = Usuario::create([
            'tipo_usuario_id' => $request->tipo_usuario_id,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $usuario,
        ]);

    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'tipo_usuario_id' => 'required|exists:tipo_usuarios,id', // Verificar que el ID exista en la tabla 'cargos'
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);
        

        $usuario->update([
            'tipo_usuario_id' => $request->tipo_usuario_id,
            'email' => $request->email,
            'password' => $request->password,
    ]);

        return response()->json([
            'status' => '200',
            'message' => 'actualizado con éxito',
            'data' => $usuario,
    ]);

    }

    public function response(Request $request){
        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
            'data' => $usuario,
        ]);

    }

    public function delete($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json([
            'status' => '200',
            'message' => 'eliminado con exito',
        ]);

    }

}
