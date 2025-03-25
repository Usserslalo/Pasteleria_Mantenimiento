<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    // Mostrar formulario de confirmación
    public function create()
    {
        $carrito = session('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío.');
        }

        return view('public.pedidos.create', compact('carrito'));
    }

    // Guardar pedido en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'metodo_pago' => 'required|string|max:50',
        ]);

        $carrito = session('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío.');
        }

        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        Pedido::create([
            'nombre_cliente' => $request->nombre_cliente,
            'direccion' => $request->direccion,
            'metodo_pago' => $request->metodo_pago,
            'total' => $total,
            'productos' => json_encode($carrito),
        ]);

        session()->forget('carrito');

        return redirect()->route('productos.publicos')->with('success', '¡Tu pedido fue realizado con éxito!');
    }
}
