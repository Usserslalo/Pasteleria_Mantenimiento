<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PedidoEspecial;
use Illuminate\Support\Facades\Storage;

class PedidoEspecialController extends Controller
{
    public function create()
    {
        return view('public.pedidos_especiales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_deseada' => 'nullable|date',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('pedidos-especiales', 'public');
        }

        PedidoEspecial::create($data);

        return redirect()->route('pedido.especial.create')->with('success', '¡Tu pedido especial ha sido enviado! Nos pondremos en contacto contigo.');
    }
}
