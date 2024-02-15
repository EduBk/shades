<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $productos = Producto::all();

        return view('index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());

        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'cantidad' => 'required'
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto Agregado Correctamente!');
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
    public function edit(Producto $producto): View
    {
        return view('edit', ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto): RedirectResponse
    {
        $request->validate([
            'nombre'    => 'required',
            'precio'    => 'required',
            'cantidad'  => 'required'
        ]);
        
        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto Editado Correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto): RedirectResponse
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto "'. $producto->nombre .'" Eliminado Correctamente!');
    }
}
