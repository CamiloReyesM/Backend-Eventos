<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Importa la clase Request
use App\Models\Usuario; // Importa el modelo Usuario
use App\Models\Permiso; // Importa el modelo Permiso
use App\Models\UsuarioPermiso; // Importa el modelo UsuarioPermiso

class UsuarioPermisoController extends Controller
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
            'usuario_id' => 'required|exists:tipo_usuarios,id',
            'permiso_id' => 'required|exists:permisos,id',
        ]);

        $usuario_permiso = UsuarioPermiso::create([
            'usuario_id' => $request->usuario_id,
            'permiso_id' => $request->permiso_id,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $usuario_permiso,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usuario_id' => 'required|exists:tipo_usuarios,id',
            'permiso_id' => 'required|exists:permisos,id',
        ]);

        $usuario_permiso = UsuarioPermiso::findOrFail($id);
        $usuario_permiso->update([
            'usuario_id' => $request->usuario_id, // Usa los datos del request para actualizar
            'permiso_id' => $request->permiso_id,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
            'data' => $usuario_permiso,
        ]);
    }

    public function delete($id)
    {
        $usuario_permiso = UsuarioPermiso::findOrFail($id);
        $usuario_permiso->delete();

        return response()->json([
            'status' => '200',
            'message' => 'eliminado con exito',
        ]);
    }

}
