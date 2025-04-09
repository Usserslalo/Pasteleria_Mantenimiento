@extends('layouts.app')

@section('content')
<div class="container p-4 rounded shadow-sm mt-4" style="background-color: #fdecec; max-width: 600px;">
    <h1 class="text-center fw-bold text-danger-emphasis mb-4" style="font-size: 2rem;">
        ✨ Editar Categoría
    </h1>

    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.categorias._form', ['categoria' => $categoria])

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-danger">
                ✏️ Actualizar
            </button>
        </div>
    </form>
</div>
@endsection
