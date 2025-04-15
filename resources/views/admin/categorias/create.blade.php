@extends('layouts.app')

@section('content')
<div class="container p-4 rounded shadow-sm mt-4" style="background-color: #fdecec; max-width: 600px;">
    <h1 class="text-center fw-bold text-danger-emphasis mb-4" style="font-size: 2rem;">
        ✨ Nueva Categoría
    </h1>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        @include('admin.categorias._form', ['categoria' => new \App\Models\Categoria()])
        
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-success">
                💾 Guardar
            </button>
        </div>
    </form>
</div>
@endsection
