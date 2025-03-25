@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center">Pedidos Recibidos</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if($pedidos->isEmpty())
        <p class="text-muted text-center">No hay pedidos aún.</p>
    @else
        <div class="mb-3 text-center">
            <strong>Filtrar por estado:</strong>
            <form method="GET" action="{{ route('admin.pedidos.index') }}" class="d-inline">
                <select name="estado" class="form-select form-select-sm d-inline w-auto" onchange="this.form.submit()">
                    <option value="">Todos</option>
                    @foreach(['pendiente', 'aceptado', 'en camino', 'entregado', 'cancelado'] as $estado)
                        <option value="{{ $estado }}" {{ request('estado') === $estado ? 'selected' : '' }}>
                            {{ ucfirst($estado) }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Dirección</th>
                        <th>Método de Pago</th>
                        <th>Total</th>
                        <th>Productos</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->nombre_cliente }}</td>
                            <td>{{ $pedido->direccion }}</td>
                            <td>{{ ucfirst($pedido->metodo_pago) }}</td>
                            <td>${{ number_format($pedido->total, 2) }}</td>
                            <td>
                                <ul class="mb-0">
                                    @foreach (json_decode($pedido->productos, true) as $producto)
                                        <li>{{ $producto['nombre'] }} x{{ $producto['cantidad'] }} - ${{ number_format($producto['precio'], 2) }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.pedidos.estado', $pedido) }}" method="POST">
                                    @csrf
                                    <select name="estado" class="form-select form-select-sm" onchange="this.form.submit()">
                                        @foreach(['pendiente', 'aceptado', 'en camino', 'entregado', 'cancelado'] as $estado)
                                            <option value="{{ $estado }}" {{ $pedido->estado === $estado ? 'selected' : '' }}>
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
@endsection
