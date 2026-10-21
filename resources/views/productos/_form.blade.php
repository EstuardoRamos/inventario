<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
        value="{{ old('nombre', $producto?->nombre) }}">
    @error('nombre')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="marca_id" class="form-label">Marcar</label>
    <select id="marca_id" name="marca_id" class="form-select @error('marca_id') is-invalid @enderror">
        <option value="">Selecciona un marca</option>
        @foreach ($marcas as $marca)
        <option value="{{ $marca->id }}" @selected(old('marca_id', $producto?->marca_id) == $marca->id)>
            {{ $marca->nombre }}
        </option>
        @endforeach
    </select>
    @error('marca_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea id="descripcion" name="descripcion" rows="3"
        class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $producto?->descripcion) }}</textarea>
    @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" id="precio" name="precio" step="0.01" inputmode="decimal"
           class="form-control @error('precio') is-invalid @enderror"
           value="{{ old('precio', $producto?->precio) }}">
    @error('precio')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>

<div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" id="stock" name="stock" inputmode="numeric"
           class="form-control @error('stock') is-invalid @enderror"
           value="{{ old('stock', $producto?->stock) }}">
    @error('stock')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>

{{-- <div class="row">
    <div class="col-md-6 mb-3">
        <label for="anio_publicacion" class="form-label">Año de publicación</label>
        <input type="number" id="anio_publicacion" name="anio_publicacion"
               class="form-control @error('anio_publicacion') is-invalid @enderror"
               value="{{ old('anio_publicacion', $producto?->anio_publicacion) }}">
        @error('anio_publicacion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div> --}}

    <div class="col-md-6 mb-3">
        <label for="paginas" class="form-label">Páginas</label>
        <input type="number" id="paginas" name="paginas"
               class="form-control @error('paginas') is-invalid @enderror"
               value="{{ old('paginas', $producto?->paginas) }}">
        @error('paginas')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    </div>
</div>

<div class="form-check mb-3">
    <input type="hidden" id="activo" name="activo" value="0">
    <input type="checkbox" id="activo" name="activo" value="1"
           class="form-check-input"
           @checked(old('activo', $producto?->activo ?? true))>
    <label for="activo" class="form-check-label">Activo</label>
</div>