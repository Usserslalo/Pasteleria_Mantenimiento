@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="bg-pastel p-4 rounded-4 shadow-sm">
            <h1 class="mb-4 text-center display-5 fw-bold text-brown" style="font-family: 'Playfair Display', serif;">
                🎀 Pedidos Recibidos
            </h1>

            @if (session('success'))
                <div class="alert alert-pastel-success rounded-4 text-center">{{ session('success') }}</div>
            @endif

            @if ($pedidos->isEmpty())
                <p class="text-brown text-center">🎈 No hay pedidos aún.</p>
            @else
                <div class="mb-4 text-center">
                    <strong class="text-brown">✨ Filtrar por estado:</strong>
                    <form method="GET" action="{{ route('admin.pedidos.index') }}" class="d-inline">
                        <select name="estado" class="form-select-pastel form-select-sm d-inline w-auto" onchange="this.form.submit()">
                            <option value="">Todos</option>
                            @foreach (['pendiente', 'aceptado', 'en camino', 'entregado', 'cancelado'] as $estado)
                                <option value="{{ $estado }}" {{ request('estado') === $estado ? 'selected' : '' }}>
                                    {{ ucfirst($estado) }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-pastel table-borderless rounded-4 overflow-hidden">
                        <thead class="bg-pastel-header">
                            <tr>
                                <th class="text-brown header-cell">#</th>
                                <th class="text-brown header-cell">Cliente</th>
                                <th class="text-brown header-cell">Dirección</th>
                                <th class="text-brown header-cell">Método de Pago</th>
                                <th class="text-brown header-cell">Total</th>
                                <th class="text-brown header-cell">Productos</th>
                                <th class="text-brown header-cell">Fecha</th>
                                <th class="text-brown header-cell">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr class="bg-pastel-light">
                                    <td class="text-brown">{{ $pedido->id }}</td>
                                    <td class="text-brown">{{ $pedido->nombre_cliente }}</td>
                                    <td class="text-brown">{{ $pedido->direccion }}</td>
                                    <td class="text-brown">{{ ucfirst($pedido->metodo_pago) }}</td>
                                    <td class="text-brown fw-bold">${{ number_format($pedido->total, 2) }}</td>
                                    <td>
                                        <ul class="mb-0 list-pastel">
                                            @foreach (json_decode($pedido->productos, true) as $producto)
                                                <li class="text-brown product-item">
                                                    🍰 {{ $producto['nombre'] }} x{{ $producto['cantidad'] }}
                                                    <span class="text-muted-pastel">- ${{ number_format($producto['precio'], 2) }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-brown">{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <form action="{{ route('admin.pedidos.estado', $pedido) }}" method="POST">
                                            @csrf
                                            <select name="estado" class="form-select-pastel form-select-sm"
                                                    onchange="this.form.submit()">
                                                @foreach (['pendiente', 'aceptado', 'en camino', 'entregado', 'cancelado'] as $estado)
                                                    <option value="{{ $estado }}"
                                                        {{ $pedido->estado === $estado ? 'selected' : '' }}>
                                                        {{ ucfirst($estado) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <style>
        .bg-pastel {
            background: #fff5f5;
            border: 2px solid #ffd1d1;
        }

        .bg-pastel-header {
            background: #ffe0e0 !important;
            border-bottom: 3px solid #ffb3b3 !important;
        }

        .text-brown { color: #6d4c41; }

        .text-muted-pastel {
            color: #9e7d74 !important;
        }

        .alert-pastel-success {
            background: #e8f5e9;
            border: 2px solid #c8e6c9;
            color: #2e7d32;
        }

        .table-pastel {
            border-color: #ffd1d1 !important;
        }

        .table-pastel td, .table-pastel th {
            padding: 1rem;
            vertical-align: middle;
        }

        .header-cell {
            padding: 1rem 1.5rem !important;
            font-size: 1.1em;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .bg-pastel-light {
            background: #fffafa;
        }

        .list-pastel {
            list-style: none;
            padding-left: 0;
        }

        .product-item {
            padding: 8px 12px;
            background: #fff8f8;
            border-radius: 8px;
            margin: 4px 0;
            display: inline-block;
            transition: all 0.2s ease;
            border: 1px solid #ffd1d1;
        }

        .product-item:hover {
            transform: translateX(8px);
            box-shadow: 2px 2px 8px rgba(255, 179, 179, 0.2);
        }

        .form-select-pastel {
            border: 2px solid #ffd1d1;
            border-radius: 15px;
            color: #6d4c41;
            transition: all 0.3s ease;
            padding: 0.25rem 1.75rem 0.25rem 0.75rem;
        }

        .form-select-pastel:focus {
            border-color: #ffb3b3;
            box-shadow: 0 0 0 0.25rem rgba(255, 179, 179, 0.25);
        }

        .form-select-pastel:hover {
            background: #fff0f0;
        }
    </style>
@endsection
