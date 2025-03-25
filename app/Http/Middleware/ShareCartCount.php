<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShareCartCount
{
    public function handle(Request $request, Closure $next)
    {
        $cartCount = 0;
        
        if(auth()->check()) {
            // Si estás usando base de datos para usuarios autenticados
            // $cartCount = auth()->user()->carritoItems()->sum('cantidad');
        } else {
            // Para invitados usando sesión
            $carrito = session()->get('carrito', []);
            foreach($carrito as $item) {
                $cartCount += $item['cantidad'];
            }
        }

        view()->share('cartCount', $cartCount);
        return $next($request);
    }
}