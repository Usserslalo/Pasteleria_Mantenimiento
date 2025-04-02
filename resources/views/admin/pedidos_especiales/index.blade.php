@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="bg-pastel p-4 rounded-4 shadow-sm">
            <h1 class="mb-4 text-center display-5 fw-bold text-brown" style="font-family: 'Playfair Display', serif;">
                🎀 Pedidos Especiales
            </h1>

            @if (session('success'))
                <div class="alert alert-pastel-success rounded-4 text-center">{{ session('success') }}</div>
            @endif

            @if ($pedidos->isEmpty())
                <p class="text-brown text-center">🎈 No hay pedidos especiales aún.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-pastel table-borderless rounded-4 overflow-hidden">
                        <thead class="bg-pastel-header">
                            <tr>
                                <th class="text-brown header-cell"> #</th>
                                <th class="text-brown header-cell"> Cliente</th>
                                <th class="text-brown header-cell"> Contacto</th>
                                <th class="text-brown header-cell"> Descripción</th>
                                <th class="text-brown header-cell"> Fecha Deseada</th>
                                <th class="text-brown header-cell"> Imagen</th>
                                <th class="text-brown header-cell"> Estado</th>
                                <th class="text-brown header-cell"> Tiempo Estimado</th>
                                <th class="text-brown header-cell"> Responder</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr class="bg-pastel-light">
                                    <td class="text-brown">{{ $pedido->id }}</td>
                                    <td class="text-brown">{{ $pedido->nombre }}</td>
                                    <td class="text-brown">{{ $pedido->contacto }}</td>
                                    <td class="text-brown">{{ $pedido->descripcion }}</td>
                                    <td class="text-brown">{{ $pedido->fecha_deseada ? \Carbon\Carbon::parse($pedido->fecha_deseada)->format('d/m/Y') : '-' }}</td>
                                    <td>
                                        @if($pedido->imagen)
                                            <a href="{{ asset('storage/' . $pedido->imagen) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $pedido->imagen) }}" class="img-thumbnail-pastel">
                                            </a>
                                        @else
                                            <span class="text-brown">-</span>
                                        @endif
                                    </td>
                                    <td class="text-brown">{{ ucfirst($pedido->estado) }}</td>
                                    <td class="text-brown">{{ $pedido->tiempo_estimado ?? '-' }}</td>
                                    <td>
                                        <form action="{{ route('admin.pedidos-especiales.responder', $pedido->id) }}" method="POST" class="response-form">
                                            @csrf
                                            <select name="estado" class="form-select-pastel form-select-sm mb-2">
                                                @foreach(['pendiente', 'aceptado', 'rechazado'] as $estado)
                                                    <option value="{{ $estado }}" {{ $pedido->estado === $estado ? 'selected' : '' }}>
                                                        {{ ucfirst($estado) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="text" name="tiempo_estimado" class="form-input-pastel form-control-sm mb-2" 
                                                   placeholder="⏳ Tiempo estimado" 
                                                   value="{{ old('tiempo_estimado', $pedido->tiempo_estimado) }}">
                                            <button type="submit" class="btn-pastel-primary btn-sm w-100">✨ Guardar</button>
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

        .img-thumbnail-pastel {
            width: 60px; 
            height: 60px; 
            object-fit: cover;
            border: 2px solid #ffd1d1;
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .img-thumbnail-pastel:hover {
            transform: scale(1.8);
            z-index: 10;
            box-shadow: 0 0 15px rgba(109, 76, 65, 0.3);
        }

        .form-select-pastel {
            border: 2px solid #ffd1d1;
            border-radius: 15px;
            color: #6d4c41;
            transition: all 0.3s ease;
            padding: 0.25rem 1.75rem 0.25rem 0.75rem;
            background-color: #fff8f8;
        }

        .form-input-pastel {
            border: 2px solid #ffd1d1;
            border-radius: 15px;
            color: #6d4c41;
            transition: all 0.3s ease;
            padding: 0.25rem 0.75rem;
            background-color: #fff8f8;
            width: 100%;
        }

        .form-input-pastel:focus, .form-select-pastel:focus {
            border-color: #ffb3b3;
            box-shadow: 0 0 0 0.25rem rgba(255, 179, 179, 0.25);
            background-color: #fff;
        }

        .form-select-pastel:hover, .form-input-pastel:hover {
            background: #fff0f0;
        }

        .btn-pastel-primary {
            background-color: #ffb3b3;
            border: 2px solid #ff9e9e;
            color: #6d4c41;
            border-radius: 15px;
            padding: 0.25rem 0.75rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn-pastel-primary:hover {
            background-color: #ff9e9e;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 179, 179, 0.3);
        }

        .response-form {
            min-width: 180px;
        }
    </style>
@endsection