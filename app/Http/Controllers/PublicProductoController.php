<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class PublicProductoController extends Controller
{
    public function index(Request $request)
    {
        // Filtro opcional por categoría
        $categoria_id = $request->query('categoria');

        $productos = Producto::with('categoria')
            ->when($categoria_id, fn($query) => $query->where('categoria_id', $categoria_id))
            ->get();

        $categorias = Categoria::all();

        return view('public.productos.index', compact('productos', 'categorias', 'categoria_id'));
    }
}
