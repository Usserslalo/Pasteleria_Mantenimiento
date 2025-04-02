<div class="row g-4">
    <!-- Primera columna -->
    <div class="col-md-6">
        <div class="form-group-pastel">
            <label for="nombre" class="form-label text-brown fw-bold">Nombre del Producto</label>
            <input type="text" name="nombre" class="form-control-pastel" 
                   value="{{ old('nombre', $producto->nombre ?? '') }}" required>
        </div>
        
        <div class="form-group-pastel">
            <label for="descripcion" class="form-label text-brown fw-bold">Descripción</label>
            <textarea name="descripcion" class="form-control-pastel" rows="5">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
        </div>
    </div>
    
    <!-- Segunda columna -->
    <div class="col-md-6">
        <div class="form-group-pastel">
            <label for="precio" class="form-label text-brown fw-bold">Precio ($)</label>
            <input type="number" name="precio" step="0.01" class="form-control-pastel" 
                   value="{{ old('precio', $producto->precio ?? '') }}" required>
        </div>
        
        <div class="form-group-pastel">
            <label for="categoria_id" class="form-label text-brown fw-bold">Categoría</label>
            <select name="categoria_id" class="form-select-pastel" required>
                <option value="">-- Selecciona una categoría --</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" 
                        {{ old('categoria_id', $producto->categoria_id ?? '') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group-pastel">
            <label for="imagen" class="form-label text-brown fw-bold">Imagen</label>
            <input type="file" name="imagen" class="form-control-pastel" accept="image/*">
            
            @if (isset($producto->imagen) && $producto->imagen)
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
        <i class="bi bi-arrow-left"></i> Cancelar
    </a>
    <button type="submit" class="btn btn-pastel">
        <i class="bi bi-save"></i> Guardar
    </button>
</div>

<style>
    .form-group-pastel {
        margin-bottom: 1.5rem;
    }

    .text-brown { color: #6d4c41; }

    .text-muted-pastel {
        color: #9e7d74 !important;
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