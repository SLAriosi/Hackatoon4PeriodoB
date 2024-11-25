<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificacao;

class NotificacaoController extends Controller
{
    public function index()
    {
        $notificacoes = Notificacao::all();
        return response()->json($notificacoes);
    }

    public function show($id)
    {
        $notificacao = Notificacao::find($id);
        if (!$notificacao) {
            return response()->json(['error' => 'Notificação não encontrada'], 404);
        }
        return response()->json($notificacao);
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'mensagem' => 'required|string',
            'tipo' => 'required|in:RESERVA,CANCELAMENTO,LEMBRETE',
            'lida' => 'sometimes|boolean',
        ]);

        $notificacao = Notificacao::create($request->all());
        return response()->json($notificacao, 201);
    }

    public function update(Request $request, $id)
    {
        $notificacao = Notificacao::find($id);
        if (!$notificacao) {
            return response()->json(['error' => 'Notificação não encontrada'], 404);
        }

        $request->validate([
            'usuario_id' => 'sometimes|required|exists:users,id',
            'mensagem' => 'sometimes|required|string',
            'tipo' => 'sometimes|required|in:RESERVA,CANCELAMENTO,LEMBRETE',
            'lida' => 'sometimes|boolean',
        ]);

        $notificacao->update($request->all());
        return response()->json($notificacao);
    }

    public function destroy($id)
    {
        $notificacao = Notificacao::find($id);
        if (!$notificacao) {
            return response()->json(['error' => 'Notificação não encontrada'], 404);
        }

        $notificacao->delete();
        return response()->json(null, 204);
    }

    public function getByUsuario($usuario_id)
    {
        $notificacoes = Notificacao::where('usuario_id', $usuario_id)->get();
        return response()->json($notificacoes);
    }

    public function getNaoLidasByUsuario($usuario_id)
    {
        $notificacoes = Notificacao::where('usuario_id', $usuario_id)
            ->where('lida', false)
            ->get();
        return response()->json($notificacoes);
    }
}