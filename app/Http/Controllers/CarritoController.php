<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    // Mostrar productos en el carrito
    public function index()
    {
        $carrito = session()->get('carrito', []);
        return view('public.carrito.index', compact('carrito'));
    }

    // Agregar producto al carrito
    public function agregar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $carrito = session()->get('carrito', []);

        // Si ya existe, aumentar cantidad
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'imagen' => $producto->imagen,
                'cantidad' => 1,
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito.');
    }

    // Eliminar producto del carrito
    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito.');
    }

    public function incrementar($id)
    {
        $carrito = session()->get('carrito', []);
    
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
            session()->put('carrito', $carrito);
        }
    
        return redirect()->route('carrito.index');
    }
    
    public function decrementar($id)
    {
        $carrito = session()->get('carrito', []);
    
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']--;
    
            if ($carrito[$id]['cantidad'] <= 0) {
                unset($carrito[$id]);
            }
    
            session()->put('carrito', $carrito);
        }
    
        return redirect()->route('carrito.index');
    }
    
}
