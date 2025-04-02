@extends('layouts.app')

@section('content')
<div class="container">
    <div class="bg-pastel p-4 rounded-4 shadow-sm">
        <h1>Nuevo Producto</h1>
        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.productos._form', ['producto' => new \App\Models\Producto()])
        </form>
    </div>
</div>
<style>
    .bg-pastel {
        background: #fff5f5;
        border: 2px solid #ffd1d1;
    }

    .text-brown { color: #6d4c41; }

    .text-muted-pastel {
        color: #9e7d74 !important;
    }

    .alert-pastel-danger {
        background: #ffebee;
        border: 2px solid #ffcdd2;
        color: #c62828;
    }

    .form-pastel {
        padding: 2rem;
        background: #fffafa;
        border-radius: 15px;
        border: 2px solid #ffd1d1;
    }

    .form-group-pastel {
        margin-bottom: 1.5rem;
    }

    .form-control-pastel {
        border: 2px solid #ffd1d1;
        border-radius: 15px;
        padding: 0.75rem 1rem;
        color: #6d4c41;
        transition: all 0.3s ease;
        background: white;
        width: 100%;
    }

    .form-control-pastel:focus {
        border-color: #ffb3b3;
        box-shadow: 0 0 0 0.25rem rgba(255, 179, 179, 0.25);
    }

    .form-select-pastel {
        border: 2px solid #ffd1d1;
        border-radius: 15px;
        color: #6d4c41;
        transition: all 0.3s ease;
        padding: 0.75rem 1rem;
        background: white;
        width: 100%;
    }

    .form-select-pastel:focus {
        border-color: #ffb3b3;
        box-shadow: 0 0 0 0.25rem rgba(255, 179, 179, 0.25);
    }

    .btn-pastel {
        background-color: #fff0f0;
        color: #6d4c41;
        border: 2px solid #ffd1d1;
        border-radius: 15px;
        padding: 0.75rem 1.5rem;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-pastel:hover {
        background-color: #ffd1d1;
        transform: translateY(-2px);
    }

    .btn-pastel-secondary {
        background-color: white;
        color: #6d4c41;
        border: 2px solid #ffd1d1;
        border-radius: 15px;
        padding: 0.75rem 1.5rem;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-pastel-secondary:hover {
        background-color: #fff0f0;
        transform: translateY(-2px);
    }

    .img-pastel-preview {
        border: 2px solid #ffd1d1;
        padding: 5px;
        background: white;
        transition: all 0.3s ease;
        max-width: 100%;
        height: auto;
        max-height: 200px;
    }

    .img-pastel-preview:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(255, 179, 179, 0.3);
    }

    .border-top-pastel {
        border-top: 2px solid #ffd1d1;
    }

    .image-preview-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
@endsection
