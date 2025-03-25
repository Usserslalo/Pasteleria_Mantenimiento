@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="order-confirmation-wrapper mx-auto" style="max-width: 800px;">

        <h1 class="text-center fw-bold mb-4 text-brown" style="font-family: 'Playfair Display', serif;">
            🧾 Confirmar Pedido 🧾
        </h1>

        @if(session('error'))
            <div class="alert alert-danger text-center rounded-pill py-3">
                ⚠️ {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('pedido.store') }}" method="POST" class="rounded shadow-sm p-4 bg-white pastel-form">
            @csrf

            <div class="row g-4">
                <div class="col-md-6">
                    <label for="nombre_cliente" class="form-label fw-semibold text-brown">Tu Nombre</label>
                    <input type="text" name="nombre_cliente" class="form-control pastel-input" required>
                </div>

                <div class="col-md-6">
                    <label for="direccion" class="form-label fw-semibold text-brown">Dirección de Entrega</label>
                    <input type="text" name="direccion" class="form-control pastel-input" required>
                </div>

                <div class="col-md-12">
                    <label for="metodo_pago" class="form-label fw-semibold text-brown">Método de Pago</label>
                    <select name="metodo_pago" class="form-select pastel-input" required>
                        <option value="">Selecciona una opción</option>
                        <option value="efectivo">💵 Efectivo</option>
                        <option value="tarjeta">💳 Tarjeta</option>
                        <option value="transferencia">🏦 Transferencia</option>
                    </select>
                </div>
            </div>

            <hr class="my-4">

            <h5 class="mb-3 text-brown fw-bold">🧺 Resumen del Carrito</h5>
            <ul class="list-group mb-4 shadow-sm rounded overflow-hidden">
                @php $total = 0; @endphp
                @foreach ($carrito as $item)
                    @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                    <li class="list-group-item d-flex justify-content-between align-items-center pastel-bg-light">
                        {{ $item['nombre'] }} x{{ $item['cantidad'] }}
                        <span class="fw-semibold text-success">${{ number_format($subtotal, 2) }}</span>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between fw-bold fs-5 pastel-total">
                    Total:
                    <span>${{ number_format($total, 2) }}</span>
                </li>
            </ul>

            <div class="text-end">
                <button type="submit" class="btn btn-success btn-lg pastel-btn">
                    ✅ Realizar Pedido
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ESTILOS EXTRA --}}
<style>
    .text-brown {
        color: #6d4c41;
    }

    .pastel-form {
        background: #fffafa;
        border: 1px solid #ffe6e6;
        border-radius: 20px;
    }

    .pastel-input {
        border-radius: 12px;
        border: 2px solid #ffd1d1;
        transition: border-color 0.3s ease;
    }

    .pastel-input:focus {
        border-color: #ff9494;
        box-shadow: 0 0 0 3px rgba(255, 148, 148, 0.2);
    }

    .pastel-bg-light {
        background-color: #fff0f0;
    }

    .pastel-total {
        background-color: #ffe6e6;
        color: #6d4c41;
    }

    .pastel-btn {
        border-radius: 12px;
        padding-inline: 2rem;
        font-weight: bold;
    }

    @media (max-width: 576px) {
        .pastel-btn {
            width: 100%;
        }

        .pastel-form {
            padding: 1.5rem;
        }

        .order-confirmation-wrapper {
            padding-inline: 1rem;
        }
    }
</style>

<!-- Fuente -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
@endsection
