<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Planta;
use Illuminate\Http\Request;

class PlantaController extends Controller
{

    // ===============================
    // VER CATÁLOGO (cliente y vendedor)
    // ===============================
    public function index()
    {
        return Planta::where('activa', true)
            ->where('stock', '>', 0)
            ->get();
    } // lo tenia hasta aqui 

    // ===============================
    // CREAR PLANTA (solo vendedor)
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|string',
            'activa' => 'required|boolean',
        ]);

        $planta = Planta::create($request->all());

        return response()->json([
            'message' => 'Planta creada correctamente',
            'planta' => $planta
        ], 201);
    }

    // ===============================
    // ACTUALIZAR
    // ===============================
    public function update(Request $request, $id)
    {
        $planta = Planta::findOrFail($id);

        $planta->update($request->all());

        return response()->json([
            'message' => 'Planta actualizada',
            'planta' => $planta
        ]);
    }

    // ===============================
    // ELIMINAR
    // ===============================
    public function destroy($id)
    {
        $planta = Planta::findOrFail($id);
        $planta->delete();

        return response()->json([
            'message' => 'Planta eliminada'
        ]);
    }
}