<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    // En tu controlador (por ejemplo, TipoUsuarioController)
    public function getData() {
        $cargo = Cargo::all();  // Asegúrate de tener el modelo TipoUsuario
        return response()->json(['result' => $cargo]);
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

    public function getCargoById(Request $request, $id) {
        $cargo = Cargo::find($id);  // Busca el cargo por id
    
        if ($cargo) {
            return response()->json(['result' => $cargo]);
        } else {
            return response()->json(['message' => 'Cargo no encontrado'], 404);
        }
    }
    

    public function save(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'salario' => 'nullable|numeric',
            'tipo_usuario_id' => 'required|exists:tipo_usuarios,id', // Verificar que el ID exista en la tabla 'cargos'
        ]);

        $cargo = Cargo::create([
            'nombre' => $request->nombre,
            'salario' => $request->salario,
            'tipo_usuario_id' => $request->tipo_usuario_id
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $cargo,
        ]);

    }

    public function update(Request $request, $id)
{
    $cargo = Cargo::findOrFail($id);

    $request->validate([
        'nombre' => 'required|string|max:255',
        'salario' => 'nullable|numeric',
        'tipo_usuario_id' => 'required|exists:tipo_usuarios,id',
    ]);

    $cargo->update([
        'nombre' => $request->nombre,
        'salario' => $request->salario,
        'tipo_usuario_id' => $request->tipo_usuario_id,
    ]);

    return response()->json([
        'status' => '200',
        'message' => 'actualizado con éxito',
        'data' => $cargo,
    ]);

    }

    public function response(Request $request){
        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
            'data' => $cargo,
        ]);

    }

    public function delete($id)
    {
        $cargo = Cargo::findOrFail($id);
        $cargo->delete();

        return response()->json([
            'status' => '200',
            'message' => 'eliminado con exito',
        ]);

    }

}
