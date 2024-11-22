<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambiente; // Add this line to import the Ambiente model

class AmbienteController extends Controller
{
    public function index()
    {
        // Lógica para listar todos os ambientes
        $ambientes = Ambiente::all();
        return response()->json($ambientes);
    }

    public function store(Request $request)
    {
        // Lógica para criar um novo ambiente
        $ambiente = Ambiente::create($request->all());
        return response()->json($ambiente, 201);
    }

    public function show($id)
    {
        // Lógica para mostrar um ambiente específico
        $ambiente = Ambiente::find($id);
        if (is_null($ambiente)) {
            return response()->json(['message' => 'Ambiente not found'], 404);
        }
        return response()->json($ambiente);
    }

    public function update(Request $request, $id)
    {
        // Lógica para atualizar um ambiente específico
        $ambiente = Ambiente::find($id);
        if (is_null($ambiente)) {
            return response()->json(['message' => 'Ambiente not found'], 404);
        }
        $ambiente->update($request->all());
        return response()->json($ambiente);
    }

    public function destroy($id)
    {
        // Lógica para deletar um ambiente específico
        $ambiente = Ambiente::find($id);
        if (is_null($ambiente)) {
            return response()->json(['message' => 'Ambiente not found'], 404);
        }
        $ambiente->delete();
        return response()->json(null, 204);
    }
}