@extends('layouts.base')

@section('titulo', 'Editar producto')

@section('contenido')
    <h1 class="h3 mb-3">Editar producto</h1>

    <form action="{{ route('productos.update', $producto) }}" method="POST" class="card card-body">
        @csrf
        @method('PUT')

        @include('productos._form')

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
@endsection