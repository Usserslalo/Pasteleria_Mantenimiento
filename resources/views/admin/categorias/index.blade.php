@extends('layouts.app')

@section('content')
<div class="container p-4 rounded shadow-sm" style="background-color: #fdecec;">
    <h1 class="text-center fw-bold text-danger-emphasis my-4" style="font-size: 2.5rem;">
        🎀 Categorías
    </h1>

    <a href="{{ route('categorias.create') }}" class="btn btn-outline-danger mb-3 float-end">
        ➕ Nueva Categoría
    </a>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>📌 Nombre</th>
                <th>🥤 Descripción</th>
                <th>⚙️ Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->descripcion }}</td>
                <td>
                    <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning btn-sm">
                        ✏️ Editar
                    </a>
                    <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Eliminar esta categoría?')" class="btn btn-danger btn-sm">
                            🗑️ Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
