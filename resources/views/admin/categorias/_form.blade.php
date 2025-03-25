<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre', $categoria->nombre) }}" required>
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea class="form-control" name="descripcion" id="descripcion">{{ old('descripcion', $categoria->descripcion) }}</textarea>
</div>

<button type="submit" class="btn btn-success">Guardar</button>
<a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
