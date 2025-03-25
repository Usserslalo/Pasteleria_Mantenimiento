@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center display-5 fw-bold text-brown" style="font-family: 'Playfair Display', serif;">
        🛒 Tu Carrito de Compras
    </h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if (count($carrito) > 0)
        <div class="table-responsive">
            <table class="table align-middle shadow-sm" style="border-radius: 15px; overflow: hidden;">
                <thead style="background-color: #fff0f0;">
                    <tr class="text-center text-brown">
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($carrito as $id => $item)
                        @php
                            $subtotal = $item['precio'] * $item['cantidad'];
                            $total += $subtotal;
                        @endphp
                        <tr class="text-center align-middle" style="background-color: #fffaf9;">
                            <td>
                                @if($item['imagen'])
                                    <img src="{{ asset('storage/' . $item['imagen']) }}"
                                         class="img-thumbnail"
                                         style="width: 60px; height: 60px; object-fit: contain; background-color: #fff; border: none;">
                                @endif
                            </td>
                            <td class="fw-semibold text-brown">{{ $item['nombre'] }}</td>
                            <td class="text-success fw-bold">${{ number_format($item['precio'], 2) }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <form action="{{ route('carrito.decrementar', $id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-secondary btn-sm rounded-circle px-2">−</button>
                                    </form>

                                    <span class="fw-bold">{{ $item['cantidad'] }}</span>

                                    <form action="{{ route('carrito.incrementar', $id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-secondary btn-sm rounded-circle px-2">+</button>
                                    </form>
                                </div>
                            </td>
                            <td class="fw-semibold">${{ number_format($subtotal, 2) }}</td>
                            <td>
                                <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger rounded-pill px-3">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-end mt-4">
            <h4 class="text-brown">Total: <span class="text-success fw-bold">${{ number_format($total, 2) }}</span></h4>
            <a href="{{ route('pedido.create') }}" class="btn btn-pastel-primary btn-lg mt-2">✅ Confirmar Pedido</a>
        </div>
    @else
        <div class="text-center mt-5">
            <p class="text-muted fs-5">Tu carrito está vacío.</p>
            <a href="{{ route('productos.publicos') }}" class="btn btn-outline-primary">Ver productos</a>
        </div>
    @endif
</div>

{{-- Estilos especiales para carrito --}}
<style>
    .text-brown {
        color: #6d4c41;
    }
    .btn-pastel-primary {
        background: #ffb3b3;
        color: white;
        border: none;
        border-radius: 15px;
        transition: 0.3s all ease;
    }
    .btn-pastel-primary:hover {
        background: #ff9494;
        transform: translateY(-2px);
    }
</style>

<!-- Fuente personalizada -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
@endsection
