@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-pastel p-4 rounded-4 shadow-sm">
        <h1 class="mb-4 text-center display-5 fw-bold text-brown" style="font-family: 'Playfair Display', serif;">
            🍰 Nuestros Productos
        </h1>

        @if (session('success'))
            <div class="alert alert-pastel-success rounded-4 text-center">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('productos.create') }}" class="btn btn-pastel">
                <i class="bi bi-plus-circle"></i> Nuevo Producto
            </a>
        </div>

        @if ($productos->isEmpty())
            <p class="text-brown text-center">🎂 No hay productos registrados aún.</p>
        @else
            <div class="table-responsive">
                <table class="table table-pastel table-borderless rounded-4 overflow-hidden">
                    <thead class="bg-pastel-header">
                        <tr>
                            <th class="text-brown header-cell">Imagen</th>
                            <th class="text-brown header-cell">Nombre</th>
                            <th class="text-brown header-cell">Categoría</th>
                            <th class="text-brown header-cell">Precio</th>
                            <th class="text-brown header-cell">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                        <tr class="bg-pastel-light">
                            <td>
                                @if($producto->imagen)
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" width="80" class="img-pastel rounded-4" alt="{{ $producto->nombre }}">
                                @else
                                    <span class="text-muted-pastel">Sin imagen</span>
                                @endif
                            </td>
                            <td class="text-brown fw-bold">{{ $producto->nombre }}</td>
                            <td class="text-brown">{{ $producto->categoria->nombre }}</td>
                            <td class="text-brown fw-bold">${{ number_format($producto->precio, 2) }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('productos.edit', $producto) }}" class="btn btn-sm btn-pastel-edit">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('¿Eliminar producto?')" class="btn btn-sm btn-pastel-delete">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
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

    .img-pastel {
        border: 2px solid #ffd1d1;
        padding: 5px;
        background: white;
        transition: all 0.3s ease;
    }

    .img-pastel:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(255, 179, 179, 0.3);
    }

    .btn-pastel {
        background-color: #fff0f0;
        color: #6d4c41;
        border: 2px solid #ffd1d1;
        border-radius: 15px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }

    .btn-pastel:hover {
        background-color: #ffd1d1;
        transform: translateY(-2px);
    }

    .btn-pastel-edit {
        background-color: #fff0e0;
        color: #6d4c41;
        border: 2px solid #ffd1b3;
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .btn-pastel-edit:hover {
        background-color: #ffd1b3;
        transform: translateY(-2px);
    }

    .btn-pastel-delete {
        background-color: #ffe0e0;
        color: #6d4c41;
        border: 2px solid #ffb3b3;
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .btn-pastel-delete:hover {
        background-color: #ffb3b3;
        transform: translateY(-2px);
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