@extends('layouts.base')

@section('titulo', 'Productos')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-primary">Nuevo producto</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped align-middle bg-white">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Marca</th>
                    <th>ACtivo</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>
                        {{-- <td>{{ $producto->activo }}</td> --}}
                        <td>{{ $producto->marca->nombre }}</td>
                        <td>
                            @if ($producto->activo)
                                <span class="badge bg-success">Sí</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('productos.edit', $producto) }}"
                               class="btn btn-sm btn-outline-secondary">Editar</a>

                            <form action="{{ route('productos.destroy', $producto) }}" method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Eliminar este producto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No hay productos todavía.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $productos->links() }}
@endsection