<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AmbientesReserva;

class AmbientesReservaController extends Controller
{
    public function index()
    {
        $reservas = AmbientesReserva::with('ambiente', 'user')->get();
        return response()->json($reservas);
    }

    public function show($id)
    {
        $reserva = AmbientesReserva::with('ambiente', 'user')->find($id);
        if (!$reserva) {
            return response()->json(['error' => 'Reserva not found'], 404);
        }
        return response()->json($reserva);
    }

    public function getAvailablePeriods($id, $data_reserva)
    {
        // Buscar reservas existentes para o ambiente e data fornecidos
        $reservas = AmbientesReserva::where('ambiente_id', $id)
            ->where('data_reserva', $data_reserva)
            ->pluck('periodo')
            ->toArray();

        return response()->json($reservas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_reserva' => 'required|date',
            'ambiente_id' => 'required|exists:ambientes,id',
            'user_id' => 'required|exists:users,id',
            'periodo' => 'required|in:MANHÃ,TARDE,NOITE',
        ]);

        // Verificar se já existe uma reserva para a data, ambiente e período fornecidos
        $existingReserva = AmbientesReserva::where('data_reserva', $request->data_reserva)
            ->where('ambiente_id', $request->ambiente_id)
            ->where('periodo', $request->periodo)
            ->first();

        if ($existingReserva) {
            return response()->json(['error' => 'Já existe uma reserva para esse dia, ambiente e período.'], 409);
        }

        $reserva = AmbientesReserva::create($request->all());
        return response()->json($reserva, 201);
    }

    public function update(Request $request, $id)
    {
        $reserva = AmbientesReserva::find($id);
        if (!$reserva) {
            return response()->json(['error' => 'Reserva not found'], 404);
        }

        $request->validate([
            'data_reserva' => 'sometimes|required|date',
            'ambiente_id' => 'sometimes|required|exists:ambientes,id',
            'user_id' => 'sometimes|required|exists:users,id',
            'periodo' => 'sometimes|required|in:MANHÃ,TARDE,NOITE',
        ]);

        // Verificar se já existe uma reserva para a data, ambiente e período fornecidos
        if ($request->has('data_reserva') && $request->has('ambiente_id') && $request->has('periodo')) {
            $existingReserva = AmbientesReserva::where('data_reserva', $request->data_reserva)
                ->where('ambiente_id', $request->ambiente_id)
                ->where('periodo', $request->periodo)
                ->where('id', '!=', $id) // Excluir a reserva atual da verificação
                ->first();

            if ($existingReserva) {
                return response()->json(['error' => 'Já existe uma reserva para esse dia, ambiente e período.'], 409);
            }
        }

        $reserva->update($request->all());
        return response()->json($reserva);
    }

    public function destroy($id)
    {
        $reserva = AmbientesReserva::find($id);
        if (!$reserva) {
            return response()->json(['error' => 'Reserva not found'], 404);
        }

        $reserva->delete();
        return response()->json(null, 204);
    }

    public function getReservasByUser($usuario_id)
    {
        $reservas = AmbientesReserva::where('user_id', $usuario_id)
            ->get();

        return response()->json($reservas);
    }
}
