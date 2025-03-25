<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PedidoEspecial;
use Illuminate\Http\Request;

class PedidoEspecialAdminController extends Controller
{
    public function index()
    {
        $pedidos = PedidoEspecial::latest()->get();
        return view('admin.pedidos_especiales.index', compact('pedidos'));
    }

    public function responder(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,aceptado,rechazado',
            'tiempo_estimado' => 'nullable|string|max:255',
        ]);

        $pedido = PedidoEspecial::findOrFail($id);
        $pedido->estado = $request->estado;
        $pedido->tiempo_estimado = $request->tiempo_estimado;
        $pedido->save();

        return redirect()->route('admin.pedidos-especiales.index')->with('success', 'Respuesta enviada correctamente.');
    }
}

