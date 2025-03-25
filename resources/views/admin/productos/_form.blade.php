<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}" required>
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea name="descripcion" class="form-control">{{ old('descripcion', $producto->descripcion) }}</textarea>
</div>

<div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" name="precio" step="0.01" class="form-control" value="{{ old('precio', $producto->precio) }}" required>
</div>

<div class="mb-3">
    <label for="categoria_id" class="form-label">Categoría</label>
    <select name="categoria_id" class="form-control" required>
        <option value="">-- Selecciona una categoría --</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}" 
                {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="imagen" class="form-label">Imagen</label>
    <input type="file" name="imagen" class="form-control">
    @if ($producto->imagen)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $producto->imagen) }}" width="100">
        </div>
    @endif
</div>

<button type="submit" class="btn btn-success">Guardar</button>
<a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
