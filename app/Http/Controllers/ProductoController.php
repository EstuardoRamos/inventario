<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Marca;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with('marca')
                ->latest('id')
                ->paginate(10);

        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $marcas = Marca::orderBy('nombre')->get();
        return view('productos.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
    {
        //
        Producto::create($request->validated());

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
        $marcas = Marca::orderBy('nombre')->get();
        return view('productos.edit', compact('producto', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        //
        $producto->update( $request->validated());
        
        //dd($request->validated());

        return redirect()->route('productos.index')->with('success', 'producto editado con exito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado con exito');


    }
}
