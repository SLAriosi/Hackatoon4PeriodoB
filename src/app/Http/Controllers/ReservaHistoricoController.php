<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservaHistorico;

class ReservaHistoricoController extends Controller
{
    public function index()
    {
        $historicos = ReservaHistorico::with('reserva', 'usuario')->get();
        return response()->json($historicos);
    }

    public function show($id)
    {
        $historico = ReservaHistorico::with('reserva', 'usuario')->find($id);
        if (!$historico) {
            return response()->json(['error' => 'Histórico não encontrado'], 404);
        }
        return response()->json($historico);
    }

    public function store(Request $request)
    {
        $request->validate([
            'reserva_id' => 'required|exists:ambientes_reservas,id',
            'usuario_id' => 'required|exists:users,id',
            'alteracoes' => 'required|string',
            'alterado_em' => 'required|date',
        ]);

        $historico = ReservaHistorico::create($request->all());
        return response()->json($historico, 201);
    }

    public function update(Request $request, $id)
    {
        $historico = ReservaHistorico::find($id);
        if (!$historico) {
            return response()->json(['error' => 'Histórico não encontrado'], 404);
        }

        $request->validate([
            'reserva_id' => 'sometimes|required|exists:ambientes_reservas,id',
            'usuario_id' => 'sometimes|required|exists:users,id',
            'alteracoes' => 'sometimes|required|string',
            'alterado_em' => 'sometimes|required|date',
        ]);

        $historico->update($request->all());
        return response()->json($historico);
    }

    public function destroy($id)
    {
        $historico = ReservaHistorico::find($id);
        if (!$historico) {
            return response()->json(['error' => 'Histórico não encontrado'], 404);
        }

        $historico->delete();
        return response()->json(null, 204);
    }
}