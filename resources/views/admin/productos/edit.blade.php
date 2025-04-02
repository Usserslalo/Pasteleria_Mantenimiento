@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-pastel p-4 rounded-4 shadow-sm">
        <h1 class="mb-4 text-center display-5 fw-bold text-brown" style="font-family: 'Playfair Display', serif;">
            ✏️ Editar Producto
        </h1>

        @if ($errors->any())
            <div class="alert alert-pastel-danger rounded-4 mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data" class="form-pastel">
            @csrf
            @method('PUT')
            
            <div class="row g-4">
                <!-- Primera columna -->
                <div class="col-md-6">
                    <div class="form-group-pastel">
                        <label for="nombre" class="form-label text-brown fw-bold">Nombre del Producto</label>
                        <input type="text" class="form-control-pastel" id="nombre" name="nombre" 
                               value="{{ old('nombre', $producto->nombre) }}" required>
                    </div>
                    
                    <div class="form-group-pastel">
                        <label for="descripcion" class="form-label text-brown fw-bold">Descripción</label>
                        <textarea class="form-control-pastel" id="descripcion" name="descripcion" 
                                  rows="5">{{ old('descripcion', $producto->descripcion) }}</textarea>
                    </div>
                </div>
                
                <!-- Segunda columna -->
                <div class="col-md-6">
                    <div class="form-group-pastel">
                        <label for="precio" class="form-label text-brown fw-bold">Precio ($)</label>
                        <input type="number" step="0.01" class="form-control-pastel" id="precio" name="precio" 
                               value="{{ old('precio', $producto->precio) }}" required>
                    </div>
                    
                    <div class="form-group-pastel">
                        <label for="categoria_id" class="form-label text-brown fw-bold">Categoría</label>
                        <select class="form-select-pastel" id="categoria_id" name="categoria_id" required>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" 
                                    {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group-pastel">
                        <label for="imagen" class="form-label text-brown fw-bold">Imagen del Producto</label>
                        <input type="file" class="form-control-pastel" id="imagen" name="imagen" accept="image/*">
                        
                        @if($producto->imagen)
                            <div class="image-preview-container mt-3 text-center">
                                <img src="{{ asset('storage/' . $producto->imagen) }}" 
                                     class="img-pastel-preview rounded-4" alt="Imagen actual">
                                <p class="text-muted-pastel small mt-2">Imagen actual</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between mt-5 pt-3 border-top-pastel">
                <a href="{{ route('productos.index') }}" class="btn btn-pastel-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-pastel">
                    <i class="bi bi-save"></i> Guardar Cambios
                </button>
            </div>
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