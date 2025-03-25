<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;

class PedidoAdminController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $estado = $request->query('estado');
    
        $pedidos = \App\Models\Pedido::when($estado, function ($query, $estado) {
            return $query->where('estado', $estado);
        })->latest()->get();
    
        return view('admin.pedidos.index', compact('pedidos', 'estado'));
    }
    

    public function cambiarEstado(\Illuminate\Http\Request $request, Pedido $pedido)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,aceptado,en camino,entregado,cancelado',
        ]);
    
        $pedido->update([
            'estado' => $request->estado,
        ]);
    
        return redirect()->route('admin.pedidos.index')->with('success', 'Estado actualizado correctamente.');
    }
    
}
