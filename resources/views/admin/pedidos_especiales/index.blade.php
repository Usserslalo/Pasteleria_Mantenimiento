@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center">Pedidos Especiales</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if($pedidos->isEmpty())
        <p class="text-muted text-center">No hay pedidos especiales aún.</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Contacto</th>
                        <th>Descripción</th>
                        <th>Fecha Deseada</th>
                        <th>Imagen</th>
                        <th>Estado</th>
                        <th>Tiempo Estimado</th>
                        <th>Responder</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->nombre }}</td>
                            <td>{{ $pedido->contacto }}</td>
                            <td>{{ $pedido->descripcion }}</td>
                            <td>{{ $pedido->fecha_deseada ? \Carbon\Carbon::parse($pedido->fecha_deseada)->format('d/m/Y') : '-' }}</td>
                            <td>
                                @if($pedido->imagen)
                                    <a href="{{ asset('storage/' . $pedido->imagen) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $pedido->imagen) }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ ucfirst($pedido->estado) }}</td>
                            <td>{{ $pedido->tiempo_estimado ?? '-' }}</td>
                            <td>
                                <form action="{{ route('admin.pedidos-especiales.responder', $pedido->id) }}" method="POST">
                                    @csrf
                                    <select name="estado" class="form-select form-select-sm mb-1">
                                        @foreach(['pendiente', 'aceptado', 'rechazado'] as $estado)
                                            <option value="{{ $estado }}" {{ $pedido->estado === $estado ? 'selected' : '' }}>
                                                {{ ucfirst($estado) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="tiempo_estimado" class="form-control form-control-sm mb-1" placeholder="Tiempo estimado" value="{{ old('tiempo_estimado', $pedido->tiempo_estimado) }}">
                                    <button type="submit" class="btn btn-sm btn-primary w-100">Guardar</button>
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
