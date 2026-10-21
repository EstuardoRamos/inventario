@extends('layouts.base')

@section('titulo', 'Nuevo producto')

@section('contenido')
    <h1 class="h3 mb-3">Nuevo Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST" class="card card-body">
        @csrf

        @include('productos._form', ['producto' => null])

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
@endsection