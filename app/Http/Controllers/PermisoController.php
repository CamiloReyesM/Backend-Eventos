<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
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
        ]);

        $permiso = Permiso::create([
            'nombre' => $request->nombre,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $permiso,
        ]);

    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
    ]);

    $permiso = Permiso::findOrFail($id);
    $permiso->update([
        'nombre' => $request->nombre,
    ]);

    return response()->json([
        'status' => '200',
        'message' => 'guardado con éxito',
        'data' => $permiso,
    ]);
}

    public function response(Request $request){
        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
            'data' => $permiso,
        ]);

    }

    public function delete($id)
    {
        $permiso = permiso::findOrFail($id);
        $permiso->delete();

        return response()->json([
            'status' => '200',
            'message' => 'eliminado con exito',
        ]);

    }

}
